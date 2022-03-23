<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name',
        'status',
        'c_order',
        'slug',
        'breadcrumb_bg_image'
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function scopeActive($query) {
        return $query->where('status', 2);
    }

    public function scopeInactive($query) {
        return $query->where('status', 1);
    }

    public function get_status() {
        return [
            1 => 'Aktiv emas',
            2 => 'Aktiv'
        ];
    }

    protected $casts = [
    ];

    public function child() {
        return $this->hasMany('App\Category', 'parent_id', 'id')->where('status', 2);
    }

    public function parent() {
        return $this->hasOne('App\Category', 'id', 'parent_id')->where('status', 2);
    }

    public static function _all()
    {
        $categories = self::active()->get();
        $categories = $categories->pluck('name', 'id');

        return $categories;
    }

    public static function _all_with_inactive()
    {
        $categories = Category::get();
        $categories = $categories->pluck('name', 'id');

        return $categories;
    }
}
