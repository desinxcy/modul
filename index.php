<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Buku Tamu</h1>
    <?php
    // Inisialisasi variabel
    $nama = $email = $pesan = "";
    $error = "";

    // Cek apakah form dikirim
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validasi sederhana
        if (empty($_POST["nama"]) || empty($_POST["email"]) || empty($_POST["pesan"])) {
            $error = "Semua kolom harus diisi!";
        } else {
            // Bersihkan input untuk mencegah XSS
            $nama = htmlspecialchars($_POST["nama"]);
            $email = htmlspecialchars($_POST["email"]);
            $pesan = htmlspecialchars($_POST["pesan"]);
        }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>">

        <label for="email">Alamat Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $email; ?>">

        <label for="pesan">Pesan/Komentar:</label>
        <textarea name="pesan" id="pesan"><?php echo $pesan; ?></textarea>

        <button type="submit">Kirim Pesan</button>
    </form>
    <?php
    // Tampilkan error jika ada
    if (!empty($error)) {
        echo "<p class='error'>$error</p>";
    }
    // Tampilkan data jika valid
    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)) {
        echo "<div class='hasil'>";
        echo "<h3>Pesan Terkirim:</h3>";
        echo "<p><strong>Nama:</strong> $nama</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Pesan:</strong> $pesan</p>";
        echo "</div>";
    }
    ?>
</body>
</html>
