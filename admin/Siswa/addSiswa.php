<?php
include "../../db/config.php";

if (isset($_POST['submit'])) {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama_siswa'];
    $jk = $_POST['jenis_kelamin'];
    $tgl = $_POST['tanggal_lahir'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $hp = $_POST['nomor_hp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    // Upload foto
    $foto = "";
    if ($_FILES['foto']['name']) {
        $foto = time() . '_' . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "../uploads/" . $foto);
    }

    $sql = "INSERT INTO tb_siswa (nisn, nama_siswa, jenis_kelamin, tanggal_lahir, kelas, jurusan, foto, nomor_hp, email, alamat) 
          VALUES ('$nisn','$nama','$jk','$tgl','$kelas','$jurusan','$foto','$hp','$email','$alamat')";
    mysqli_query($db, $sql);
    header("Location: siswa.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Tambah Siswa</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label>NISN</label>
                <input type="text" name="nisn" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Kelas</label>
                <input type="text" name="kelas" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Jurusan</label>
                <input type="text" name="jurusan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="nomor_hp" class="form-control">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
            <a href="siswa.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>