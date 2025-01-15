<?php
    session_start();
    require_once "../config/koneksi.php";
    if (empty($_SESSION['username'])) {
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelaporan Pengaduan</title>
</head>
<body>
    <h1>Selamat Datang di Aplikasi Pengaduan Masyarakat</h1>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="register.php">Register</a>
        <a href="logout.php">Logout</a>
    </nav>
</body>
</html>