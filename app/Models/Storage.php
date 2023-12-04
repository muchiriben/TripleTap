<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'serial_no',
        'fc_no',
        'item_type',
        'model',
        'duration',
        'expected_deposit_date',
        'actual_deposit_date',
        'actual_collection_date',
    ];
}
