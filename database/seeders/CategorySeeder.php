<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(5)->create()->each(function(Category $category) {
            $category->articles()->sync(Article::inRandomOrder()->limit(4)->get('id')->pluck('id'));
        });
    }
}
