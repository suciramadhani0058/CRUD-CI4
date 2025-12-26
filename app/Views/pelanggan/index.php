<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4">Daftar Pelanggan</h2>
    <a href="/pelanggan/new" class="btn btn-primary mb-3">Tambah Pelanggan</a>
    <div class="mb-3">
    <a href="<?= base_url('/') ?>" class="btn btn-outline-secondary">
        <i class="bi bi-house-door"></i> Dashboard
    </a>
</div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($pelanggan as $p): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $p['nama'] ?></td>
                <td><?= $p['alamat'] ?></td>
                <td><?= $p['telepon'] ?></td>
                <td>
                    <a href="/pelanggan/edit/<?= $p['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/pelanggan/delete/<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>