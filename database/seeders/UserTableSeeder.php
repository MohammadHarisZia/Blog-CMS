<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        User::factory()->create([
            'name'          => 'Admin User',

            'email'         => 'admin@example.com',
            'password'      => bcrypt('password'),
            'type'          => User::ADMIN,
        ])->profile()->save(Profile::factory()->make());

        // Writers
        User::factory()->create([
            'name'                  => 'Michelle Jones',

            'email'                 => 'michelle@example.com',
            'password'              => bcrypt('password'),
            'type'                  => User::WRITER,
            'profile_photo_path'    => 'author/author-four.jpg'

        ])->profile()->save(Profile::factory()->make());

        User::factory()->create([
            'name'          => 'Jane Doe',
            'email'         => 'jane@example.com',
            'password'      => bcrypt('password'),
            'type'          => User::WRITER,
            'profile_photo_path'    => 'author/author-one.jpg'
        ])->profile()->save(Profile::factory()->make());

        User::factory()->create([
            'name'          => 'David Rouge',
            'email'         => 'david@example.com',
            'password'      => bcrypt('password'),
            'type'          => User::WRITER,
            'profile_photo_path'    => 'author/author-two.jpg'
        ])->profile()->save(Profile::factory()->make());

        User::factory()->create([
            'name'          => 'John Gray',
            'email'         => 'gray@example.com',
            'password'      => bcrypt('password'),
            'type'          => User::WRITER,
            'profile_photo_path'    => 'author/author-three.jpg'
        ])->profile()->save(Profile::factory()->make());

        // Moderators
        User::factory()->create([
            'name'          => 'MOD User',
            'email'         => 'mod@example.com',
            'password'      => bcrypt('password'),
            'type'          => User::MODERATOR,
            'profile_photo_path'    => 'author/author-four.jpg'
        ])->profile()->save(Profile::factory()->make());

        // Default Users
        User::factory()->create([
            'name'          => 'John Doe',
            'email'         => 'john@example.com',
            'password'      => bcrypt('password'),
            'type'          => User::
            DEFAULT,
        ])->profile()->save(Profile::factory()->make());

        User::factory()->create([
            'name'          => 'Max Doe',
            'email'         => 'max@example.com',
            'password'      => bcrypt('password'),
            'type'          => User::
            DEFAULT,
        ])->profile()->save(Profile::factory()->make());

        User::factory(10)->create()->each(function ($user) {
            $user->profile()->save(Profile::factory()->make());
        });
    }
}
