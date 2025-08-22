<?php
include "../../db/config.php";

$id = $_GET['id'];
$data = mysqli_query($db, "SELECT * FROM tb_berita WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['submit'])){
    $nama_berita = $_POST['nama_berita'];
    $deskripsi = $_POST['deskripsi_berita'];
    $tanggal = $_POST['tanggal'];

    if($_FILES['gambar']['name'] != ""){
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp, "../uploads/".$gambar);
        $update = mysqli_query($db, "UPDATE tb_berita SET nama_berita='$nama_berita', gambar='$gambar', deskripsi_berita='$deskripsi', tanggal='$tanggal' WHERE id=$id");
    } else {
        $update = mysqli_query($db, "UPDATE tb_berita SET nama_berita='$nama_berita', deskripsi_berita='$deskripsi', tanggal='$tanggal' WHERE id=$id");
    }

    if($update){
        echo "<script>alert('Berita berhasil diupdate'); window.location='berita.php';</script>";
    } else {
        echo "Gagal: " . mysqli_error($db);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Edit Berita</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul Berita</label>
            <input type="text" name="nama_berita" class="form-control" value="<?= $row['nama_berita'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Gambar</label><br>
            <img src="../uploads/<?= $row['gambar'] ?>" width="120"><br><br>
            <input type="file" name="gambar" class="form-control">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi_berita" class="form-control" rows="5" required><?= $row['deskripsi_berita'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?= $row['tanggal'] ?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
        <a href="berita.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>
