<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        's_order',
        'slug',
        'color',
        'icon'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 2);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 1);
    }

    public function get_status()
    {
        return [
            1 => 'Aktiv emas',
            2 => 'Aktiv'
        ];
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class)->where('is_active', 1);
    }

    public function rezumes()
    {
        return $this->hasMany(Rezume::class);
    }
}
