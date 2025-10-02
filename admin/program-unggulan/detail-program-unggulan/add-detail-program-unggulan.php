<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../../login.php");
    exit;
}

include "../../../db/config.php";

// ambil semua program unggulan untuk dropdown
$programs = mysqli_query($db, "SELECT id, nama_program_unggulan FROM tb_program_unggulan");

if (isset($_POST['submit'])) {
    $program_id = $_POST['program_id'];
    $judul_detail = $_POST['judul_detail'];
    $deskripsi_detail = $_POST['deskripsi_detail'];

    // handle upload gambar multiple
    $uploadedFiles = [];
    if (!empty($_FILES['image_detail']['name'][0])) {
        $totalFiles = count($_FILES['image_detail']['name']);
        for ($i = 0; $i < $totalFiles; $i++) {
            $tmpName = $_FILES['image_detail']['tmp_name'][$i];
            $fileName = time().'_'.basename($_FILES['image_detail']['name'][$i]);
            $targetPath = "../../../uploads/".$fileName;
            if (move_uploaded_file($tmpName, $targetPath)) {
                $uploadedFiles[] = $fileName;
            }
        }
    }

    $image_detail = implode(',', $uploadedFiles);

    // simpan ke database
    $stmt = $db->prepare("INSERT INTO tb_detail_program_unggulan (program_id, judul_detail, deskripsi_detail, image_detail) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $program_id, $judul_detail, $deskripsi_detail, $image_detail);
    if ($stmt->execute()) {
        header("Location: detail-program-unggulan.php");
        exit;
    } else {
        $error = "Gagal menyimpan data: " . $db->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Detail Program Unggulan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background-color: #f8f9fa; }
.sidebar { min-height:100vh; background:#212529; }
.sidebar .nav-link { color:#fff; margin:4px 0; }
.sidebar .nav-link.active, .sidebar .nav-link:hover { background: rgba(255,255,255,0.1); border-radius:5px; }
</style>
</head>
<body>
<div class="container-fluid">
<div class="row">
<nav class="col-md-2 d-none d-md-block sidebar">
<div class="pt-3">
<h4 class="text-center text-white">Admin Panel</h4>
<ul class="nav flex-column mt-4">
<li class="nav-item"><a href="../index.php" class="nav-link">🏠 Dashboard</a></li>
<li class="nav-item"><a href="../program-unggulan/program-unggulan.php" class="nav-link active">⭐ Program Unggulan</a></li>
<li class="nav-item"><a href="detail-program-unggulan.php" class="nav-link active">⭐ Detail Program Unggulan</a></li>
<li class="nav-item mt-3"><a href="../logout.php" class="nav-link text-danger fw-bold">🚪 Logout</a></li>
</ul>
</div>
</nav>

<main class="col-md-9 ms-sm-auto col-lg-10 px-4 py-4">
<h1 class="mb-4">Tambah Detail Program Unggulan</h1>

<?php if (!empty($error)) echo '<div class="alert alert-danger">'.$error.'</div>'; ?>

<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="program_id" class="form-label">Program Unggulan</label>
        <select class="form-select" id="program_id" name="program_id" required>
            <option value="">-- Pilih Program --</option>
            <?php while($prog = mysqli_fetch_assoc($programs)): ?>
            <option value="<?= $prog['id']; ?>"><?= htmlspecialchars($prog['nama_program_unggulan']); ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="judul_detail" class="form-label">Judul Detail</label>
        <input type="text" class="form-control" id="judul_detail" name="judul_detail" required>
    </div>

    <div class="mb-3">
        <label for="deskripsi_detail" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="deskripsi_detail" name="deskripsi_detail" rows="5" required></textarea>
    </div>

    <div class="mb-3">
        <label for="image_detail" class="form-label">Gambar (Bisa lebih dari 1)</label>
        <input type="file" class="form-control" id="image_detail" name="image_detail[]" multiple>
    </div>

    <button type="submit" name="submit" class="btn btn-success">Simpan</button>
    <a href="detail-program-unggulan.php" class="btn btn-secondary">Batal</a>
</form>
</main>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
