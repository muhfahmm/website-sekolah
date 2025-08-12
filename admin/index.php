<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
        }
        .sidebar {
            min-width: 250px;
            max-width: 250px;
            background-color: #343a40;
            color: white;
            flex-shrink: 0;
        }
        .sidebar .nav-link {
            color: white;
        }
        .sidebar .nav-link.active {
            background-color: #0d6efd;
            font-weight: bold;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar p-3">
        <h4 class="text-center mb-4">Admin Panel</h4>
        <ul class="nav nav-pills flex-column" id="sidebarMenu" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#home"><i class="bi bi-house"></i> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#acara"><i class="bi bi-calendar-event"></i> Acara</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#berita"><i class="bi bi-newspaper"></i> Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#ppdb"><i class="bi bi-journal"></i> PPDB</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#guru"><i class="bi bi-person-badge"></i> Guru</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#siswa"><i class="bi bi-people"></i> Siswa</a>
            </li>
            <li class="nav-item mt-3">
                <a class="nav-link text-danger" href="#"><i class="bi bi-box-arrow-right"></i> Logout</a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="home">
                <h2>Home</h2>
                <p>Selamat datang di dashboard admin sekolah.</p>
            </div>
            <div class="tab-pane fade" id="acara">
                <h2>Acara Sekolah</h2>
                <p>Kelola acara sekolah di sini.</p>
            </div>
            <div class="tab-pane fade" id="berita">
                <h2>Berita Terbaru</h2>
                <p>Kelola berita sekolah di sini.</p>
            </div>
            <div class="tab-pane fade" id="ppdb">
                <h2>PPDB</h2>
                <p>Kelola data Penerimaan Peserta Didik Baru.</p>
            </div>
            <div class="tab-pane fade" id="guru">
                <h2>Data Guru</h2>
                <p>Kelola data guru di sini.</p>
            </div>
            <div class="tab-pane fade" id="siswa">
                <h2>Data Siswa</h2>
                <p>Kelola data siswa di sini.</p>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
