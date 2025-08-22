<?php
include "../../db/config.php";
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tb_guru WHERE id=$id"));

if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $nama_guru = $_POST['nama_guru'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $jabatan = $_POST['jabatan'];
    $nomor_hp = $_POST['nomor_hp'];
    $gmail = $_POST['gmail'];
    $alamat = $_POST['alamat'];

    if ($_FILES['foto']['name']) {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmp, "../uploads/" . $foto);
    } else {
        $foto = $data['foto'];
    }

    $query = "UPDATE tb_guru SET nip='$nip', nama_guru='$nama_guru', mata_pelajaran='$mata_pelajaran', 
              jabatan='$jabatan', foto='$foto', nomor_hp='$nomor_hp', gmail='$gmail', alamat='$alamat' 
              WHERE id=$id";

    if (mysqli_query($db, $query)) {
        header("Location: guruStaff.php");
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">
    <h2>Edit Guru</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3"><label>NIP</label><input type="text" name="nip" class="form-control" value="<?= $data['nip'] ?>"></div>
        <div class="mb-3"><label>Nama Guru</label><input type="text" name="nama_guru" class="form-control" value="<?= $data['nama_guru'] ?>"></div>
        <div class="mb-3"><label>Mata Pelajaran</label><input type="text" name="mata_pelajaran" class="form-control" value="<?= $data['mata_pelajaran'] ?>"></div>
        <div class="mb-3"><label>Jabatan</label><input type="text" name="jabatan" class="form-control" value="<?= $data['jabatan'] ?>"></div>
        <div class="mb-3"><label>Foto</label><input type="file" name="foto" class="form-control"></div>
        <img src="../uploads/<?= $data['foto'] ?>" width="80">
        <div class="mb-3"><label>Nomor HP</label><input type="text" name="nomor_hp" class="form-control" value="<?= $data['nomor_hp'] ?>"></div>
        <div class="mb-3"><label>Gmail</label><input type="email" name="gmail" class="form-control" value="<?= $data['gmail'] ?>"></div>
        <div class="mb-3"><label>Alamat</label><textarea name="alamat" class="form-control"><?= $data['alamat'] ?></textarea></div>
        <button type="submit" name="submit" class="btn btn-success">Update</button>
        <a href="guruStaff.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>

</html>