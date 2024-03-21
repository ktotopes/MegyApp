<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deceased extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function infoTheDeceased():BelongsTo
    {
        return $this->belongsTo(InfoTheDeceased::class);
    }

}
