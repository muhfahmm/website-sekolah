<?php
session_start();
require '../db/config.php';

if (isset($_POST['register'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $confirm  = htmlspecialchars($_POST['confirm']);

    // cek apakah username sudah ada
    $check = mysqli_query($db, "SELECT * FROM tb_admin WHERE username = '$username'");
    if (mysqli_num_rows($check) > 0) {
        echo "Username sudah digunakan";
    } else {
        // cek konfirmasi password
        if ($password !== $confirm) {
            echo "Konfirmasi password tidak sama";
        } else {
            // hash password
            $hashed = password_hash($password, PASSWORD_DEFAULT);

            // simpan ke database
            $query = mysqli_query($db, "INSERT INTO tb_admin (username, password) VALUES ('$username', '$hashed')");

            if ($query) {
                // set session otomatis login setelah daftar
                $_SESSION['admin'] = [
                    'username' => $username,
                    'id'       => mysqli_insert_id($db)
                ];

                header("Location: index.php");
                exit;
            } else {
                echo "Pendaftaran gagal: " . mysqli_error($db);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username" placeholder="username" required>
        <br>
        <input type="password" name="password" placeholder="password" required>
        <br>
        <input type="password" name="confirm" placeholder="konfirmasi password" required>
        <br>
        <button type="submit" name="register">Register</button>
        <br>
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </form>
</body>
</html>
