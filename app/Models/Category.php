<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'description'
    ];



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
        return $this->hasMany(Post::class);
    }
}
