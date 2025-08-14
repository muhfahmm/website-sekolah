<?php
require '../db/config.php';

if (isset($_POST['register'])) {
    $username = htmlspecialchars($_POST['username']);
    $password1 = htmlspecialchars($_POST['password1']);
    $password2 = htmlspecialchars($_POST['password2']);

    // cek input ada yang kosong atau tidak dan cek password
    if ($username === "") {
        echo "username tidak boleh kosong";
    } elseif ($password1 === "") {
        echo "password 1 tidak boleh kosong";
    } elseif ($password2 === "") {
        echo "password 2 tidak boleh kosong";
    } elseif ($password1 !== $password2) {
        echo "kedua password tidak sama";
    } else {
        // enkripsi password
        $password1 = password_hash($password1, PASSWORD_BCRYPT);

        // tambahkan user ke db
        mysqli_query($db, "INSERT INTO tb_admin VALUES ('', '$username', '$password1')");
        // konfirmasi user ketika ditambahkan ke db
        if (mysqli_affected_rows($db) > 0) {
            echo "<script>
                alert('User berhasil ditambahkan');
                window.location.href = 'login.php';
            </script>";
        } else {
            echo "<script>
                alert('User gagal ditambahkan');
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="username" placeholder="username">
        <br>
        <input type="password" name="password1" placeholder="password">
        <br>
        <input type="password" name="password2" placeholder="konfirmasi password">
        <br>
        <button name="register">register</button>
        <br>
        <p>sudah punya akun? <a href="login.php">masuk</a></p>
    </form>
</body>

</html>