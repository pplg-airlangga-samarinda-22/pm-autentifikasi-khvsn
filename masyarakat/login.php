<?php
require "../config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // fungsi execute_query hanya bisa digunakan pada PHP 8.2
    $sql = "SELECT * FROM masyarakat WHERE nik=? AND username=? AND password=?";
    $row = $koneksi->execute_query($sql, [$nik, $username, $password]);

    if (mysqli_num_rows($row) == 1) {
        session_start();
        $_SESSION['nik'] = $nik;
        header("location:index.php");
    } else {
        echo "<script>alert('Gagal Login!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome-free/css/all.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/components.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            /* Menengahkan secara horizontal */
            align-items: center;
            /* Menengahkan secara vertikal */
            background-color: #f8f9fa;
            /* Warna latar belakang opsional */
        }

        .card-header {
            text-align: center;
        }

        .text-tebal {
            font-weight: bold;
            font-style: italic;
            font-family: 'Arial', sans-serif;
            font-size: 12pt;
        }
    </style>
</head>

<body>

    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Perhatian!</strong> Mohon Cek Kembali Username dan Password Anda.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
        }
    }
    ?>

    <div id="app">
        <div class="container-fluid">
            <div class="card card-info shadow">
                <div class="card-body">
                    <form action="" method="post" class="form-login">
                        <div class="login-brand">
                            <p class="text-tebal text-dark pt-2">Login</p>
                        </div>
                        <div class="form-group">
                            <label>NIK</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                                </div>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" name="username" class="form-control" placeholder="Username" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                                </div>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required="required">
                                <div class="input-group-append">
                                    <!-- <div class="input-group-text">
                                        <i class="fas fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-5">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Login
                            </button>
                        </div>
                        <a href="register.php">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>