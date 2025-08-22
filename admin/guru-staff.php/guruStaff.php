<?php
include "../../db/config.php";
$result = mysqli_query($db, "SELECT * FROM tb_guru ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">
    <h2>Data Guru</h2>
    <a href="addGuruStaff.php" class="btn btn-primary mb-3">+ Tambah Guru</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Mata Pelajaran</th>
                <th>Jabatan</th>
                <th>Nomor HP</th>
                <th>Gmail</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><img src="../uploads/<?= $row['foto'] ?>" width="60"></td>
                    <td><?= $row['nip'] ?></td>
                    <td><?= $row['nama_guru'] ?></td>
                    <td><?= $row['mata_pelajaran'] ?></td>
                    <td><?= $row['jabatan'] ?></td>
                    <td><?= $row['nomor_hp'] ?></td>
                    <td><?= $row['gmail'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td>
                        <a href="editGuruStaff.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="deleteGuruStaff.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>