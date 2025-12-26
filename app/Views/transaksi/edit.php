<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">

            <h4 class="mb-4">✏️ Edit Transaksi</h4>

            <form action="/transaksi/update/<?= $transaksi['id'] ?>" method="post">

                <div class="mb-3">
                    <label class="form-label">Pelanggan</label>
                    <select name="pelanggan_id" class="form-select">
                        <?php foreach ($pelanggan as $p): ?>
                            <option value="<?= $p['id'] ?>"
                                <?= $p['id'] == $transaksi['pelanggan_id'] ? 'selected' : '' ?>>
                                <?= esc($p['nama']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal"
                           value="<?= $transaksi['tanggal'] ?>"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Total</label>
                    <input type="number" name="total"
                           value="<?= $transaksi['total'] ?>"
                           class="form-control">
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="/transaksi" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>
</div>

</body>
</html>
