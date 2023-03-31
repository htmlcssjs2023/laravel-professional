<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Post::factory(10)->create();
        // $this->call([
        //     UserSeeder::class
        // ]);


        // Image::factory(1)->create();
        Post::factory(1)->create();
        // Tag::factory(1)->create();
        // User::factory()->create();

        $this->call([
            PostSeeder::class
            // TagSeeder::class,
            // UserSeeder::class
        ]);
    }
}
