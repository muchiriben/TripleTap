<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',

        //individual
        'individual_name',
        'individual_age',
        'individual_phone',
        'individual_national_id',
        'individual_location',
        'individual_proffession',

        //group
        'leader_name',
        'leader_phone',
        'leader_national_id',
        'leader_location',
        'group_relation',
        'from_age',
        'to_age',
        'group_no',

        'payment_status',
        'agreement',
    ];
}
