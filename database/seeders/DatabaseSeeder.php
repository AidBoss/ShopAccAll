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
        $totalAccounts = 100;
        // Sử dụng vòng lặp để tạo các tài khoản
        for ($i = 1; $i <= $totalAccounts; $i++) {
            $cateId = [1, 2, 3, 4];
            $serves = ['HongKong', 'Asian', 'Eu', 'Us'];
            $count = 1; // Biến đếm
            foreach ($cateId as $id) {
                foreach ($serves as $serve) {
                    DB::table('accounts')->insert([
                        'description' => 'Acc vip ' . $count,
                        'price' => '120000',
                        'server' => $serve,
                        'ar' => '30',
                        'status' => $count % 2 == 0 ? '2' : '1',
                        'account_type_id' => $id,
                    ]);
                    $count++;
                }
            }
        }

        // $cate = ['Genshin Impact', 'Honkai Star Rail', 'Honkai Impact 3',  'TFT', 'Liên Quân Mobile'];
        // foreach ($cate as $gameType) {
        //     DB::table('categories')->insert([
        //         'game_type' => $gameType,
        //         'quantity' => 3000,
        //     ]);
        // }
    }
}
