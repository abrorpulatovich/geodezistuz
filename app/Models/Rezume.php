<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Rezume extends Model
{
    use HasFactory, SoftDeletes;

     protected $fillable = [
        'passport',
        'specialist_id',
        'skill',
        'is_published',
        'is_active',
        'status',
        'salary_hidden',
        'is_history'
    ];


    public static function regionName($id)
    {    
        return Region::where('id',$id)->first();   
    }

    public static function citizen($passport)
    {    
        return Citizen::where('passport',$passport)->first();   
    }
    public static function specialist($id)
    {    
        return Specialist::where('id',$id)->first();   
    }
    public static function skill($id)
    {    
        return Skill::where('id',$id)->first();   
    }

    public function workbooks()
    {
        return $this->hasMany(Workbook::class);
    }
}
