<?php
include "../../db/config.php";
$result = mysqli_query($db, "SELECT * FROM tb_guru ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Guru</title>
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
                        <li class="nav-item"><a href="../siswa/siswa.php" class="nav-link">👨‍🎓 Data Siswa</a></li>
                        <li class="nav-item"><a href="../guru-staff.php/guruStaff.php" class="nav-link">👨‍🏫 Data Guru</a></li>
                        <li class="nav-item"><a href="../berita/berita.php" class="nav-link">📰 Berita</a></li>
                        <li class="nav-item"><a href="../agenda/agenda.php" class="nav-link">📅 Agenda</a></li>
                        <li class="nav-item mt-3">
                            <a href="../logout.php" class="nav-link text-danger fw-bold">🚪 Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Konten Utama -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4 mt-4">
                <h2 class="mb-4">Data Guru</h2>
                <a href="addGuruStaff.php" class="btn btn-primary mb-3">+ Tambah Guru</a>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <table class="table table-bordered table-striped align-middle">
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
                                        <td>
                                            <?php if (!empty($row['foto'])): ?>
                                                <img src="../uploads/<?= $row['foto'] ?>" width="60" class="rounded">
                                            <?php else: ?>
                                                <span class="text-muted">Tidak ada</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= htmlspecialchars($row['nip']) ?></td>
                                        <td><?= htmlspecialchars($row['nama_guru']) ?></td>
                                        <td><?= htmlspecialchars($row['mata_pelajaran']) ?></td>
                                        <td><?= htmlspecialchars($row['jabatan']) ?></td>
                                        <td><?= htmlspecialchars($row['nomor_hp']) ?></td>
                                        <td><?= htmlspecialchars($row['gmail']) ?></td>
                                        <td><?= htmlspecialchars($row['alamat']) ?></td>
                                        <td>
                                            <a href="editGuruStaff.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="deleteGuruStaff.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus data guru ini?')" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>