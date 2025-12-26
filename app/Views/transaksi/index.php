<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Transaksi</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 12px;
        }
        .table thead {
            background-color: #0d6efd;
            color: white;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold mb-0">📋 Daftar Transaksi</h3>
                <a href="/transaksi/new" class="btn btn-primary">
                    + Tambah Transaksi
                </a>
            </div>
            <div class="mb-3">
            <a href="<?= base_url('/') ?>" class="btn btn-outline-secondary">
                <i class="bi bi-house-door"></i> Dashboard
            </a>
                </div>

            <table class="table table-bordered table-hover text-center align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
<?php $no = 1; ?>
<?php if (!empty($transaksi)): ?>
    <?php foreach ($transaksi as $t): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($t['nama_pelanggan']) ?></td>
            <td><?= esc($t['tanggal']) ?></td>
            <td>Rp <?= number_format($t['total'], 0, ',', '.') ?></td>
            <td>

            <a href="/detail-transaksi/<?= $t['id'] ?>" class="btn btn-info btn-sm">Detail</a>


                <!-- Link edit transaksi -->
                <a href="/transaksi/edit/<?= $t['id'] ?>" 
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <!-- Link hapus transaksi -->
                <a href="/transaksi/delete/<?= $t['id'] ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin ingin menghapus transaksi ini?')">
                   Hapus
                </a>
            </td>
        </tr>
    <?php endforeach ?>
<?php else: ?>
    <tr>
        <td colspan="5" class="text-center">Belum ada data</td>
    </tr>
<?php endif ?>
</tbody>

            </table>

        </div>
    </div>
</div>

</body>
</html>
