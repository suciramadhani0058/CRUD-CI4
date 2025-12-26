<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4">Tambah Pelanggan Baru</h2>

    <form action="/pelanggan/create" method="post">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" required>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="/pelanggan" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>