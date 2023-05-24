<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

    class AdminSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run()
        {
            DB::table('akun_admin')->insert([
                'username' => 'admin321',
                'password' => bcrypt('87654321'),
                'firstName' => 'Desitano',
                'lastName' => 'Alif',
                'email' => 'admin321@example.com',
            ]);
        }
    }
