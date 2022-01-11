<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'user_id',
        'region_id',
        'city_id',
        'company_inn',
        'company_name',
        'company_phone_number',
        'address',
        'website'
    ];
}
