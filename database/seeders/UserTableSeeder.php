<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Populate 5 users with 10 articles each other
        User::factory(5)->create()->each(function ($user) {
            $user->articles()->saveMany(Article::factory(10)->make());
        });
    }
}
