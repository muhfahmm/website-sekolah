<?php
session_start();
require '../db/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK "AL-ISLAM" SURAKARTA</title>
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- css -->
    <link rel="stylesheet" href="./global/global.css">

</head>

<body>
    <!-- navbar -->
    <nav class="container" style="position: sticky; top: 0; background: white; z-index: 200;">

        <?php
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
        ?>
        <nav class="nav-wrapper">
            <div class="logo">
                <img src="" alt="logo">
            </div>

            <!-- Mobile Menu Toggle -->
            <input type="checkbox" id="mobile-menu-toggle" class="mobile-menu-toggle">
            <label for="mobile-menu-toggle" class="mobile-menu-button">
                <span></span>
                <span></span>
                <span></span>
            </label>

            <div class="nav-menu">
                <ul class="main-menu">
                    <li><a href="">Home</a></li>
                    <li class="has-submenu">
                        <a href="javascript:void(0)">Profil
                            <span class="dropdown-icon"><i class="bi bi-chevron-down"></i></span>
                        </a>
                        <ul class="nav-sub-menu">
                            <li><a href="about.php">Tentang Kami</a></li>
                            <li><a href="visi-misi.php">Visi & Misi</a></li>
                            <li><a href="fasilitas.php">Fasilitas</a></li>
                            <li><a href="fasilitas.php">Sarana Prasarana</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="javascript:void(0)">Informasi
                            <span class="dropdown-icon"><i class="bi bi-chevron-down"></i></span>
                        </a>
                        <ul class="nav-sub-menu">
                            <li><a href="navigation menus/ppdb.php">Siswa</a></li>
                            <li><a href="navigation menus/ppdb.php">Guru</a></li>
                            <li><a href="navigation menus/ppdb.php">Alumni</a></li>

                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="javascript:void(0)">Kesiswaan
                            <span class="dropdown-icon"><i class="bi bi-chevron-down"></i></span>
                        </a>
                        <ul class="nav-sub-menu">
                            <li><a href="navigation menus/ppdb.php">Beasiswa</a></li>
                            <li><a href="navigation menus/ppdb.php">Prestasi</a></li>
                            <li><a href="navigation menus/ppdb.php">OSIS</a></li>
                            <li><a href="navigation menus/ppdb.php">Dewan Ambalan</a></li>

                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="javascript:void(0)">Organisasi
                            <span class="dropdown-icon"><i class="bi bi-chevron-down"></i></span>
                        </a>
                        <ul class="nav-sub-menu">
                            <li><a href="navigation menus/ppdb.php">OSIS</a></li>
                            <li><a href="navigation menus/ppdb.php">Dewan Ambalan</a></li>
                        </ul>
                    </li>
                    <li><a href="ekstrakurikuler.php">Ekstrakurikuler</a></li>
                    <li><a href="">Kontak Kami</a></li>
                    <li><a href="">Gallery</a></li>
                    <li class="has-submenu">
                        <a href="javascript:void(0)">PPDB
                            <span class="dropdown-icon"><i class="bi bi-chevron-down"></i></span>
                        </a>
                        <ul class="nav-sub-menu">
                            <li><a href="navigation menus/ppdb.php">Informasi PPDB</a></li>
                            <li><a href="navigation menus/ppdb.php">PPDB Online</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="user-control">
                <?php if ($username): ?>
                    <div class="user-dropdown">
                        <a href="javascript:void(0)" class="user-name">
                            <?php echo htmlspecialchars($username); ?>
                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul class="user-menu">
                            <li><a href="./controller/logout.php">Logout</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="controller/login.php" class="login-btn">Login</a>
                    <a href="controller/register.php" class="register-btn">Register</a>
                <?php endif; ?>
            </div>
        </nav>

        <!-- user dropdown -->
        <style>
            .user-dropdown {
                position: relative;
                display: inline-block;
            }

            .user-dropdown .user-menu {
                display: none;
                position: absolute;
                right: 0;
                background: white;
                border: 1px solid #ccc;
                list-style: none;
                padding: 8px 0;
                margin: 0;
                min-width: 120px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .user-dropdown:hover .user-menu {
                display: block;
            }

            .user-menu li {
                padding: 5px 15px;
            }

            .user-menu li a {
                text-decoration: none;
                color: #333;
                display: block;
            }

            .user-menu li a:hover {
                background: #f0f0f0;
            }

            .user-name {
                cursor: pointer;
                text-decoration: none;
                color: #333;
            }
        </style>



        <style>
            .container {
                max-width: 1500px;
                margin: 0 auto;
            }

            .nav-wrapper {
                display: grid;
                grid-template-columns: auto 1fr auto;
                align-items: center;
                gap: 30px;
                padding: 15px 0;
            }

            .nav-menu {
                justify-self: center;
            }

            .main-menu {
                display: flex;
                list-style: none;
                margin: 0;
                padding: 0;
                gap: 20px;
            }

            .main-menu>li {
                position: relative;
            }

            .main-menu a {
                text-decoration: none;
                color: #34495e;
                font-weight: 500;
                padding: 8px 12px;
                border-radius: 4px;
                transition: all 0.3s ease;
            }

            .main-menu a:hover {
                color: #2980b9;
                background-color: #f8f9fa;
            }

            .nav-sub-menu {
                position: absolute;
                top: 100%;
                left: 0;
                background: white;
                min-width: 200px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                border-radius: 4px;
                padding: 10px 0;
                list-style: none;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
                z-index: 100;
            }

            @media (min-width: 769px) {
                .has-submenu:hover .nav-sub-menu {
                    opacity: 1;
                    visibility: visible;
                }
            }

            .nav-sub-menu li a {
                display: block;
                padding: 8px 20px;
            }

            .nav-sub-menu li a:hover {
                background-color: #f1f5f9;
            }

            .dropdown-icon {
                font-size: 0.7rem;
                margin-left: 5px;
            }

            .user-control {
                display: flex;
                gap: 10px;
                justify-self: end;
            }

            .login-btn,
            .register-btn {
                padding: 8px 16px;
                border-radius: 4px;
                text-decoration: none;
                font-weight: 500;
                transition: all 0.3s ease;
            }

            .login-btn {
                color: #2980b9;
                border: 1px solid #2980b9;
            }

            .login-btn:hover {
                background-color: #e3f2fd;
            }

            .register-btn {
                color: white;
                background-color: #2980b9;
                border: 1px solid #2980b9;
            }

            .register-btn:hover {
                background-color: #1a6ca8;
            }

            .mobile-menu-toggle {
                display: none;
            }

            .mobile-menu-button {
                display: none;
                flex-direction: column;
                justify-content: space-between;
                width: 30px;
                height: 21px;
                cursor: pointer;
            }

            .mobile-menu-button span {
                display: block;
                height: 3px;
                width: 100%;
                background-color: #2c3e50;
                border-radius: 3px;
                transition: all 0.3s ease;
            }

            .mobile-user-control {
                display: none;
            }

            @media (max-width: 768px) {
                .nav-wrapper {
                    grid-template-columns: auto auto;
                }

                .user-control {
                    display: none;
                }

                .mobile-user-control {
                    display: flex;
                    flex-direction: column;
                    gap: 10px;
                    padding: 10px 20px;
                }

                .nav-menu {
                    order: 3;
                    max-height: 0;
                    overflow: hidden;
                    transition: max-height 0.3s ease;
                    width: 100%;
                }

                /* saat dibuka, pakai height otomatis */
                .mobile-menu-toggle:checked~.nav-menu {
                    max-height: none;
                }

                .mobile-menu-button {
                    display: flex;
                    justify-self: end;
                }

                .main-menu {
                    flex-direction: column;
                    gap: 0;
                    padding: 20px 0;
                }

                .main-menu>li {
                    padding: 10px 0;
                }

                .nav-sub-menu {
                    position: static;
                    box-shadow: none;
                    padding: 0;
                    padding-left: 20px;
                    margin-top: 10px;
                    max-height: 0;
                    overflow: hidden;
                    opacity: 1;
                    visibility: visible;
                    transition: max-height 0.3s ease;
                }

                .has-submenu.active .nav-sub-menu {
                    max-height: 500px;
                }
            }
        </style>

        <!-- script sub menu -->
        <script>
            document.querySelectorAll('.has-submenu > a').forEach(link => {
                link.addEventListener('click', function(e) {
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        this.parentElement.classList.toggle('active');
                    }
                });
            });
        </script>
    </nav>

    <!-- hero -->
    <div class="container">
        <div class="hero-wrapper">
            <div class="image-hero">
                <img src="img/hero.png">
            </div>
        </div>
    </div>

    <!-- menu -->
    <div class="container">
        <div class="icon-menu-wrapper">
            <ul>
                <li><a href="navigation menus/agenda.php"><i class="bi bi-calendar-event"></i> Agenda</a></li>
                <li><a href=""><i class="bi bi-newspaper"></i> Berita</a></li>
                <li><a href=""><i class="bi bi-person-badge-fill"></i> Guru & Staff</a></li>
                <li><a href=""><i class="bi bi-mortarboard"></i> Siswa</a></li>
                <li><a href=""><i class="bi bi-envelope-fill"></i> Kontak Kami</a></li>
                <li><a href=""><i class="bi bi-journal-text"></i> PPDB</a></li>

            </ul>
        </div>
        <style>
            .icon-menu-wrapper {
                padding: 20px 0;
            }

            .icon-menu-wrapper ul {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 15px;
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .icon-menu-wrapper li {
                text-align: center;
            }

            .icon-menu-wrapper a {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-decoration: none;
                color: #2c3e50;
                padding: 15px 10px;
                border-radius: 8px;
                transition: all 0.3s ease;
                background-color: #f8f9fa;
            }

            .icon-menu-wrapper a:hover {
                background-color: #e9ecef;
                transform: translateY(-3px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .icon-menu-wrapper i {
                font-size: 1.8rem;
                margin-bottom: 10px;
                color: #2980b9;
            }

            @media (max-width: 576px) {
                .icon-menu-wrapper ul {
                    grid-template-columns: repeat(2, 1fr);
                }
            }
        </style>
    </div>

    <!-- news content -->
    <div class="container">
        <div class="news-wrapper">
            <h1 class="section-title">Berita Terbaru</h1>
            <div class="news-content">
                <div class="news-content-wrapper">
                    <img src="img/news.jpg" alt="News Image">
                    <div class="news-detail">
                        <h2>Lorem, ipsum dolor.</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="date">1-Januari-2025</div>
                    </div>
                </div>

                <div class="news-content-wrapper">
                    <img src="img/news.jpg" alt="News Image">
                    <div class="news-detail">
                        <h2>Lorem, ipsum dolor.</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="date">2-Januari-2025</div>
                    </div>
                </div>

                <div class="news-content-wrapper">
                    <img src="img/news.jpg" alt="News Image">
                    <div class="news-detail">
                        <h2>Lorem, ipsum dolor.</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="date">3-Januari-2025</div>
                    </div>
                </div>

                <div class="news-content-wrapper">
                    <img src="img/news.jpg" alt="News Image">
                    <div class="news-detail">
                        <h2>Lorem, ipsum dolor.</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="date">4-Januari-2025</div>
                    </div>
                </div>

                <div class="news-content-wrapper">
                    <img src="img/news.jpg" alt="News Image">
                    <div class="news-detail">
                        <h2>Lorem, ipsum dolor.</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="date">5-Januari-2025</div>
                    </div>
                </div>

                <div class="news-content-wrapper">
                    <img src="img/news.jpg" alt="News Image">
                    <div class="news-detail">
                        <h2>Lorem, ipsum dolor.</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="date">6-Januari-2025</div>
                    </div>
                </div>

                <div class="news-content-wrapper">
                    <img src="img/news.jpg" alt="News Image">
                    <div class="news-detail">
                        <h2>Lorem, ipsum dolor.</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="date">7-Januari-2025</div>
                    </div>
                </div>

                <div class="news-content-wrapper">
                    <img src="img/news.jpg" alt="News Image">
                    <div class="news-detail">
                        <h2>Lorem, ipsum dolor.</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="date">8-Januari-2025</div>
                    </div>
                </div>
            </div>

            <div class="button-container">
                <button class="see-more">
                    Lihat Selengkapnya
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>
        <style>
            .section-title::after {
                content: '';
                display: block;
                width: 80px;
                height: 4px;
                background: #2980b9;
                margin: 15px auto 0;
                border-radius: 2px;
            }

            .container {
                max-width: 1400px;
                margin: 0 auto;
                padding: 20px;
            }

            .news-wrapper h1 {
                text-align: center;
                margin-bottom: 40px;
                font-size: 2.2rem;
                color: #333;
            }

            .news-content {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 25px;
            }

            .news-content-wrapper {
                display: flex;
                flex-direction: column;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease;
                background: white;
                height: 100%;
            }

            .news-content-wrapper:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            }

            .news-content-wrapper img {
                width: 100%;
                height: 180px;
                object-fit: cover;
            }

            .news-detail {
                padding: 18px;
                display: flex;
                flex-direction: column;
                flex-grow: 1;
            }

            .news-detail h2 {
                margin: 0 0 10px 0;
                font-size: 1.2rem;
                color: #222;
            }

            .news-detail p {
                margin: 0 0 15px 0;
                color: #555;
                line-height: 1.4;
                font-size: 0.95rem;
                flex-grow: 1;
            }

            .date {
                color: #777;
                font-size: 0.85rem;
                margin-top: auto;
            }

            .button-container {
                display: flex;
                justify-content: center;
                margin-top: 40px;
            }

            @media (max-width: 1200px) {
                .news-content {
                    grid-template-columns: repeat(3, 1fr);
                }
            }

            @media (max-width: 900px) {
                .news-content {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 600px) {
                .news-content {
                    grid-template-columns: 1fr;
                }

                .news-content-wrapper img {
                    height: 220px;
                }

                .see-more {
                    padding: 10px 25px;
                    font-size: 0.95rem;
                }
            }
        </style>
    </div>

    <!-- program unggulan -->
    <div class="container">
        <div class="program-wrapper">
            <h1 class="section-title">Program Unggulan</h1>

            <div class="program-grid">
                <div class="program-card">
                    <div class="program-image">
                        <img src="img/tahfidz.jpg" alt="Program Tahfidz">
                        <div class="program-badge">Best Program</div>
                    </div>
                    <div class="program-content">
                        <div class="program-text">
                            <h2>Tahfidz Al-Qur'an</h2>
                            <p>Program hafalan Qur'an yang diadakan setiap hari sebelum jam KBM9</p>
                            <ul class="program-features">
                                <li><i class="bi bi-check-circle"></i> Mentoring tahfidz setiap pagi</li>
                                <li><i class="bi bi-check-circle"></i> Beasiswa tahfidz setiap tahun</li>
                                <li><i class="bi bi-check-circle"></i> Evaluasi berkala</li>
                            </ul>
                        </div>
                        <div class="program-button-container">
                            <a href="#" class="program-button">Detail Program <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-image">
                        <img src="img/gamelab.jpeg" alt="Program IT">
                    </div>
                    <div class="program-content">
                        <div class="program-text">
                            <h2>Gamelab</h2>
                            <p>Pengembangan kompetensi di bidang teknologi informasi dengan kurikulum berbasis industri.
                            </p>
                            <ul class="program-features">
                                <li><i class="bi bi-check-circle"></i> Pembelajaran coding modern</li>
                                <li><i class="bi bi-check-circle"></i> Mendapatkan setifikasi sebagai junior web
                                    developer</li>
                                <li><i class="bi bi-check-circle"></i> Prospek kerja bersama "gamelab" setelah lulus
                                </li>
                            </ul>
                        </div>
                        <div class="program-button-container">
                            <a href="#" class="program-button">Detail Program <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-image">
                        <img src="img/IOT.jpg" alt="IOT">
                        <div class="program-badge">New</div>
                    </div>
                    <div class="program-content">
                        <div class="program-text">
                            <h2>IOT (robotic)</h2>
                            <p>Program terbaru dari sekolah SMK "AL-ISLAM" SURAKARTA yang berbasis teknologi robotik
                                atau IoT</p>
                            <ul class="program-features">
                                <li><i class="bi bi-check-circle"></i> </li>
                                <li><i class="bi bi-check-circle"></i> </li>
                                <li><i class="bi bi-check-circle"></i> </li>
                            </ul>
                        </div>
                        <div class="program-button-container">
                            <a href="#" class="program-button">Detail Program <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .section-title {
                text-align: center;
                font-size: 2.5rem;
                color: #2c3e50;
                margin-bottom: 50px;
                position: relative;
            }

            .section-title::after {
                content: '';
                display: block;
                width: 80px;
                height: 4px;
                background: #2980b9;
                margin: 15px auto 0;
                border-radius: 2px;
            }

            .program-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                gap: 30px;
            }

            .program-card {
                background: white;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                display: flex;
                flex-direction: column;
                height: 100%;
            }

            .program-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            }

            .program-image {
                position: relative;
                height: 220px;
                overflow: hidden;
            }

            .program-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }

            .program-card:hover .program-image img {
                transform: scale(1.05);
            }

            .program-badge {
                position: absolute;
                top: 15px;
                right: 15px;
                background: #e74c3c;
                color: white;
                padding: 5px 15px;
                border-radius: 20px;
                font-size: 0.8rem;
                font-weight: bold;
            }

            .program-content {
                padding: 25px;
                display: flex;
                flex-direction: column;
                flex-grow: 1;
            }

            .program-text {
                flex-grow: 1;
            }

            .program-content h2 {
                color: #2c3e50;
                margin-top: 0;
                margin-bottom: 15px;
                font-size: 1.5rem;
            }

            .program-content p {
                color: #7f8c8d;
                line-height: 1.6;
                margin-bottom: 20px;
            }

            .program-features {
                list-style: none;
                padding: 0;
                margin: 0 0 25px 0;
            }

            .program-features li {
                padding: 5px 0;
                color: #34495e;
            }

            .program-features i {
                color: #27ae60;
                margin-right: 8px;
            }

            .program-button-container {
                margin-top: auto;
                padding-top: 20px;
            }

            .program-button {
                display: inline-flex;
                align-items: center;
                padding: 10px 20px;
                background: #2980b9;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                font-weight: 500;
                transition: all 0.3s ease;
            }

            .program-button:hover {
                background: #3498db;
                transform: translateX(5px);
            }

            .program-button i {
                margin-left: 5px;
                transition: transform 0.3s ease;
            }

            .program-button:hover i {
                transform: translateX(3px);
            }

            @media (max-width: 768px) {
                .program-grid {
                    grid-template-columns: 1fr;
                }

                .section-title {
                    font-size: 2rem;
                    margin-bottom: 30px;
                }
            }

            @media (max-width: 480px) {
                .program-content {
                    padding: 20px;
                }

                .program-image {
                    height: 180px;
                }
            }
        </style>
    </div>

    <!-- agenda / jadwal -->
    <div class="container agenda-section">
        <h2 class="section-title"><i class="bi bi-calendar-check"></i> Agenda Sekolah</h2>
        <div class="agenda-list">

            <div class="agenda-item">
                <div class="agenda-date">
                    <span class="date-day">15</span>
                    <span class="date-month">AGU</span>
                </div>
                <div class="agenda-content">
                    <h3>Penerimaan Siswa Baru</h3>
                    <div class="agenda-meta">
                        <span class="agenda-time"><i class="bi bi-clock"></i> 08.00 - 12.00 WIB</span>
                        <span class="agenda-location"><i class="bi bi-geo-alt"></i> Aula Sekolah</span>
                    </div>
                </div>
            </div>

            <div class="agenda-item">
                <div class="agenda-date">
                    <span class="date-day">20</span>
                    <span class="date-month">AGU</span>
                </div>
                <div class="agenda-content">
                    <h3>Workshop Robotik</h3>
                    <div class="agenda-meta">
                        <span class="agenda-time"><i class="bi bi-clock"></i> 09.00 - 15.00 WIB</span>
                        <span class="agenda-location"><i class="bi bi-geo-alt"></i> Lab. Komputer</span>
                    </div>
                </div>
            </div>

            <div class="agenda-item">
                <div class="agenda-date">
                    <span class="date-day">25</span>
                    <span class="date-month">AGU</span>
                </div>
                <div class="agenda-content">
                    <h3>Munasaba Tahfidz</h3>
                    <div class="agenda-meta">
                        <span class="agenda-time"><i class="bi bi-clock"></i> 07.00 - 10.00 WIB</span>
                        <span class="agenda-location"><i class="bi bi-geo-alt"></i> Masjid Sekolah</span>
                    </div>
                </div>
            </div>

            <div class="button-container">
                <button class="see-more">
                    Lihat Selengkapnya
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>

        <style>
            .agenda-section {
                padding: 40px 20px;
                margin: 0 auto;
                max-width: 1200px;
            }

            .section-title {
                text-align: center;
                font-size: 2rem;
                color: #2c3e50;
                margin-bottom: 30px;
            }

            .agenda-list {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            .agenda-item {
                display: flex;
                background: white;
                border-radius: 10px;
                box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease;
                align-items: center;
                overflow: hidden;
            }

            .agenda-item:hover {
                transform: translateY(-3px);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            }

            .agenda-date {
                background: #2980b9;
                color: white;
                padding: 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                min-width: 80px;
                text-align: center;
            }

            .date-day {
                font-size: 1.8rem;
                font-weight: bold;
                line-height: 1;
            }

            .date-month {
                font-size: 0.9rem;
                text-transform: uppercase;
                margin-top: 5px;
            }

            .agenda-content {
                padding: 15px 20px;
                flex-grow: 1;
            }

            .agenda-content h3 {
                margin: 0 0 8px 0;
                color: #2c3e50;
                font-size: 1.2rem;
            }

            .agenda-meta {
                display: flex;
                gap: 15px;
                flex-wrap: wrap;
            }

            .agenda-time,
            .agenda-location {
                font-size: 0.9rem;
                color: #555;
                display: flex;
                align-items: center;
            }

            .agenda-time i,
            .agenda-location i {
                margin-right: 8px;
                color: #2980b9;
            }

            .button-container {
                text-align: center;
                margin-top: 15px;
            }

            .see-more {
                background: #2980b9;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 8px;
                cursor: pointer;
                font-size: 1rem;
                display: inline-flex;
                align-items: center;
                gap: 8px;
                transition: background 0.3s;
            }

            .see-more:hover {
                background: #1f6691;
            }

            @media (max-width: 600px) {
                .agenda-item {
                    flex-direction: column;
                    align-items: stretch;
                }

                .agenda-date {
                    flex-direction: row;
                    justify-content: flex-start;
                    padding: 10px 15px;
                    min-width: unset;
                    gap: 10px;
                    font-size: 1rem;
                }

                .date-day {
                    font-size: 1.4rem;
                }

                .date-month {
                    font-size: 1rem;
                    margin-top: 0;
                }

                .agenda-meta {
                    flex-direction: column;
                    gap: 5px;
                }
            }
        </style>
    </div>

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-wrapper">
                <div class="footer-col school-info">
                    <img src="img/logo-sekolah.png" alt="SMK Al-Islam Surakarta" class="footer-logo">
                    <h1 class="footer-description">
                        SKALSA JADI JUWARA
                    </h1>
                    <div class="social-media">
                        <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-envelope-at"></i></i></a>
                    </div>
                </div>

                <div class="footer-col">
                    <ul class="footer-links">
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Beranda</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Profil Sekolah</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Program Unggulan</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Galeri</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Informasi PPDB</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <ul class="footer-contact">
                        <li><i class="bi bi-geo-alt"></i> Jl. Pendidikan No. 123, Surakarta, Jawa Tengah</li>
                        <li><i class="bi bi-telephone"></i> (0271) 1234567</li>
                        <li><i class="bi bi-envelope-at"></i></i> info@smkalislam.sch.id</li>
                        <li><i class="bi bi-clock"></i> Senin-Jumat: 07.00 - 15.00 WIB</li>
                    </ul>
                </div>

                <div class="footer-col">
                    <div class="user-control">
                        <?php if ($username): ?>
                            <div class="user-dropdown">
                                <a href="javascript:void(0)" class="user-name" style="color: white; font-weight: bold;">
                                    <?php echo htmlspecialchars($username); ?>
                                </a>
                            </div>
                        <?php else: ?>
                            <a href="controller/login.php" class="login-btn">Login</a>
                            <a href="controller/register.php" class="register-btn">Register</a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <div class="copyright">
                <hr class="footer-divider">
                <p>&copy; <span id="current-year"></span> SMK "AL-ISLAM" SURAKARTA. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <style>
        .footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 50px 0 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .footer-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-col {
            padding: 0 15px;
        }

        .footer-logo {
            max-width: 180px;
            margin-bottom: 15px;
        }

        .footer-description {
            margin-bottom: 20px;
            line-height: 1.6;
            color: #bdc3c7;
        }

        .social-media {
            display: flex;
            gap: 15px;
        }

        .social-link {
            color: #ecf0f1;
            font-size: 1.2rem;
            transition: color 0.3s;
        }

        .social-link:hover {
            color: #3498db;
        }

        .footer-title {
            color: #3498db;
            font-size: 1.2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background: #3498db;
        }

        .footer-links li,
        .footer-contact li {
            margin-bottom: 12px;
            list-style: none;
        }

        .footer-links a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s, padding-left 0.3s;
            display: block;
        }

        .footer-links a:hover {
            color: #3498db;
            padding-left: 5px;
        }

        .footer-links i,
        .footer-contact i {
            margin-right: 8px;
            color: #3498db;
        }

        .footer-contact li {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #bdc3c7;
        }

        .newsletter-form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .newsletter-form input {
            padding: 10px;
            border-radius: 4px;
            border: none;
        }

        .newsletter-form button {
            background: #3498db;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .newsletter-form button:hover {
            background: #2980b9;
        }

        .footer-divider {
            border: 0;
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin: 20px 0;
        }

        .copyright {
            text-align: center;
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .footer-wrapper {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .footer-col {
                padding: 0;
            }
        }
    </style>

    <script>
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>

</body>

</html>