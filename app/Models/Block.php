<?php

namespace App\Models;

use App\Enum\BlocksType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Block extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function casts(): array
    {
        return [
            'type' => BlocksType::class,
        ];
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'entity');
    }

    public function videos(): MorphMany
    {
        return $this->morphMany(Video::class, 'entity');
    }

    public function texts(): MorphMany
    {
        return $this->MorphMany(Text::class, 'entity');
    }
}
