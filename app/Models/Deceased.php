<?php

namespace App\Models;

use App\Models\Scopes\DeceasedFilterScope;
use App\Observers\DeceasedObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
#[ScopedBy([DeceasedFilterScope::class])]
#[ObservedBy([DeceasedObserver::class])]
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
