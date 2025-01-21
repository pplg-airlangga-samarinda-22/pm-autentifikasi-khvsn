<?php
session_start();
require "../config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Periksa apakah 'id' ada di URL
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        // Query menggunakan prepared statement
        $stmt = $koneksi->prepare("SELECT * FROM petugas WHERE id_petugas = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            $nama = $row['nama_petugas'];
            $username = $row['username'];
            $password = $row['password'];
            $telepon = $row['telp'];
            $level = $row['level'];
        } else {
            echo "<script>alert('Data tidak ditemukan!'); window.location='petugas.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('ID tidak ditemukan!'); window.location='petugas.php';</script>";
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Periksa apakah 'id' ada di URL
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $nama = $_POST['nama'];
        $telepon = $_POST['telp'];
        $level = $_POST['level'];

        // Query update menggunakan prepared statement
        $stmt = $koneksi->prepare("UPDATE petugas SET nama_petugas = ?, telp = ?, level = ? WHERE id_petugas = ?");
        $stmt->bind_param("sssi", $nama, $telepon, $level, $id);
        $row = $stmt->execute();

        if ($row) {
            header("Location: petugas.php");
            exit;
        } else {
            echo "<script>alert('Gagal memperbarui petugas');</script>";
        }
    } else {
        echo "<script>alert('ID tidak ditemukan!'); window.location='petugas.php';</script>";
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Petugas</title>
</head>

<body>
    <h1>Edit Petugas</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="level">Level Akses</label>
            <select name="level" id="level">
                <!-- <option value="" disabled selected>Pilih level akses </option> -->
                <option value="admin" <?= ($level == 'admin') ? 'selected' : ''; ?>>Admin</option>
                <option value="petugas" <?= ($level == 'petugas') ? 'selected' : ''; ?>>Petugas</option>
            </select>
        </div>

        <div class="form-item">
            <label for="nama">Nama Petugas</label>
            <input type="text" name="nama" id="nama" value="<?= $nama ?>">
        </div>

        <div class="form-item">
            <label for="telepon">Telepon</label>
            <input type="tel" name="telepon" id="telepon" value="<?= $telepon ?>">
        </div>

        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?= $username ?>" disabled>
        </div>
        <button type="submit">Kirim</button>

        <a href="petugas.php">Batal</a>
    </form>
</body>

</html>