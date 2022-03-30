<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'admin', 'password' => Hash::make('admin'), 'level' => 'admin'],
            ['username' => 'resepsionis', 'password' => Hash::make('resepsionis'), 'level' => 'resepsionis'],
        ]);
    }
}
