<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>PMS Department of Posts</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="<?= base_url('public/assets_web/img/logo2.png') ?>" rel="icon">
        <link href="<?= base_url('public/assets_web/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="<?= base_url('public/assets_web/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('public/assets_web/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
        <link href="<?= base_url('public/assets_web/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('public/assets_web/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('public/assets_web/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="<?= base_url('public/assets_web/css/style.css') ?>" rel="stylesheet">

        <!-- =======================================================
        * Template Name: Butterfly
        * Updated: Sep 18 2023 with Bootstrap v5.3.2
        * Template URL: https://bootstrapmade.com/butterfly-free-bootstrap-theme/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center justify-content-between">

                <a href="index.html" class="logo"><img src="<?= base_url('public/assets_web/img/logo2.png') ?>" alt="" class="img-fluid"></a>
                <!-- Uncomment below if you prefer to use text as a logo -->
                <!-- <h1 class="logo"><a href="index.html">Butterfly</a></h1> -->

                <nav id="navbar" class="navbar">
                    <h1>Department of Posts</h1>
                    <!--  <ul>
                      <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                      <li><a class="nav-link scrollto" href="#about">About</a></li>
                      <li><a class="nav-link scrollto" href="#services">Services</a></li>
                      <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
                      <li><a class="nav-link scrollto" href="#team">Team</a></li>
                      <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                          <li><a href="#">Drop Down 1</a></li>
                          <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                              <li><a href="#">Deep Drop Down 1</a></li>
                              <li><a href="#">Deep Drop Down 2</a></li>
                              <li><a href="#">Deep Drop Down 3</a></li>
                              <li><a href="#">Deep Drop Down 4</a></li>
                              <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                          </li>
                          <li><a href="#">Drop Down 2</a></li>
                          <li><a href="#">Drop Down 3</a></li>
                          <li><a href="#">Drop Down 4</a></li>
                        </ul>
                      </li>
                      <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i><!-- .navbar -->
                </nav>

            </div>
        </header><!-- End Header -->

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1>Payroll Management System - Ratnapura Region</h1>
                        <?= form_open('useraccount/login', array("class" => "row", "novalidate" => "novalidate")) ?>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mt-3 col-md-6">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                </div>
                            </div>

                            <a href="<?= base_url('useraccount/reset_password')?>">Forgot password</a>   
                            <div> <button class="btn-get-started scrollto" type="submit">Login</button></div>
                       <?= form_close(); ?>
                              <span class="text-danger"><?= service('validation')->getError('password') ?></span>
                               <span class="text-danger"><?= service('validation')->getError('username') ?></span>

                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img">
                        <img src="<?= base_url('public/assets_web/img/postman.jpg') ?>" class="img-fluid" alt="">
                    </div>
                </div>
            </div>

        </section><!-- End Hero -->

        <main id="main">

     

            

            

            

           

            

                            

                            


        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="footer-newsletter">
                

            <div class="container py-4">
                <div class="copyright">
                    &copy; Copyright <strong><span>PMS</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/butterfly-free-bootstrap-theme/ -->
                    Designed by PT Madhuwanthi
                </div>
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="<?= base_url('public/assets_web/vendor/purecounter/purecounter_vanilla.js') ?>"></script>
        <script src="<?= base_url('public/assets_web/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?= base_url('public/assets_web/vendor/glightbox/js/glightbox.min.js') ?>"></script>
        <script src="<?= base_url('public/assets_web/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
        <script src="<?= base_url('public/assets_web/vendor/swiper/swiper-bundle.min.js') ?>"></script>
        <script src="<?= base_url('public/assets_web/vendor/php-email-form/validate.js') ?>"></script>

        <!-- Template Main JS File -->
        <script src="<?= base_url('public/assets_web/js/main.js') ?>"></script>

    </body>

</html>
