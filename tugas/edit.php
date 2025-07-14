<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM produk WHERE id_produk = $id");
    $data = $result->fetch_assoc();
} else {
    die("ID tidak ditemukan.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $sql = "UPDATE produk SET nama_produk='$nama', harga=$harga, stok=$stok WHERE id_produk=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h2>Edit Produk</h2>
<form method="post">
    <div class="mb-3">
        <label class="form-label">Nama Produk:</label>
        <input type="text" name="nama_produk" class="form-control" value="<?= $data['nama_produk'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Harga:</label>
        <input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Stok:</label>
        <input type="number" name="stok" class="form-control" value="<?= $data['stok'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</body>
</html>
