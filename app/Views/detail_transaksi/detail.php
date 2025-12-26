<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
<h2>Detail Transaksi</h2>
<p><strong>Pelanggan:</strong> <?= esc($transaksi['nama_pelanggan']) ?></p>
<p><strong>Tanggal:</strong> <?= esc($transaksi['tanggal']) ?></p>

<a href="<?= base_url('detail-transaksi/add/' . $transaksi['id']) ?>" class="btn btn-primary">Tambah Barang</a>
<a href="<?= base_url('/transaksi') ?>" class="btn btn-secondary">Kembali</a>

<table class="table table-bordered mt-3 text-center">
<thead>
<tr>
<th>No</th>
<th>Nama Barang</th>
<th>Harga</th>
<th>Jumlah</th>
<th>Subtotal</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $no=1; $total=0; ?>
<?php foreach($detail as $d): ?>
<tr>
<td><?= $no++ ?></td>
<td><?= esc($d['nama_barang']) ?></td>
<td>Rp <?= number_format($d['harga_barang'],0,',','.') ?></td>
<td><?= esc($d['jumlah']) ?></td>
<td>Rp <?= number_format($d['subtotal'],0,',','.') ?></td>
<td>
<a href="<?= base_url('detail-transaksi/delete/' . $d['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
</td>
</tr>
<?php $total += $d['subtotal']; endforeach; ?>
</tbody>
<tfoot>
<tr>
<th colspan="4">Total</th>
<th colspan="2">Rp <?= number_format($total,0,',','.') ?></th>
</tr>
</tfoot>
</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
