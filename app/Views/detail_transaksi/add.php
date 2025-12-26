<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang ke Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
<h2>Tambah Barang</h2>
<form action="<?= base_url('/detail-transaksi/store') ?>" method="post">
<input type="hidden" name="transaksi_id" value="<?= $transaksi_id ?>">
<div class="mb-3">
<label>Barang</label>
<select name="barang_id" class="form-select" required>
<option value="">-- Pilih Barang --</option>
<?php foreach($barang as $b): ?>
<option value="<?= $b['id'] ?>"><?= esc($b['nama_barang']) ?> (Stok: <?= $b['stok'] ?>)</option>
<?php endforeach; ?>
</select>
</div>
<div class="mb-3">
<label>Jumlah</label>
<input type="number" name="jumlah" class="form-control" min="1" required>
</div>
<button type="submit" class="btn btn-primary">Tambah</button>
<a href="<?= base_url('detail-transaksi/' . $transaksi_id) ?>" class="btn btn-secondary">Kembali</a>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
