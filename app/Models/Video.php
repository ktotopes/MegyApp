<?php

namespace App\Models;

use App\Observers\VideoObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
#[ObservedBy([VideoObserver::class])]
class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function videoable(): MorphTo
    {
        return $this->morphTo();
    }
}
