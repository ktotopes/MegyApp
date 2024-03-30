<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function casts(): array
    {
        return [
          'created_at' => 'datetime:Y-m-d H:i:s',
        ];
    }
}
