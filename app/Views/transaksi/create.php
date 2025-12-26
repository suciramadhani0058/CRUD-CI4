<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">

            <h4 class="mb-4">Tambah Transaksi</h4>

            <form action="/transaksi/create" method="post">

                <!-- PELANGGAN -->
                <div class="mb-3">
                    <label class="form-label">Pelanggan</label>
                    <select name="pelanggan_id" class="form-select" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        <?php foreach ($pelanggan as $p): ?>
                            <option value="<?= $p['id'] ?>"><?= esc($p['nama']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- TANGGAL -->
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <hr>

                <!-- INPUT BARANG -->
                <div class="row g-2 align-items-end">
                    <div class="col-md-5">
                        <label class="form-label">Barang</label>
                        <select id="barang" class="form-select">
                            <option value="">-- Pilih Barang --</option>
                            <?php foreach ($barang as $b): ?>
                                <option value="<?= $b['id'] ?>" data-harga="<?= $b['harga'] ?>">
                                    <?= esc($b['nama_barang']) ?> (Rp <?= number_format($b['harga'],0,',','.') ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Jumlah</label>
                        <input type="number" id="jumlah" class="form-control" min="1">
                    </div>

                    <div class="col-md-2">
                        <button type="button" class="btn btn-success w-100" onclick="tambahBarang()">
                            Tambah
                        </button>
                    </div>
                </div>

                <!-- TABEL BELANJA -->
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="daftarBarang"></tbody>
                </table>

                <!-- TOTAL -->
                <div class="text-end mb-3">
                    <h5>Total: Rp <span id="totalText">0</span></h5>
                    <input type="hidden" name="total" id="totalInput">
                </div>

                <button class="btn btn-primary">Simpan Transaksi</button>
                <a href="/transaksi" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>
</div>

<script>
let total = 0;

function tambahBarang() {
    const barang = document.getElementById('barang');
    const jumlah = document.getElementById('jumlah').value;
    const selected = barang.options[barang.selectedIndex];

    if (!barang.value || !jumlah) return alert('Barang dan jumlah wajib diisi');

    const harga = selected.dataset.harga;
    const subtotal = harga * jumlah;

    total += subtotal;
    document.getElementById('totalText').innerText = total.toLocaleString('id-ID');
    document.getElementById('totalInput').value = total;

    const row = `
        <tr>
            <td>
                ${selected.text}
                <input type="hidden" name="barang_id[]" value="${barang.value}">
            </td>
            <td>
                ${harga}
                <input type="hidden" name="harga[]" value="${harga}">
            </td>
            <td>
                ${jumlah}
                <input type="hidden" name="jumlah[]" value="${jumlah}">
            </td>
            <td>
                ${subtotal}
                <input type="hidden" name="subtotal[]" value="${subtotal}">
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="hapusBarang(this, ${subtotal})">
                    Hapus
                </button>
            </td>
        </tr>
    `;

    document.getElementById('daftarBarang').insertAdjacentHTML('beforeend', row);

    barang.value = '';
    document.getElementById('jumlah').value = '';
}

function hapusBarang(btn, subtotal) {
    total -= subtotal;
    document.getElementById('totalText').innerText = total.toLocaleString('id-ID');
    document.getElementById('totalInput').value = total;
    btn.closest('tr').remove();
}
</script>

</body>
</html>
