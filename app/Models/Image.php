<?php

namespace App\Models;

use App\Observers\ImageObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
#[ObservedBy([ImageObserver::class])]
class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function entity(): MorphTo
    {
        return $this->morphTo();
    }
}
