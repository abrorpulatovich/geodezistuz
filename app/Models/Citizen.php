<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;


    protected $fillable = [
        'full_name',
        'user_id',
        'region_id',
        'city_id',
        'gender',
        'specialist',
        'phone_number',
        'birth_date'
    ];

}
