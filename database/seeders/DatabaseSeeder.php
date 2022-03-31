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
            ['nama'=>'Swimming Pool', 'deskripsi' => 'disini terdapat 2 kolam renang dengan kedalaman 2 meter dan 1/2 meter', 'gambar' => '1648699814_41238-fasilitas-swimming-pool-di-the-rich-hotel-jogja-istimewa.jpg'],
            ['nama'=>'Cafe And Restaurant', 'deskripsi' => 'disini tersedia berbagai macam makanan dan minuman untuk para tamu yg sedang ingin santai', 'gambar' => '1648453205_bogor-cafe-03-min.jpg'],
            ['nama'=>'Masjid', 'deskripsi' => 'disini terdapat masjid untuk umat islam beribadah', 'gambar' => '1648700339_masjid-al-mahdi-le-eminence.jpg'],
        ]);
        DB::table('room')->insert([
            ['no' => 1, 'id_jenis' => 1,'bed'=>'Single Bed', 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, kapasitas 1 orang', 'harga'=> 350000, 'status' => 0, 'gambar' => '1648058591_1326889680.jpg'],
            ['no' => 1, 'id_jenis' => 3,'bed'=>'Single', 'deskripsi' => '1', 'harga'=> 1, 'status' => 0, 'gambar' => '1648131965_DSC09490(1)2.jpg'],
            ['no' => 2, 'id_jenis' => 1,'bed'=>'Double Bed', 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, kapasitas 2 orang', 'harga'=> 365000, 'status' => 0, 'gambar' => '1648128667_dblbed.jpeg'],
            ['no' => 3, 'id_jenis' => 1,'bed'=>'Twin Bed', 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, kapasitas 2 orang', 'harga'=> 355000, 'status' => 0, 'gambar' => '1648132055_room-deluxetwin.jpg'],
            ['no' => 4, 'id_jenis' => 2,'bed'=>'Single Bed', 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, kapasitas 1 orang, sofa, televisi', 'harga'=> 480000, 'status' => 0, 'gambar' => '1648132741_single-standard-room.jpg'],
            ['no' => 5, 'id_jenis' => 2,'bed'=>'Double Bed', 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, kapasitas 2 orang, sofa, televisi', 'harga'=> 490000, 'status' => 0, 'gambar' => '1648132831_double-standard-comfort.jpg'],
            ['no' => 6, 'id_jenis' => 2,'bed'=>'Twin Bed', 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, kapasitas 2 orang, sofa, televisi', 'harga'=> 505000, 'status' => 0, 'gambar' => '1648132968_twin-standard-room.jpg'],
            ['no' => 7, 'id_jenis' => 1,'bed'=>'Twin Bed', 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, kapasitas 2 orang', 'harga'=> 365000, 'status' => 0, 'gambar' => '1648440961_138495556.jpg'],
            ['no' => 8, 'id_jenis' => 1,'bed'=>'Double Bed', 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, kapasitas 2 orang', 'harga'=> 380000, 'status' => 0, 'gambar' => '1648441169_Superior-Room-Double-Bed.jpg'],
            ['no' => 9, 'id_jenis' => 1,'bed'=>'Twin Bed', 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, kapasitas 2 orang', 'harga'=> 359000, 'status' => 0, 'gambar' => '1648441212_double-bedded-room-standard.jpg'],
            ['no' => 10, 'id_jenis' => 2,'bed'=>'Single Bed', 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, kapasitas 1 orang, sofa, televisi', 'harga'=> 500000, 'status' => 0, 'gambar' => '1648441273_1a-Superior-Single-Room-min1.jpg'],
            ['no' => 11, 'id_jenis' => 2,'bed'=>'Single Bed', 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, kapasitas 1 orang, sofa, televisi', 'harga'=> 510000, 'status' => 0, 'gambar' => '1648441309_hotelcastillo.webp'],
            ['no' => 12, 'id_jenis' => 2,'bed'=>'Single Bed', 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, kapasitas 1 orang, sofa, televisi', 'harga'=> 515000, 'status' => 0, 'gambar' => '1648441343_image_2019-02-24-07-50-43_5c723ec361c43__dsc3230-single-crop.jpg'],
        ]);
    }
}
