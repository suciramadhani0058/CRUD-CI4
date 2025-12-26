<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'pelanggan_id' => 1,
                'tanggal'      => date('Y-m-d'),
                'total'        => 100000,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ]
        ];
        

        $this->db->table('transaksi')->insertBatch($data);
    }
}
