<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Livewire\str;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'title',
        'slug',
        'author',
        'desc',
        'clicked_count',
        'r_order',
        'status',
        'link'
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

    public function resourceType()
    {
        return $this->belongsTo(ResourceType::class, 'type_id', 'id');
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y H:i:s', strtotime($value));
    }
}
