<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;

class CategoryToArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Populate union table categories to articles
        $articles = Article::all();

        Category::all()->each(function ($categories) use ($articles) {
            $categories->articles()->attach(
                $articles->pluck('id')->toArray()
            );
        });
    }
}
