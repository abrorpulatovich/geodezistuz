<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'rezume_id',
        'old_company_name',
        'position_name',
        'from_date',
        'to_date'
    ];
}
