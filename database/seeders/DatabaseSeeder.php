<?php

namespace Database\Seeders;

use \App\Models\User;
use App\Models\Product;
use App\Models\MasterKategori;
use App\Models\MasterSupplier;
use App\Models\MasterPelanggan;
use Illuminate\Database\Seeder;
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
        User::create([
            'name' => 'Admin',
            'status' => "Admin",
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
        User::create([
            'name' => 'Nafi',
            'status' => "Admin",
            'email' => 'nafi1234@gmail.com',
            'password' => Hash::make('nafi1234'),
        ]);
        MasterPelanggan::create([
            'nama_pelanggan' => 'Dendi',
            'telepon' => '082176837261',
        ]);

        MasterPelanggan::create([
            'nama_pelanggan' => 'Yanto',
            'telepon' => '082176822261',
        ]);

        MasterSupplier::create([
            'nama_supplier' => 'PT Aji Sardo',
            'telepon' => '082132521664',
            'email' => 'ajisardo123@gmail.com',
            'alamat' => "Surabaya",
        ]);
        MasterSupplier::create([
            'nama_supplier' => 'PT Bikang',
            'telepon' => '082132521665',
            'email' => 'bikang123@gmail.com',
            'alamat' => "Malang",
        ]);
        Product::create([
            'nama_produk' => "PC Gaming",
            'deskripsi_produk' => "PC Gaming low budget",
            'harga' => 4000000,
            'id_kategori' => 1,
            'id_supplier' => 1,
            'gambar' => "",
        ]);
        Product::create([
            'nama_produk' => "Laptop Gaming",
            'deskripsi_produk' => "Laptop Gaming low budget",
            'harga' => 7000000,
            'id_kategori' => 1,
            'id_supplier' => 1,
            'gambar' => "",
        ]);
        Product::create([
            'nama_produk' => "Mouse Gaming",
            'deskripsi_produk' => "Mouse Gaming low budget",
            'harga' => 20000,
            'id_kategori' => 1,
            'id_supplier' => 1,
            'gambar' => "",
        ]);
        Product::create([
            'nama_produk' => "Keyboard Gaming",
            'deskripsi_produk' => "Keyboard Gaming low budget",
            'harga' => 70000,
            'id_kategori' => 1,
            'id_supplier' => 1,
            'gambar' => "",
        ]);
        Product::create([
            'nama_produk' => "Monitor Gaming",
            'deskripsi_produk' => "Monitor Gaming low budget",
            'harga' => 1000000,
            'id_kategori' => 1,
            'id_supplier' => 1,
            'gambar' => "",
        ]);
        Product::create([
            'nama_produk' => "Sound Gaming",
            'deskripsi_produk' => "Sound Gaming low budget",
            'harga' => 300000,
            'id_kategori' => 1,
            'id_supplier' => 1,
            'gambar' => "",
        ]);
        Product::create([
            'nama_produk' => "Headset Gaming",
            'deskripsi_produk' => "Headset Gaming low budget",
            'harga' => 350000,
            'id_kategori' => 1,
            'id_supplier' => 1,
            'gambar' => "",
        ]);
        Product::create([
            'nama_produk' => "Xiaomi Gaming",
            'deskripsi_produk' => "Xiaomi Gaming low budget",
            'harga' => 4500000,
            'id_kategori' => 1,
            'id_supplier' => 1,
            'gambar' => "",
        ]);
        Product::create([
            'nama_produk' => "Majoo Pro",
            'deskripsi_produk' => "-",
            'harga' => 2750000,
            'id_kategori' => 1,
            'id_supplier' => 1,
            'gambar' => "standard_repo.png",
        ]);
        Product::create([
            'nama_produk' => "Majoo Advance",
            'deskripsi_produk' => "-",
            'harga' => 2750000,
            'id_kategori' => 1,
            'id_supplier' => 2,
            'gambar' => "paket-advance.png",
        ]);
        Product::create([
            'nama_produk' => "Majo Lifestyle",
            'deskripsi_produk' => "-",
            'harga' => 2750000,
            'id_kategori' => 1,
            'id_supplier' => 1,
            'gambar' => "paket-lifestyle.png",
        ]);
        Product::create([
            'nama_produk' => "Majoo Desktop",
            'deskripsi_produk' => "-",
            'harga' => 2750000,
            'id_kategori' => 1,
            'id_supplier' => 2,
            'gambar' => "paket-desktop.png",
        ]);

        MasterKategori::create([
            'nama_kategori' => "Elektronik",
        ]);
        MasterKategori::create([
            'nama_kategori' => "Fashion",
        ]);
    }
}
