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
        $this->call([
            UserSeeder::class,
        ]);
        // DB::table('users')->insert([
        //     'username' => 'admin',
        //     'account_name' => 'admin',
        //     'password' => Hash::make('impob'),
        //     'email' => 'anhdinh080tnx@gmail.com',
        //     'phone' => '0343564138',
        //     'role' => '0',
        //     'balance' => '100000',
        // ]);
        // $totalAccounts = 100;
        // $cateId = [1, 2, 3, 4];
        // $serves = ['HongKong', 'Asian', 'Eu', 'Us'];
        // $count = 1; // Biến đếm

        // // Sử dụng vòng lặp để tạo các tài khoản
        // for ($i = 1; $i <= $totalAccounts; $i++) {
        //     foreach ($cateId as $id) {
        //         foreach ($serves as $serve) {
        //             $price = rand(10000, 9000000);
        //             DB::table('accounts')->insert([
        //                 'description' => 'Acc vip ' . $count,
        //                 'price' => $price,
        //                 'server' => $serve,
        //                 'ar' => '30',
        //                 'nameAccount' => 'acctest' . $count,
        //                 'passAccount' => 'password',
        //                 'status' => $count % 2 == 0 ? '2' : '1',
        //                 'account_type_id' => $id,
        //             ]);
        //             $count++;
        //         }
        //     }
        // }

        // $cate = ['Genshin Impact', 'Honkai Star Rail', 'Honkai Impact 3',  'TFT', 'Liên Quân Mobile'];
        // foreach ($cate as $gameType) {
        //     DB::table('categories')->insert([
        //         'game_type' => $gameType,
        //         'quantity' => 12,
        //     ]);
        // }
    }
}
