<?php
include "../../db/config.php";

if(isset($_POST['submit'])){
    $nama_berita = $_POST['nama_berita'];
    $deskripsi = $_POST['deskripsi_berita'];
    $tanggal = $_POST['tanggal'];

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $path = "../uploads/" . $gambar;

    if(move_uploaded_file($tmp, $path)){
        $insert = mysqli_query($db, "INSERT INTO tb_berita (nama_berita, gambar, deskripsi_berita, tanggal) 
                                       VALUES ('$nama_berita', '$gambar', '$deskripsi', '$tanggal')");
        if($insert){
            echo "<script>alert('Berita berhasil ditambahkan'); window.location='berita.php';</script>";
        } else {
            echo "Gagal: " . mysqli_error($db);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Tambah Berita</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul Berita</label>
            <input type="text" name="nama_berita" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi_berita" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <a href="berita.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>
