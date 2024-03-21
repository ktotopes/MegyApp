<?php

namespace App\Models;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    use SpatialTrait;

    protected $guarded = [];

    protected $spatialFields = [
        'location',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
