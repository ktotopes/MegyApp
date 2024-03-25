<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class InfoTheDeceased extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'dateBirthday' => 'date',
        'dateDeath' => 'date',
    ];

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function videos(): MorphMany
    {
        return $this->morphMany(Video::class, 'videoable');
    }

    public function texts(): MorphMany
    {
        return $this->MorphMany(DeadManText::class, 'textable');
    }

    public function user():HasOne
    {
        return $this->hasOne(User::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
