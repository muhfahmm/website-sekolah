<?php
include '../../db/config.php'; // koneksi ke DB
$result = mysqli_query($db, "SELECT * FROM tb_agenda ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Manajemen Agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>📅 Manajemen Agenda</h2>
        <a href="addAgenda.php" class="btn btn-primary mb-3">+ Tambah Agenda</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Agenda</th>
                    <th>Tanggal</th>
                    <th>Bulan</th>
                    <th>Jam</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['nama_agenda']) ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['bulan'] ?></td>
                        <td><?= $row['jam'] ?></td>
                        <td><?= $row['lokasi'] ?></td>
                        <td>
                            <a href="editAgenda.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="deleteAgenda.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus agenda ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>