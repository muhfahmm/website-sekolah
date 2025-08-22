<?php
include "../../db/config.php";

if(isset($_POST['submit'])){
    $nip = $_POST['nip'];
    $nama_guru = $_POST['nama_guru'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $jabatan = $_POST['jabatan'];
    $nomor_hp = $_POST['nomor_hp'];
    $gmail = $_POST['gmail'];
    $alamat = $_POST['alamat'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    if($foto){
        $path = "../uploads/".$foto;
        move_uploaded_file($tmp, $path);
    } else {
        $foto = "default.png";
    }

    $query = "INSERT INTO tb_guru (nip, nama_guru, mata_pelajaran, jabatan, foto, nomor_hp, gmail, alamat) 
              VALUES ('$nip','$nama_guru','$mata_pelajaran','$jabatan','$foto','$nomor_hp','$gmail','$alamat')";
    if(mysqli_query($db, $query)){
        header("Location: gurustaff.php");
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tambah Guru</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h2>Tambah Guru</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3"><label>NIP</label><input type="text" name="nip" class="form-control" required></div>
    <div class="mb-3"><label>Nama Guru</label><input type="text" name="nama_guru" class="form-control" required></div>
    <div class="mb-3"><label>Mata Pelajaran</label><input type="text" name="mata_pelajaran" class="form-control" required></div>
    <div class="mb-3"><label>Jabatan</label><input type="text" name="jabatan" class="form-control"></div>
    <div class="mb-3"><label>Foto</label><input type="file" name="foto" class="form-control"></div>
    <div class="mb-3"><label>Nomor HP</label><input type="text" name="nomor_hp" class="form-control"></div>
    <div class="mb-3"><label>Gmail</label><input type="email" name="gmail" class="form-control"></div>
    <div class="mb-3"><label>Alamat</label><textarea name="alamat" class="form-control"></textarea></div>
    <button type="submit" name="submit" class="btn btn-success">Simpan</button>
    <a href="guruStaff.php" class="btn btn-secondary">Kembali</a>
  </form>
</body>
</html>
