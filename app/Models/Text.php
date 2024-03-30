<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Text extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function textable(): MorphTo
    {
        return $this->morphTo();
    }
}
