<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            ['username' => 'admin', 'password' => Hash::make('admin'), 'role' => 'admin'],
            ['username' => 'resepsionis', 'password' => Hash::make('resepsionis'), 'role' => 'resepsionis'],
        ]);
    }
}
