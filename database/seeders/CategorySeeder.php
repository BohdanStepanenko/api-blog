<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            Categories::create($category);
        }
    }
}
