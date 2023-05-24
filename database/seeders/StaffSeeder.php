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
                'email' => 'staff@example.com',
            ]);
        }
    }
