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
        'user_id',
        'specialist_id',
        'skill',
        'is_published',
        'is_active',
        'status',
        'salary_hidden',
        'about_me',
        'is_history'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', 2);
    }

    public function scopeInactive($query)
    {
        return $query->where('is_active', 1);
    }

    public function getStatus()
    {
        return $this->is_active == 1? "<span class='badge badge-warning'>Aktiv emas</span>": "<span class='badge badge-success'>Aktiv</span>";
    }

    public static function regionName($id)
    {
        return Region::where('id', $id)->first();
    }

    public static function citizen($passport)
    {
        return Citizen::where('passport', $passport)->first();
    }

    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }

    public static function skill($id)
    {
        return Skill::where('id', $id)->first();
    }

    public function workbooks()
    {
        return $this->hasMany(Workbook::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y H:i:s', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('d-m-Y H:i:s', strtotime($value));
    }
}
