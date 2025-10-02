<?php
session_start();

// cek login admin
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

// panggil koneksi database
require "../../db/config.php"; 

// query ambil data program unggulan
$result = mysqli_query($db, "SELECT * FROM tb_program_unggulan");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Program Unggulan</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }

        .btn-add {
            display: inline-block;
            background: #007bff;
            color: #fff;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 20px;
            transition: background 0.2s;
        }

        .btn-add:hover {
            background: #0056b3;
        }

        .container-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .card-custom {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 18px;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card-custom:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .card-custom img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 12px;
        }

        .card-custom h3 {
            margin: 0 0 8px;
            color: #222;
            font-size: 18px;
        }

        .card-custom p {
            color: #555;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .card-custom ul {
            padding-left: 18px;
            margin: 0;
        }

        .card-custom ul li {
            font-size: 13px;
            color: #444;
            margin-bottom: 4px;
        }

        .btn-delete {
            background: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 13px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-delete:hover {
            background: #a71d2a;
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
                        <li class="nav-item"><a href="../guru-staff/guruStaff.php" class="nav-link">👨‍🏫 Data Guru</a></li>
                        <li class="nav-item"><a href="../berita/berita.php" class="nav-link">📰 Berita</a></li>
                        <li class="nav-item"><a href="../agenda/agenda.php" class="nav-link">📅 Agenda</a></li>
                        <li class="nav-item"><a href="program-unggulan.php" class="nav-link active">⭐ Program Unggulan</a></li>
                        <li class="nav-item mt-3"><a href="../logout.php" class="nav-link text-danger fw-bold">🚪 Logout</a></li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-4 py-4">
                <h1 class="mb-4">Daftar Program Unggulan</h1>
                <a href="add-program-unggulan.php" class="btn-add">+ Tambah Program Unggulan</a>

                <div class="container-grid">
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <div class="card-custom">
                                <?php if (!empty($row['image'])): ?>
                                    <img src="../uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['nama_program_unggulan']; ?>">
                                <?php endif; ?>
                                <h3><?php echo $row['nama_program_unggulan']; ?></h3>
                                <p><?php echo $row['deskripsi_program_unggulan']; ?></p>

                                <?php if (!empty($row['list_program_unggulan'])): ?>
                                    <ul>
                                        <?php
                                        $list = explode("\r\n", $row['list_program_unggulan']);
                                        foreach ($list as $item) {
                                            echo "<li>" . htmlspecialchars($item) . "</li>";
                                        }
                                        ?>
                                    </ul>
                                <?php endif; ?>

                                <!-- Tombol Hapus -->
                                <button class="btn-delete mt-2" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id']; ?>">Hapus</button>
                            </div>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus program <strong><?php echo $row['nama_program_unggulan']; ?></strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <a href="delete-program-unggulan.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>Tidak ada program unggulan tersedia.</p>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
