<?php

namespace App\Models;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cars extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    protected $attributes = [
        'image' => '',
        'jumlah_unit' => '0',
    ];
}
