<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article';
    
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function get_article_by_category_id($category_id, $limit) {
        $articles = Article::where('category_id', $category_id)
        ->where('status', 1)
        ->orderBy('created_at', 'desc')
        ->get();

        return $articles;
    }
}
