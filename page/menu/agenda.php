<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .title-agenda {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card-content-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            padding: 25px;
            justify-items: center;
        }

        .card-content {
            border: 1px solid #ddd;
            border-radius: 15px;
            overflow: hidden;
            width: 100%;
            max-width: 350px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: white;
        }

        .card-header img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .card-body h1 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .card-body p {
            font-size: 0.9rem;
            color: #555;
        }

        .card-content:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }
    </style>

</head>

<body>
    <!-- navbar -->
    <nav class="container" style="position: sticky; top: 0; background: white; z-index: 200;">
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
                            <li><a href="about.html">Tentang Kami</a></li>
                            <li><a href="visi-misi.html">Visi & Misi</a></li>
                            <li><a href="ekstrakurikuler.html">Ekstrakurikuler</a></li>
                            <li><a href="navigation menus/guru-staff.html">Guru & Staff</a></li>
                            <li><a href="fasilitas.html">Fasilitas</a></li>
                        </ul>
                    </li>
                    <li><a href="">Kontak Kami</a></li>
                    <li><a href="">Gallery</a></li>
                    <li class="has-submenu">
                        <a href="javascript:void(0)">PPDB
                            <span class="dropdown-icon"><i class="bi bi-chevron-down"></i></span>
                        </a>
                        <ul class="nav-sub-menu">
                            <li><a href="navigation menus/ppdb.html">Informasi PPDB</a></li>
                        </ul>
                    </li>
                    <!-- Login & Register untuk mobile -->
                    <li class="mobile-user-control">
                        <a href="" class="login-btn">Login</a>
                        <a href="" class="register-btn">Register</a>
                    </li>
                </ul>
            </div>

            <!-- Login & Register untuk desktop -->
            <div class="user-control">
                <a href="" class="login-btn">Login</a>
                <a href="" class="register-btn">Register</a>
            </div>
        </nav>

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
                link.addEventListener('click', function (e) {
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        this.parentElement.classList.toggle('active');
                    }
                });
            });
        </script>
    </nav>
    <div class="container">
        <div class="agenda-wrapper">
            <h1 class="title-agenda">Agenda</h1>
            <div class="card-content-container">
                <div class="card-content">
                    <div class="card-header">
                        <img src="../img/news.jpg">
                    </div>
                    <div class="card-body">
                        <h1>Lorem ipsum dolor sit amet.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, ut.</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-header">
                        <img src="../img/news.jpg">
                    </div>
                    <div class="card-body">
                        <h1>Lorem ipsum dolor sit amet.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, ut.</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-header">
                        <img src="../img/news.jpg">
                    </div>
                    <div class="card-body">
                        <h1>Lorem ipsum dolor sit amet.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, ut.</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-header">
                        <img src="../img/news.jpg">
                    </div>
                    <div class="card-body">
                        <h1>Lorem ipsum dolor sit amet.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, ut.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>