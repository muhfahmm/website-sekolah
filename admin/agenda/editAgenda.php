<?php
include '../../db/config.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tb_agenda WHERE id=$id"));

if (isset($_POST['update'])) {
    $nama = $_POST['nama_agenda'];
    $tanggal = $_POST['tanggal'];
    $bulan = $_POST['bulan'];
    $jam = $_POST['jam'];
    $lokasi = $_POST['lokasi'];

    $query = "UPDATE tb_agenda SET 
                nama_agenda='$nama', tanggal='$tanggal', bulan='$bulan',
                jam='$jam', lokasi='$lokasi' 
              WHERE id=$id";
    mysqli_query($db, $query);
    header("Location: agenda.php");
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Edit Agenda</h2>
        <form method="post">
            <div class="mb-3">
                <label>Nama Agenda</label>
                <input type="text" name="nama_agenda" class="form-control" value="<?= $data['nama_agenda'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Tanggal</label>
                <input type="number" name="tanggal" class="form-control" value="<?= $data['tanggal'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Bulan</label>
                <input type="text" name="bulan" class="form-control" value="<?= $data['bulan'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Jam</label>
                <input type="time" name="jam" class="form-control" value="<?= $data['jam'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="<?= $data['lokasi'] ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-success">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>