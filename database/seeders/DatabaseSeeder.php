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
        DB::table('jenis')->insert([
            ['nama' => 'Standard Room'],
            ['nama' => 'Deluxe Room'],
            ['nama' => 'Superior'],
        ]);
        DB::table('fasilitas')->insert([
            ['nama'=>'Swimming Pool', 'deskripsi' => 'disini terdapat 2 kolam renang dengan kedalaman 2 meter dan 1/2 meter', 'gambar' => '/fasilitas/1648699814_41238-fasilitas-swimming-pool-di-the-rich-hotel-jogja-istimewa.jpg'],
        ]);
        DB::table('room')->insert([
            ['no' => 1, 'id_jenis' => 1,'bed'=>'Single Bed', 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, double bed, kapasitas 1 orang', 'harga'=> 350000, 'status' => 0, 'gambar' => '/kamar/1648058591_1326889680.jpg'],

        ]);
    }
}
