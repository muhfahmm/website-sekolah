<?php
session_start();

// cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: ../../login.php");
    exit;
}

include "../../../db/config.php"; // koneksi database

// ambil semua detail program unggulan
// query ambil data detail program unggulan sesuai SQL
$query = mysqli_query($db, "
    SELECT d.*, p.nama_program_unggulan
    FROM tb_detail_program_unggulan d
    JOIN tb_program_unggulan p ON d.program_id = p.id
    ORDER BY d.id DESC
");

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Program Unggulan</title>
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
        .img-thumb {
            width: 100px;
            height: 80px;
            object-fit: cover;
            margin-right: 5px;
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
                    <li class="nav-item"><a href="../program-unggulan/program-unggulan.php" class="nav-link active">⭐ Program Unggulan</a></li>
                    <li class="nav-item"><a href="detail-program-unggulan.php" class="nav-link active">⭐ Detail Program Unggulan</a></li>
                    <li class="nav-item mt-3"><a href="../logout.php" class="nav-link text-danger fw-bold">🚪 Logout</a></li>
                </ul>
            </div>
        </nav>

        <!-- Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Detail Program Unggulan</h1>
                <h5>Selamat datang, <b><?= htmlspecialchars($_SESSION['admin']['username']); ?></b>!</h5>
            </div>

            <div class="mb-3">
                <a href="add-detail-program-unggulan.php" class="btn btn-primary">Tambah Detail Program</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Judul Detail</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Created At</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php while($row = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= htmlspecialchars($row['judul_detail']); ?></td>
                            <td><?= nl2br(htmlspecialchars($row['deskripsi_detail'])); ?></td>
                            <td>
                                <?php
                                if (!empty($row['image_detail'])) {
                                    $images = explode(',', $row['image_detail']);
                                    foreach ($images as $img) {
                                        echo '<img src="../../uploads/'.$img.'" class="img-thumb">';
                                    }
                                }
                                ?>
                            </td>
                            <td><?= $row['created_at']; ?></td>
                            <td>
                                <a href="edit-detail.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="hapus-detail.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
