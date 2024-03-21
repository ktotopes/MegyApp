<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class InfoTheDeceased extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function image(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function video(): MorphMany
    {
        return $this->morphMany(Video::class, 'videoable');
    }

    public function DeadManText(): MorphOne
    {
        return $this->morphOne(DeadManText::class, 'textable');
    }

    public function Deceased():HasOne
    {
        return $this->hasOne(Deceased::class);
    }
}
