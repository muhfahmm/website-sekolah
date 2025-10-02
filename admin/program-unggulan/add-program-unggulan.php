<?php
session_start();

// cek login admin
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

// panggil koneksi database
require "../../db/config.php";

// proses simpan data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_program = $_POST['nama_program'];
    $deskripsi    = $_POST['deskripsi'];
    $list_program = $_POST['list_program'];
    $image        = null;

    // upload gambar jika ada
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $imageName = time() . "_" . basename($_FILES['image']['name']);
        $targetFile = $targetDir . $imageName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $image = $imageName;
        }
    }

    // query insert
    $stmt = mysqli_prepare($db, "INSERT INTO tb_program_unggulan (nama_program_unggulan, deskripsi_program_unggulan, list_program_unggulan, image) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($stmt, "ssss", $nama_program, $deskripsi, $list_program, $image);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: program-unggulan.php?success=1");
        exit();
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Program Unggulan</title>
    <!-- Bootstrap -->
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

        form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            max-width: 700px;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background: #0056b3;
        }

        .back {
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            background: #6c757d;
            color: #fff;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 13px;
        }

        .back:hover {
            background: #5a6268;
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
                <a href="program-unggulan.php" class="back">← Kembali</a>
                <h1 class="mb-4">Tambah Program Unggulan</h1>

                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="nama_program">Nama Program</label>
                    <input type="text" name="nama_program" id="nama_program" required>

                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" required></textarea>

                    <label for="list_program">List Program (pisahkan dengan Enter)</label>
                    <textarea name="list_program" id="list_program"></textarea>

                    <label for="image">Upload Gambar</label>
                    <input type="file" name="image" id="image" accept="image/*">

                    <button type="submit">Simpan</button>
                </form>
            </main>
        </div>
    </div>
</body>

</html>
