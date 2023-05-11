<?php

namespace App\Models;

use App\Models\Cars;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function car()
    {
        return $this->belongsTo(Cars::class);
    }
}
