<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
