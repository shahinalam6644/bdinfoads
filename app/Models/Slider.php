<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'title',
        'sub_title',
        'short_des',
        'thamb_path',
        'status',
        'trash',
    ];
}