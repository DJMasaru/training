<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content',
    ];

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
//        Articleというクラスに対し、Categoryクラスが関係している。その関係をpivot tableであるarticle_categoryを介す。
//        参照元はArticleクラスということでarticle_idで、参照先はcategory_idとなる。
        return $this->belongsToMany(Category::class, 'article_category', 'article_id', 'category_id', )->withTimestamps();
    }
}

