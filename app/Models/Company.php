<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'full_name',
        'user_id',
        'region_id',
        'city_id',
        'company_inn',
        'company_name',
        'company_phone_number',
        'address',
        'website',
        'status'
    ];

    public static function regionName($id)
    {
        return Region::where('id',$id)->first();
    }

    public static function cityName($id)
    {
        return City::where('id',$id)->first();
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }
}
