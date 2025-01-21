<?php
session_start();
require "../config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Data Petugas</h1>
    <table>
        <thead>
            <th>No</th>
            <th>Tanggal</th>
            <th>NIK Pelapor</th>
            <th>Isi Laporan</th>
            <th>Status</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $sql = "SELECT * FROM pengaduan";
            $rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $row) {
            ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row['tgl_pengaduan'] ?></td>
                    <td><?= $row['nik'] ?></td>
                    <td><?= $row['isi_laporan'] ?></td>
                    <td><?= ($row['status'] == 0) ? 'menunggu' : (($row['status'] == 'proses') ? 'diproses' : 'selesai') ?></td>
                    <td>
                        <?php
                        if ($row['status'] == 0) {
                        ?>
                            <a href="pengaduan-proses.php?id=<?= $row['id_pengaduan'] ?>">Verifikasi</a>
                        <?php
                        } elseif ($row['status'] == 'proses') {
                        ?>
                            <a href="pengaduan-selesai.php?id=<?= $row['id_pengaduan'] ?>">Tanggapi</a>
                        <?php
                        } elseif ($row['status'] == 'selesai') {
                        ?>
                            <a href="pengaduan-lihat.php?id=<?= $row['id_pengaduan'] ?>">Lihat</a>
                        <?php
                        }
                        ?>
                        <a href="pengaduan-hapus.php?id=<?= $row['id_pengaduan'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <a href="index.php">Kembali</a>
</body>

</html>