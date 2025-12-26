<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        // Mengambil waktu sekarang untuk mengisi kolom created_at dan updated_at
        $now = date('Y-m-d H:i:s');

        $data = [
            [
                'nama'       => 'Bara Saputra',
                'alamat'     => 'Jl. Merdeka No. 10',
                'telepon'    => '08123456789',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama'       => 'Siti Aminah',
                'alamat'     => 'Jl. Mawar No. 5',
                'telepon'    => '08571234567',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Menggunakan insertBatch agar lebih efisien
        $this->db->table('pelanggan')->insertBatch($data);
    }
}