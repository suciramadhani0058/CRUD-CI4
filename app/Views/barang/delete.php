<!DOCTYPE html>
<html>
<head>
    <title>Hapus Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet">
</head>
<body class="container mt-5">

<h2 class="mb-4">Konfirmasi Hapus Barang</h2>

<div class="alert alert-danger">
    Apakah Anda yakin ingin menghapus data barang berikut?
</div>

<form action="/barang/delete/<?= $barang['id'] ?>" method="post">
    <?= csrf_field(); ?>

    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" class="form-control" value="<?= $barang['nama_barang'] ?>" disabled>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" class="form-control" value="<?= $barang['harga'] ?>" disabled>
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" class="form-control" value="<?= $barang['stok'] ?>" disabled>
    </div>

    <button type="submit" class="btn btn-danger">Ya, Hapus Barang</button>
    <a href="/barang" class="btn btn-secondary">Batal</a>
</form>

</body>
</html>