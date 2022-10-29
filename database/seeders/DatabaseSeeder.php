<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TagTableSeeder;
use Database\Seeders\PlanTableSeeder;
use Database\Seeders\PostTableSeeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\CommentTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(PlanTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(TagTableSeeder::class);
    }
}
