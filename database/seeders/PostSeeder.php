<?php

namespace Database\Seeders;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::find();
       Post::create([
            'title' => 'Laravel 9',
            'description' => 'Laravel 9 changes some',
            'is_publish' => true,
            'is_active' => false,
            // 'user_id' => User::factory()
            'user_id' => $user->id
       ]);
    }
}
