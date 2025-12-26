<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailTransaksiModel;
use App\Models\BarangModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class DetailTransaksi extends BaseController
{
    protected $detailModel;
    protected $barangModel;

    public function __construct()
    {
        $this->detailModel = new DetailTransaksiModel();
        $this->barangModel = new BarangModel();
    }

    // Menampilkan detail transaksi
    public function byTransaksi($id)
    {
        $transaksi = $this->detailModel->db->table('transaksi')
            ->select('transaksi.*, pelanggan.nama as nama_pelanggan')
            ->join('pelanggan', 'pelanggan.id = transaksi.pelanggan_id')
            ->where('transaksi.id', $id)
            ->get()
            ->getRowArray();

        if (!$transaksi) throw new PageNotFoundException('Transaksi tidak ditemukan');

        $detail = $this->detailModel
            ->select('detail_transaksi.*, barang.nama_barang, barang.harga as harga_barang')
            ->join('barang', 'barang.id = detail_transaksi.barang_id')
            ->where('transaksi_id', $id)
            ->findAll();

        return view('detail_transaksi/detail', [
            'transaksi' => $transaksi,
            'detail' => $detail
        ]);
    }

    // Form tambah barang ke transaksi
    public function add($transaksi_id)
    {
        $barang = $this->barangModel->findAll();
        return view('detail_transaksi/add', [
            'transaksi_id' => $transaksi_id,
            'barang' => $barang
        ]);
    }

    // Simpan detail transaksi
    public function store()
    {
        $transaksi_id = $this->request->getPost('transaksi_id');
        $barang_id = $this->request->getPost('barang_id');
        $jumlah = (int)$this->request->getPost('jumlah');

        $barang = $this->barangModel->find($barang_id);
        if (!$barang) return redirect()->back()->with('error', 'Barang tidak ditemukan');
        if ($jumlah > $barang['stok']) return redirect()->back()->with('error', 'Stok tidak mencukupi');

        $subtotal = $barang['harga'] * $jumlah;

        $this->detailModel->insert([
            'transaksi_id' => $transaksi_id,
            'barang_id' => $barang_id,
            'jumlah' => $jumlah,
            'subtotal' => $subtotal
        ]);

        $this->barangModel->update($barang_id, ['stok' => $barang['stok'] - $jumlah]);

        // Update total transaksi
        $this->updateTotal($transaksi_id);

        return redirect()->to('/detail-transaksi/' . $transaksi_id);
    }

    // Hapus detail transaksi
    public function delete($id)
    {
        $detail = $this->detailModel->find($id);
        if (!$detail) return redirect()->back()->with('error', 'Detail transaksi tidak ditemukan');

        $barang = $this->barangModel->find($detail['barang_id']);
        if ($barang) $this->barangModel->update($barang['id'], ['stok' => $barang['stok'] + $detail['jumlah']]);

        $transaksi_id = $detail['transaksi_id'];
        $this->detailModel->delete($id);

        // Update total transaksi
        $this->updateTotal($transaksi_id);

        return redirect()->back();
    }

    // Update total transaksi
    private function updateTotal($transaksi_id)
    {
        $detail = $this->detailModel->where('transaksi_id', $transaksi_id)->findAll();
        $total = 0;
        foreach ($detail as $d) $total += $d['subtotal'];

        $this->detailModel->db->table('transaksi')->where('id', $transaksi_id)->update(['total' => $total]);
    }
}
