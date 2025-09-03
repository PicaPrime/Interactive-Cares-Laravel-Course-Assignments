<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $guarded = [];
    


    // Parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Child categories
    public function children()
    {
        return $this->hasMany(Category::class, 'category_id');
    }
    

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_post', 'category_id', 'post_id');
    }
}
