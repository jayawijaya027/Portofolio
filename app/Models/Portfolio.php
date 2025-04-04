<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'programming_language',
        'database',
        'frontend',
        'backend',
        'additional_features',
        'github_url',
        'demo_url',
        'image',
        'image_path',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
} 