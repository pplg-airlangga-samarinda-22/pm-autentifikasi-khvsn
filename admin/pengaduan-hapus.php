<?php
session_start();
require "../config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_pengaduan = $_GET['id'];

    $sql = "DELETE FROM pengaduan WHERE id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$id_pengaduan]);

    header("Location: pengaduan.php");
}
