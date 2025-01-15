<?php
require "../config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $nama_petugas = $_POST['nama_petugas'];

    // Check if NIK is already registered
    $sql = "SELECT * FROM petugas WHERE nama_petugas=?";
    $cek = $koneksi->execute_query($sql, [$nama_petugas]);

    if (mysqli_num_rows($cek) === 1) {
        echo "<script>alert('nama sudah digunakan!');</script>";
    } else {
        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $level = $_POST['level'];

        $sql = "INSERT INTO masyarakat (nama, telp, username, password, level) VALUES (?, ?, ?, ?, ?)";
        $koneksi->execute_query($sql, [$nama, $telepon, $username, $password, $level]);

        echo "<script>alert('Pendaftaran berhasil!');</script>";
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registrasi</title>
</head>
<body>
    <h1>Registrasi Pengguna Baru</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <div class="form-item">
            <label for="telepon">Telepon</label>
            <input type="tel" name="telepon" id="telepon" required>
        </div>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Register</button>
    </form>
    <a href="login.php">Batal</a>
</body>
</html>

