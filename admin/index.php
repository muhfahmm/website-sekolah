<?php
session_start();

// cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include "../db/config.php"; // koneksi database

// hitung data untuk dashboard
$totalSiswa   = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as total FROM tb_siswa"))['total'];
$totalGuru    = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as total FROM tb_guru"))['total'];
$totalBerita  = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as total FROM tb_berita"))['total'];
$totalAgenda  = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as total FROM tb_agenda"))['total'];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
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
                        <li class="nav-item"><a href="index.php" class="nav-link active">🏠 Dashboard</a></li>
                        <li class="nav-item"><a href="./siswa/siswa.php" class="nav-link">👨‍🎓 Data Siswa</a></li>
                        <li class="nav-item"><a href="./guru-staff.php/guruStaff.php" class="nav-link">👨‍🏫 Data Guru</a></li>
                        <li class="nav-item"><a href="./berita/berita.php" class="nav-link">📰 Berita</a></li>
                        <li class="nav-item"><a href="./agenda/agenda.php" class="nav-link">📅 Agenda</a></li>
                        <li class="nav-item"><a href="./program-unggulan/program-unggulan.php" class="nav-link">⭐ Program Unggulan</a></li>
                        <li class="nav-item"><a href="./program-unggulan/detail-program-unggulan/detail-program-unggulan.php" class="nav-link">⭐ Detail Program Unggulan</a></li>
                        <li class="nav-item mt-3"><a href="logout.php" class="nav-link text-danger fw-bold">🚪 Logout</a></li>
                    </ul>
                </div>
            </nav>

            <!-- Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <h5>Selamat datang, <b><?= htmlspecialchars($_SESSION['admin']['username']); ?></b>!</h5>
                </div>

                <div class="row">
                    <!-- Card Statistik -->
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body text-center">
                                <h5>👨‍🎓 Siswa</h5>
                                <h3><?= $totalSiswa; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body text-center">
                                <h5>👨‍🏫 Guru</h5>
                                <h3><?= $totalGuru; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body text-center">
                                <h5>📰 Berita</h5>
                                <h3><?= $totalBerita; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body text-center">
                                <h5>📅 Agenda</h5>
                                <h3><?= $totalAgenda; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
