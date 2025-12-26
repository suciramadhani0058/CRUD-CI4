<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel; 
use App\Models\PelangganModel;       
use App\Models\BarangModel;          

class Transaksi extends BaseController
{
    protected $transaksi;
    protected $detail;

    public function __construct() {
        $this->transaksi = new TransaksiModel();
        $this->detail = new DetailTransaksiModel();
    }

    public function index() {
        // Menggunakan $this->transaksi yang sudah didefinisikan di construct
        $data['transaksi'] = $this->transaksi->select('transaksi.*, pelanggan.nama as nama_pelanggan')
                                   ->join('pelanggan', 'pelanggan.id = transaksi.pelanggan_id')
                                   ->findAll();
                                   
        return view('transaksi/index', $data); 
    }

    
    public function new() {
        $pelangganModel = new PelangganModel();
        $barangModel = new BarangModel();
        
        // Mengambil data untuk pilihan dropdown di form
        $data['pelanggan'] = $pelangganModel->findAll();
        $data['barang']    = $barangModel->findAll();
        
        return view('transaksi/create', $data);
    }

    
    public function create()
    {
        $pelanggan_id = $this->request->getPost('pelanggan_id');
        $tanggal      = $this->request->getPost('tanggal');
        $barang_ids   = $this->request->getPost('barang_id'); // ARRAY
        $jumlahs      = $this->request->getPost('jumlah');    // ARRAY
        $subtotals    = $this->request->getPost('subtotal');  // ARRAY
    
        // 1️⃣ HITUNG TOTAL TRANSAKSI
        $total = array_sum($subtotals);
    
        // 2️⃣ SIMPAN TRANSAKSI
        $transaksiId = $this->transaksi->insert([
            'pelanggan_id' => $pelanggan_id,
            'tanggal'      => $tanggal,
            'total'        => $total,
        ]);
    
        $barangModel = new BarangModel();
    
        // 3️⃣ SIMPAN DETAIL TRANSAKSI (LOOP)
        for ($i = 0; $i < count($barang_ids); $i++) {
    
            $barang = $barangModel->find($barang_ids[$i]);
    
            $this->detail->insert([
                'transaksi_id' => $transaksiId,
                'barang_id'    => $barang_ids[$i],
                'jumlah'       => $jumlahs[$i],
                'subtotal'     => $subtotals[$i],
            ]);
    
            // 4️⃣ KURANGI STOK
            $barangModel->update($barang_ids[$i], [
                'stok' => $barang['stok'] - $jumlahs[$i]
            ]);
        }
    
        return redirect()->to('/transaksi')->with('success', 'Transaksi berhasil disimpan');
    }
    


    public function edit($id)
{
    $pelangganModel = new PelangganModel();

    $data['transaksi'] = $this->transaksi->find($id);
    $data['pelanggan'] = $pelangganModel->findAll();

    return view('transaksi/edit', $data);
}

public function update($id)
{
    $this->transaksi->update($id, [
        'pelanggan_id' => $this->request->getPost('pelanggan_id'),
        'tanggal'      => $this->request->getPost('tanggal'),
        'total'        => $this->request->getPost('total'),
    ]);

    return redirect()->to('/transaksi');
}


    public function delete($id) {
        // Menghapus data transaksi (Detail akan ikut terhapus karena CASCADE)
        $this->transaksi->delete($id);
        return redirect()->to('/transaksi');
    }


    public function show($id)
    {
        // Gunakan properti yang sudah ada
        $data['transaksi'] = $this->transaksi->select('transaksi.*, pelanggan.nama')
            ->join('pelanggan', 'pelanggan.id = transaksi.pelanggan_id')
            ->find($id);

        $data['detail'] = $this->detail->select('detail_transaksi.*, barang.nama_barang')
            ->join('barang', 'barang.id = detail_transaksi.barang_id')
            ->where('transaksi_id', $id)
            ->findAll();

        return view('transaksi/detail', $data);
    }
}