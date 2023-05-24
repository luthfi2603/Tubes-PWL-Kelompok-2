<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        User::create([
            'nama' => 'Muhammad Luthfi',
            'gender' => 'Pria',
            'alamat' => 'Jalan Makmur Gang Bakti No. 16 B',
            'kota' => 'Medan',
            'provinsi' => 'Sumatera Utara',
            'kode_pos' => '20114',
            'no_hp' => '088262450134',
            'username' => 'ZeeroXc',
            'password' => bcrypt('password'),
            'email' => 'luthfim904@gmail.com',
            'image' => 'assets/img/x-chan.jpg',
            'level' => '1'
        ]);

        User::create([
            'nama' => 'Ibra Rizqy Siregar',
            'gender' => 'Pria',
            'alamat' => 'Jalan Pondok Surya',
            'kota' => 'Medan',
            'provinsi' => 'Sumatera Utara',
            'kode_pos' => '20114',
            'no_hp' => '088262450134',
            'username' => 'hyohoyh',
            'password' => bcrypt('password'),
            'email' => 'rizqyibra@gmail.com',
            'image' => 'assets/img/tmSwepl51YYnBpQQqgZOU3G32OnSAZrwf7J97tx9.jpg',
            'level' => '0'
        ]);

        Product::factory(30)->create();
    }
}