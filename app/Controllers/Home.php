<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();

        $jumlahPelanggan = $db->query("SELECT COUNT(*) AS total FROM pelanggan")->getRow()->total;
        $jumlahBarang    = $db->query("SELECT COUNT(*) AS total FROM barang")->getRow()->total;
        $jumlahTransaksi = $db->query("SELECT COUNT(*) AS total FROM transaksi")->getRow()->total;

        return view('dashboard', [
            'jumlahPelanggan' => $jumlahPelanggan,
            'jumlahBarang'    => $jumlahBarang,
            'jumlahTransaksi' => $jumlahTransaksi,
        ]);
        
    }
}
