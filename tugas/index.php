<?php
include 'koneksi.php';
$result = $conn->query("SELECT * FROM produk");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h2>Daftar Produk</h2>
<a class="btn btn-success mb-3" href="tambah.php">Tambah Produk Baru</a>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id_produk'] ?></td>
            <td><?= $row['nama_produk'] ?></td>
            <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
            <td><?= $row['stok'] ?></td>
            <td>
                <a class="btn btn-primary btn-sm" href="edit.php?id=<?= $row['id_produk'] ?>">Edit</a>
                <a class="btn btn-danger btn-sm" href="hapus.php?id=<?= $row['id_produk'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>
