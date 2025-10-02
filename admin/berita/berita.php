<?php
include "../../db/config.php"; // koneksi database
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

// Ambil data berita
$query = mysqli_query($db, "SELECT * FROM tb_berita ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Berita</title>
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
            background: rgba(255,255,255,0.1);
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
                    <li class="nav-item"><a href="../siswa/siswa.php" class="nav-link">👨‍🎓 Data Siswa</a></li>
                    <li class="nav-item"><a href="../guru-staff.php/guruStaff.php" class="nav-link">👨‍🏫 Data Guru</a></li>
                    <li class="nav-item"><a href="../berita/berita.php" class="nav-link active">📰 Berita</a></li>
                    <li class="nav-item"><a href="../agenda/agenda.php" class="nav-link">📅 Agenda</a></li>
                    <li class="nav-item"><a href="../program-unggulan/program-unggulan.php" class="nav-link">⭐ Program Unggulan</a></li>
                    <li class="nav-item mt-3"><a href="../logout.php" class="nav-link text-danger fw-bold">🚪 Logout</a></li>
                </ul>
            </div>
        </nav>

        <!-- Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-4 mt-4">
            <h2 class="mb-4">📰 Manajemen Berita</h2>
            <a href="addBerita.php" class="btn btn-primary mb-3">+ Tambah Berita</a>

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
                                    <td><?= htmlspecialchars($row['nama_berita']); ?></td>
                                    <td><img src="../uploads/<?= $row['gambar']; ?>" width="80"></td>
                                    <td><?= substr(strip_tags($row['deskripsi_berita']), 0, 50); ?>...</td>
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
        </main>
    </div>
</div>
</body>
</html>
