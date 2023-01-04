<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category'
    ];

    /**
     * @return BelongsToMany
     */
    public function Articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'article_category', 'category_id', 'article_id', )->withTimestamps();
    }
}
