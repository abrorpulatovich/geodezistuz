<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Vacancy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'company_inn',
        'specialist_id',
        'skill',
        'is_published',
        'is_active',
        'company_id',
        'short_desc',
        'desc',
        'status',
        'salary',
        'view_count',
        'limit_salary',
        'salary_hidden'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('is_active', 0);
    }

    public static function regionName($id)
    {
        return Region::where('id', $id)->first();
    }

    public function getStatus()
    {
        return $this->is_active == 0? "<span class='badge badge-warning'>Aktiv emas</span>": "<span class='badge badge-success'>Aktiv</span>";
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y H:i:s', strtotime($value));
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }

    public function vskill()
    {
        return $this->belongsTo(Skill::class, 'skill', 'id');
    }
}
