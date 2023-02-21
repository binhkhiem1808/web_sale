<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'content', 'user_id', 'category_id', 'feature_image_path', 'feature_image_name', 'created_at', 'updated_at'];
    
    // public function 
    
}
