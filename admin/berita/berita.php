<?php
include "../../db/config.php"; // koneksi database

// Ambil data berita
$query = mysqli_query($db, "SELECT * FROM tb_berita ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Manajemen Berita</h2>

        <!-- Tombol tambah berita -->
        <a href="addBerita.php" class="btn btn-primary mb-3">+ Tambah Berita</a>

        <!-- Tabel data berita -->
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul Berita</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while($row = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama_berita']; ?></td>
                                <td><img src="../uploads/<?= $row['gambar']; ?>" width="80"></td>
                                <td><?= substr($row['deskripsi_berita'], 0, 50); ?>...</td>
                                <td><?= date("d-m-Y", strtotime($row['tanggal'])); ?></td>
                                <td>
                                    <a href="editBerita.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="deleteBerita.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus berita ini?');">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
