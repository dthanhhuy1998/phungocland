<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function posts() {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }

    public function child() {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
