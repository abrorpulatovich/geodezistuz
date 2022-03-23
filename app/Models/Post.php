<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'short_desc',
        'desc',
        'added_user',
        'publish_date',
        'status',
        'slug',
        'image',
        'view_count',
        'p_order'
    ];

    protected $attributes = [
        'category_id' => 1
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 2);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 1);
    }

    public function get_status() {
        return [
            1 => 'Aktiv emas',
            2 => 'Aktiv'
        ];
    }

    public function getPublishDateAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    public function setPublishDateAttribute($value)
    {
        $wrong_date = explode('-', $value);
        $this->attributes['publish_date'] = $wrong_date[2] . '-' . $wrong_date[1] . '-' . $wrong_date[0];
    }
}
