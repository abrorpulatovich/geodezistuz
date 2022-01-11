<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_inn',
        'specialist_id',
        'skill'
    ];

    public static function regionName($id)
    {    
        return Region::where('id',$id)->first();   
    }
}
