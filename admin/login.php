<?php
require "../config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // fungsi execute_query hanya bisa digunakan pada PHP 8.2
    $sql = "SELECT * FROM petugas WHERE username=? AND password=?";
    $row = $koneksi->execute_query($sql, [$username, $password]);

    if (mysqli_num_rows($row) == 1) {
        session_start();
        $_SESSION['username'] = $username;
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
</head>

<body>
    <form action="" method="post" class="form-login">
        <p>Silahkan Login Sebagai Admin</p>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <!-- <div class="form-item">
            <label for="level">Level</label>
            <div class=""></div>
        </div> -->
        <button type="submit">Login</button>
        <!-- <a href="register.php">Register</a> -->
    </form>
</body>

</html>