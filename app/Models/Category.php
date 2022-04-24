<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Article;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [];
    protected $table = 'categories';
    public $timestamps = false;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'category_article');
    }
}
