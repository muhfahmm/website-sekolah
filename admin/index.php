<?php
session_start();

// cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include "../db/config.php"; // koneksi database

// hitung data untuk dashboard
$totalSiswa = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as total FROM tb_siswa"))['total'];
$totalGuru = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as total FROM tb_guru"))['total'];
$totalBerita = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as total FROM tb_berita"))['total'];
$totalAgenda = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as total FROM tb_agenda"))['total'];
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
            background: #343a40;
            color: #fff;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
        }

        .sidebar a:hover {
            background: #495057;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="pt-3">
                    <h4 class="text-center">Admin Panel</h4>
                    <a href="index.php">Dashboard</a>
                    <a href="./siswa/siswa.php">Data Siswa</a>
                    <a href="./guru-staff.php/guruStaff.php">Data Guru</a>
                    <a href="./berita/berita.php">Berita</a>
                    <a href="./agenda/agenda.php">Agenda</a>
                    <a href="logout.php" class="text-danger">Logout</a>
                </div>
            </nav>

            <!-- Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <?php echo "<h5>Selamat datang, <b>" . htmlspecialchars($_SESSION['admin']['username']) . "</b>!</h5>"; ?>
                </div>

                <div class="row">
                    <!-- Card Statistik -->
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body text-center">
                                <h5>Siswa</h5>
                                <h3><?= $totalSiswa; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body text-center">
                                <h5>Guru</h5>
                                <h3><?= $totalGuru; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body text-center">
                                <h5>Berita</h5>
                                <h3><?= $totalBerita; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body text-center">
                                <h5>Agenda</h5>
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