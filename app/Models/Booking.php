<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function car()
    {
        return $this->belongsTo(Cars::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
