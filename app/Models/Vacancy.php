<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Vacancy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_inn',
        'specialist_id',
        'skill',
        'is_published',
        'is_active',
        'status',
        'salary_hidden'
    ];

    public static function regionName($id)
    {    
        return Region::where('id',$id)->first();   
    }

    public static function company($inn)
    {    
        return Company::where('company_inn',$inn)->first();   
    }
    public static function specialist($id)
    {    
        return Specialist::where('id',$id)->first();   
    }
    public static function skill($id)
    {    
        return Skill::where('id',$id)->first();   
    }
}
