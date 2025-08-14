<?php
session_start();
require '../db/config.php';

if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // ambil username dari database
    $query = mysqli_query($db, "SELECT * FROM tb_admin WHERE username = '$username'");

    if (mysqli_num_rows($query) === 1) {
        $row = mysqli_fetch_assoc($query);

        // cek password
        if (password_verify($password, $row['password'])) {
            // set session untuk admin
            $_SESSION['admin'] = [
                'username' => $row['username'],
                'id'       => $row['id'] // kalau ada kolom id
            ];

            // redirect ke dashboard admin
            header("Location: index.php");
            exit;
        } else {
            echo "Password salah";
        }
    } else {
        echo "Username tidak ditemukan";
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
        <input type="text" name="username" placeholder="username">
        <br>
        <input type="password" name="password" placeholder="password">
        <br>
        <button type="submit" name="login">login</button>
        <br>
        <p>belum punya akun? <a href="register.php">daftar</a></p>
    </form>
</body>
</html>