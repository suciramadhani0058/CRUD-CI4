<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        // Mendefinisikan waktu sekarang untuk timestamp manual
        $now = date('Y-m-d H:i:s');

        $data = [
            [
                'nama_barang' => 'Beras',
                'harga'       => 15000,
                'stok'        => 20,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_barang' => 'Gula Pasir',
                'harga'       => 12000,
                'stok'        => 100,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_barang' => 'Minyak Goreng',
                'harga'       => 25000,
                'stok'        => 20,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_barang' => 'Telur Ayam',
                'harga'       => 35000,
                'stok'        => 15,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_barang' => 'Kopi Bubuk',
                'harga'       => 5000,
                'stok'        => 17,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ];

        // Menggunakan insertBatch untuk memasukkan semua data sekaligus
        $this->db->table('barang')->insertBatch($data);
    }
}