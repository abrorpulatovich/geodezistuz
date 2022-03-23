<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'r_order',
        'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 2);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 1);
    }

    public static function get_statuses() {
        return [
            1 => 'Aktiv emas',
            2 => 'Aktiv'
        ];
    }

    public function get_status() {
        return self::get_statuses()[$this->status];
    }
}
