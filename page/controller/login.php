<?php
session_start();
require '../../db/config.php';

if (isset($_POST['login'])) {
    // ambil parameter
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    // ambil username
    $result = mysqli_query($db, "SELECT * FROM tb_user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        // ambil data user
        $row = mysqli_fetch_assoc($result);

        // verifikasi password
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            echo "<script>alert('Login berhasil!'); window.location.href='../index.php';</script>";
            exit;
        } else {
            echo "password salah";
        }
    } else {
        echo "username tidak ditemukan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username" placeholder="username" required>
        <br>
        <input type="password" name="password" placeholder="password" required>
        <br>
        <button type="submit" name="login">Login</button>
        <br>
        <p>belum punya akun? <a href="./register.php">register</a></p>
    </form>
</body>
</html>
