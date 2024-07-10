<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     UserSeeder::class,
        // ]);
        // DB::table('users')->insert([
        //     'username' => 'admin',
        //     'account_name' => 'admin',
        //     'password' => Hash::make('impob'),
        //     'email' => 'admin@gmail.com',
        //     'phone' => '0343564123',
        //     'role' => '0',
        //     'balance' => '5000000',
        // ]);
        // $cate = ['Genshin Impact', 'Honkai Star Rail', 'Honkai Impact 3',  'TFT', 'Liên Quân Mobile'];
        // foreach ($cate as $gameType) {
        //     DB::table('categories')->insert([
        //         'game_type' => $gameType,
        //         'quantity' => 3000,
        //     ]);
        // }
    }
}
