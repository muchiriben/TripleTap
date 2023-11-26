<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'phone',
        'total',
        'mpesa_code',
        'delivery_status',
        'notes',
    ];
}
