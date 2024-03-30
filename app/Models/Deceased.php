<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Deceased extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'dateBirthday' => 'date',
        'dateDeath' => 'date',
    ];

    public function blocks(): HasMany
    {
        return $this->hasMany(Block::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function clearGarbage(): void {
        foreach ($this->blocks as $block) {
            $key = "{$block->type}s";

            foreach ($block->$key as $item) {
                $item->delete();
            }

            $block->delete();
        }
    }
}
