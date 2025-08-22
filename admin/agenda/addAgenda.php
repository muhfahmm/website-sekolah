<?php
include '../../db/config.php';
if(isset($_POST['simpan'])){
    $nama = $_POST['nama_agenda'];
    $tanggal = $_POST['tanggal'];
    $bulan = $_POST['bulan'];
    $jam = $_POST['jam'];
    $lokasi = $_POST['lokasi'];

    $query = "INSERT INTO tb_agenda (nama_agenda,tanggal,bulan,jam,lokasi) 
              VALUES ('$nama','$tanggal','$bulan','$jam','$lokasi')";
    mysqli_query($db,$query);
    header("Location: agenda.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Agenda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h2>Tambah Agenda</h2>
  <form method="post">
    <div class="mb-3">
      <label>Nama Agenda</label>
      <input type="text" name="nama_agenda" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Tanggal</label>
      <input type="number" name="tanggal" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Bulan</label>
      <input type="text" name="bulan" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Jam</label>
      <input type="time" name="jam" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Lokasi</label>
      <input type="text" name="lokasi" class="form-control" required>
    </div>
    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
