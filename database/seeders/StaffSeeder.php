<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
        {
            DB::table('akun_staff')->insert([
                'username' => 'staff123',
                'password' => bcrypt('12345678'),
                'firstName' => 'Misael',
                'lastName' => 'Riciardo',
                'file' => '1686935485_Screenshot-2023-05-24-at-21-27-17-collage-maker-24-may-2023-08-41-am-47avif-AVIF-Image-1140-570-pixels-2649790925.png',
                'email' => 'staff@example.com',
            ]);
        }
    }
