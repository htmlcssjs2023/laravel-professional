<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.php==
     *
     * @return void
     */
    public function run()
    {
       
      for($i=0; $i < 10; $i++){
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'gmail.com',
            'password' => Hash::make(123456)
       ]);
      }
    }
}
