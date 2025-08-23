<?php
include "../../db/config.php";
$result = mysqli_query($db, "SELECT * FROM tb_siswa ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #212529;
        }

        .sidebar .nav-link {
            color: #fff;
            margin: 4px 0;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
<div class="row">
            <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block sidebar">
            <div class="pt-3">
                <h4 class="text-center text-white">Admin Panel</h4>
                <ul class="nav flex-column mt-4">
                    <li class="nav-item"><a href="../index.php" class="nav-link">🏠 Dashboard</a></li>
                    <li class="nav-item"><a href="../siswa/siswa.php" class="nav-link active">👨‍🎓 Data Siswa</a></li>
                    <li class="nav-item"><a href="../guru-staff.php/guruStaff.php" class="nav-link">👨‍🏫 Data Guru</a></li>
                    <li class="nav-item"><a href="../berita/berita.php" class="nav-link">📰 Berita</a></li>
                    <li class="nav-item"><a href="../agenda/agenda.php" class="nav-link">📅 Agenda</a></li>
                    <li class="nav-item mt-3">
                        <a href="../logout.php" class="nav-link text-danger fw-bold">🚪 Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Content -->
        <div class="col-md-9 ms-sm-auto col-lg-10 px-4 mt-4">
            <h2>Data Siswa</h2>
            <a href="addSiswa.php" class="btn btn-primary mb-3">+ Tambah Siswa</a>
            <table class="table table-bordered table-striped">
                <tr class="table-dark">
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
                <?php $no = 1;
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nisn'] ?></td>
                        <td><?= $row['nama_siswa'] ?></td>
                        <td><?= $row['jenis_kelamin'] ?></td>
                        <td><?= $row['kelas'] ?></td>
                        <td><?= $row['jurusan'] ?></td>
                        <td>
                            <?php if ($row['foto']) { ?>
                                <img src="uploads/<?= $row['foto'] ?>" width="50">
                            <?php } ?>
                        </td>
                        <td>
                            <a href="editSiswa.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="deleteSiswa.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
</div>
    </div>
</body>

</html>