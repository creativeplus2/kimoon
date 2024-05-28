<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'featured_image'];

    protected $casts = ['title' => 'string', 'slug' => 'string', 'description' => 'string', 'featured_image' => 'string'];


}
