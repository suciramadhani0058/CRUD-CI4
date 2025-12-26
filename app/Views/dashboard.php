<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }
        .card {
            border-radius: 15px;
        }
        .icon {
            font-size: 40px;
            opacity: 0.8;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4 fw-bold">📊 Dashboard Toko FS</h2>

    <div class="row g-4">

        <!-- Pelanggan -->
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Pelanggan</h6>
                        <h2><?= $jumlahPelanggan ?></h2>
                        <a href="/pelanggan" class="text-white text-decoration-none">
                            Lihat data →
                        </a>
                    </div>
                    <i class="bi bi-people-fill icon"></i>
                </div>
            </div>
        </div>

        <!-- Barang -->
        <div class="col-md-4">
            <div class="card text-white bg-success shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Barang</h6>
                        <h2><?= $jumlahBarang ?></h2>
                        <a href="/barang" class="text-white text-decoration-none">
                            Lihat data →
                        </a>
                    </div>
                    <i class="bi bi-box-seam icon"></i>
                </div>
            </div>
        </div>

        <!-- Transaksi -->
        <div class="col-md-4">
            <div class="card text-white bg-warning shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Transaksi</h6>
                        <h2><?= $jumlahTransaksi ?></h2>
                        <a href="/transaksi" class="text-white text-decoration-none">
                            Lihat data →
                        </a>
                    </div>
                    <i class="bi bi-receipt icon"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- Tombol cepat -->
    <div class="mt-5">
        <h5 class="fw-bold mb-3">⚡ Akses Cepat</h5>
        <a href="/transaksi/new" class="btn btn-primary me-2">
            + Transaksi Baru
        </a>
        <a href="/barang/new" class="btn btn-success me-2">
            + Barang
        </a>
        <a href="/pelanggan/new" class="btn btn-secondary">
            + Pelanggan
        </a>
    </div>

</div>

</body>
</html>
