<?php
session_start();
require '../db/config.php';

// cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$feedback = null; // untuk menampung status feedback
?>

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
                <a class="nav-link" data-bs-toggle="tab" href="#agenda"><i class="bi bi-calendar-event"></i> Agenda</a>
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
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#kelas"><i class="bi bi-collection"></i> Kelas</a>
            </li>
            <li class="nav-item mt-3">
                <a class="nav-link text-danger" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="home">
                <h2>Home</h2>
                <p>Selamat datang di dashboard admin sekolah.</p>
                <?php echo "<h5>Selamat datang, <b>" . htmlspecialchars($_SESSION['admin']['username']) . "</b>!</h5>"; ?>
            </div>

            <div class="tab-pane fade" id="agenda">
                <h2>Agenda Sekolah</h2>
                <p>Kelola agenda sekolah di sini.</p>

                <!-- Form Tambah Agenda -->
                <div class="container mt-4">
                    <h5>Tambah Agenda</h5>
                    <form method="POST" action="" id="agendaForm">
                        <div class="mb-3">
                            <label for="nama_agenda" class="form-label">Nama Agenda</label>
                            <input type="text" class="form-control" id="nama_agenda" name="nama_agenda" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="number" class="form-control" id="tanggal" name="tanggal" min="1" max="31" required>
                        </div>
                        <div class="mb-3">
                            <label for="bulan" class="form-label">Bulan</label>
                            <select class="form-control" id="bulan" name="bulan" required>
                                <option value="">-- Pilih Bulan --</option>
                                <?php
                                $bulanList = [
                                    "Januari",
                                    "Februari",
                                    "Maret",
                                    "April",
                                    "Mei",
                                    "Juni",
                                    "Juli",
                                    "Agustus",
                                    "September",
                                    "Oktober",
                                    "November",
                                    "Desember"
                                ];
                                foreach ($bulanList as $b) {
                                    echo "<option value='$b'>$b</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jam" class="form-label">Jam</label>
                            <input type="time" class="form-control" id="jam" name="jam" required>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                        </div>
                        <button type="submit" name="simpan_agenda" class="btn btn-primary">Simpan agenda</button>
                        <?php
                        // proses tambah agenda
                        if (isset($_POST['simpan_agenda'])) {
                            $nama_agenda = mysqli_real_escape_string($db, $_POST['nama_agenda']);
                            $tanggal     = (int) $_POST['tanggal'];
                            $bulan       = mysqli_real_escape_string($db, $_POST['bulan']);
                            $jam         = mysqli_real_escape_string($db, $_POST['jam']);
                            $lokasi      = mysqli_real_escape_string($db, $_POST['lokasi']);

                            $query = "INSERT INTO tb_agenda (nama_agenda, tanggal, bulan, jam, lokasi) 
                VALUES ('$nama_agenda', '$tanggal', '$bulan', '$jam', '$lokasi')";
                            $result = mysqli_query($db, $query);

                            if ($result) {
                                $feedback = "success";
                            } else {
                                $feedback = "error";
                            }
                        }
                        ?>
                    </form>
                </div>
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

    <!-- Modal Sukses -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Berhasil</h5>
                </div>
                <div class="modal-body">
                    Agenda berhasil ditambahkan!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Gagal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Gagal</h5>
                </div>
                <div class="modal-body">
                    Terjadi kesalahan saat menambahkan agenda.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php if ($feedback === "success") : ?>
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
            document.getElementById("agendaForm").reset();
        <?php elseif ($feedback === "error") : ?>
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        <?php endif; ?>
    </script>

    <!-- menyimpan data ke localstorage agar ketika di refresh tab tidak kembali ke home -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // cek apakah ada tab terakhir yg disimpan
            let activeTab = localStorage.getItem("activeTab");
            if (activeTab) {
                let someTabTriggerEl = document.querySelector(`a[href="${activeTab}"]`);
                if (someTabTriggerEl) {
                    let tab = new bootstrap.Tab(someTabTriggerEl);
                    tab.show();
                }
            }

            // simpan tab setiap kali berganti
            let tabLinks = document.querySelectorAll('#sidebarMenu a[data-bs-toggle="tab"]');
            tabLinks.forEach(function(tabLink) {
                tabLink.addEventListener("shown.bs.tab", function(event) {
                    localStorage.setItem("activeTab", event.target.getAttribute("href"));
                });
            });
        });
    </script>

</body>

</html>