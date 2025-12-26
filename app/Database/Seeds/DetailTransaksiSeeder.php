<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DetailTransaksiSeeder extends Seeder
{
    public function run()
    {

        $data = [
            [
                'transaksi_id' => 1,
                'barang_id'    => 1,
                'jumlah'       => 2,
                'subtotal'     => 30000,
            ],
        ];
        

        $this->db->table('detail_transaksi')->insertBatch($data);
    }
}