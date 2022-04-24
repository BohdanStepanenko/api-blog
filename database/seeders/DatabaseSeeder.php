<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Populate 5 users with 10 articles each other
        User::factory(5)->create()->each(function ($user) {
            $user->articles()->saveMany(Article::factory(10)->make());
        });

        // Populate categories
        $categories = [
            [
                'title' => 'PHP',
            ],
            [
                'title' => 'JavaScript',
            ],
            [
                'title' => 'Python',
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Populate pivot table categories to articles
        $articles = Article::all();

        Category::all()->each(function ($categories) use ($articles) {
            $categories->articles()->attach(
                $articles->pluck('id')->toArray()
            );
        });
    }
}
