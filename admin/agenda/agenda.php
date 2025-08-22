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
                        <li class="nav-item"><a href="../guru/guru.php" class="nav-link">👨‍🏫 Data Guru</a></li>
                        <li class="nav-item"><a href="../berita/berita.php" class="nav-link">📰 Berita</a></li>
                        <li class="nav-item"><a href="../agenda/agenda.php" class="nav-link active">📅 Agenda</a></li>
                        <li class="nav-item mt-3"><a href="../logout.php" class="nav-link text-danger fw-bold">🚪 Logout</a></li>
                    </ul>
                </div>
            </nav>

            <!-- Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4 mt-4">
                <h2>📅 Manajemen Agenda</h2>
                <a href="addAgenda.php" class="btn btn-primary mb-3">+ Tambah Agenda</a>
                <div class="card shadow">
                    <div class="card-body">
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
                </div>
            </main>
        </div>
    </div>
</body>
</html>
