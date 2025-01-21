<?php
session_start();
require "../config/koneksi.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pengaduan WHERE id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$id])->fetch_assoc();
    $nik = $row['nik'];
    $laporan = $row['isi_laporan'];
    $foto = $row['foto'];
    $status = $row['status'];
} elseif ($_SERVER['REQUEST_METHOD'] = 'POST') {
    $id_petugas = $_SESSION['id_petugas'];
    $id_pengaduan = $_GET['id'];
    $tanggal = date('Y-m-d');
    $tanggapan = $_POST['tanggapan'];
    $status = 'selesai';

    // update pengaduan
    $sql = "UPDATE pengaduan SET status=? WHERE id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$status, $id_pengaduan]);
    // kirim tanggapan
    $sql = "INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) values (?, ?, ?, ?)";
    $row = $koneksi->execute_query($sql, [$id_pengaduan, $tanggal, $tanggapan, $id_petugas]);
    header("location: pengaduan.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanggapi Pengaduan</title>
</head>

<body>
    <h1>Tanggapi Pengaduan</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="laporan">Isi Laporan</label>
            <textarea name="laporan" id="laporan" readonly><?= $laporan ?></textarea>
        </div>
        <div class="form-item">
            <label for="foto">Foto</label>
            <img src="../gambar/<?= $foto ?>" alt="" width="250px">
        </div>
        <div class="form-item">
            <label for="tanggapan">Tanggapan</label>
            <textarea name="tanggapan" id="tanggapan"></textarea>
        </div>
        <button type="submit" name="selesai">Submit</button>
    </form>
    <a href="pengaduan.php">Kembali</a>
</body>

</html>