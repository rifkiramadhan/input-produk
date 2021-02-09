<?php
session_start();
if(isset($_SESSION["login"]) ) {
    echo("<script>location.href = 'admin/index.php';</script>");
    echo("<script>location.href = 'user/index.php';</script>");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PT. GI</title>
        <!-- Favicon-->
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />
        <link rel="icon" href="assets/images/icons/favicon.png">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <img src="assets/images/icons/favicon.png" width="50" height="50" alt="">
                <a class="navbar-brand js-scroll-trigger ml-3" href="#page-top">PT. GUDANG INDONESIA</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php"><i class="fas fa-store"></i> Penjualan</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login-user.php"><i class="fas fa-money-check"></i> Pembelian</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Layanan Website</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Hubungi Kami</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">JUAL DAN BELI BARANG PADA TEMPAT YANG AMAN</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">SISTEM INVENTARIS GUDANG INDONESIA (GI) MENYEDIAKAN FASILITAS PENJUALAN DAN PEMBELIAN BARANG YANG AMAN DAN TERPERCAYA</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="login.php">KUNJUNGI</a>
                    </div>
                </div>
            </div>
        </header>
       
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0">Layanan Website</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Kualitas Terpercaya</h3>
                            <p class="text-muted mb-0">Sistem kami diperbarui secara berkala agar bebas dari kebocoran atau pencurin data dan barang!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Up to Date</h3>
                            <p class="text-muted mb-0">Semua barang selalu diperbarui untuk menjaga konten untuk tetap selalu ada pembaruan</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Siap Publikasikan</h3>
                            <p class="text-muted mb-0">Anda dapat menggunakan aplikasi inventaris barang ini sebagaimana adanya, atau Anda dapat melakukan penjualan dan pembelian barang</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Dibuat Dengan Kemudahan</h3>
                            <p class="text-muted mb-0">Anda dapat menggunakan aplikasi inventaris barang ini dengan fitur yang sangat mudah dipahami</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Hubungi Kami!</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Siap memulai pertanyaan seputaran aplikasi kami? Hubungi kami dan kami akan segera menghubungi Anda!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>(021) 79186894</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fab fa-whatsapp fa-4x mb-1 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block">(+62) 82122116992</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2021 - ARCADEMY RIFKI RAMADHAN</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="assets/js/scripts.js"></script>
    </body>
</html>
