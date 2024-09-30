<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Payroll Management System - Login</title>  

        <!-- Vendor CSS Files -->
        <link href="<?= base_url('public/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('public/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
        <link href="<?= base_url('public/assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('public/assets/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
        <link href="<?= base_url('public/assets/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
        <link href="<?= base_url('public/assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
        <link href="<?= base_url('public/assets/vendor/simple-datatables/style.css') ?>" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="<?= base_url('public/assets/css/style.css') ?>" rel="stylesheet">

    </head>

    <body class="bg-info-light">

        <main>
            <div class="container">

                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                                <div class="d-flex justify-content-center py-4">
                                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                                        <img src="<?= base_url('public/assets/img/slpost.png') ?>" alt="">
                                        <span class="d-none d-lg-block">PMS</span>
                                    </a>
                                </div><!-- End Logo -->

                                <div class="card mb-3">

                                    <div class="card-body bg-warning">

                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                            <p class="text-center small">Enter your username & password to login</p>
                                        </div>


                                        <?= form_open('user/login', array("class" => "row", "novalidate" => "novalidate")) ?>
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control" id="yourUsername" value="<?= set_value('username') ?>" >
                                                
                                            </div>
                                            <span class="text-danger"><?= service('validation')->getError('username') ?></span>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword" >
                                            <span class="text-danger"><?= service('validation')->getError('password') ?></span>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-danger w-100" type="submit">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                                        </div>
                                        <?= form_close(); ?>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </main><!-- End #main -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="<?= base_url('public/assets/vendor/apexcharts/apexcharts.min.js') ?>"></script>
        <script src="<?= base_url('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?= base_url('public/assets/vendor/chart.js/chart.umd.js') ?>"></script>
        <script src="<?= base_url('public/assets/vendor/echarts/echarts.min.js') ?>"></script>
        <script src="<?= base_url('public/assets/vendor/quill/quill.min.js') ?>"></script>
        <script src="<?= base_url('public/assets/vendor/simple-datatables/simple-datatables.js') ?>"></script>
        <script src="<?= base_url('public/assets/vendor/tinymce/tinymce.min.js') ?>"></script>
        

        <!-- Template Main JS File -->
        <script src="<?= base_url('public/assets/js/main.js') ?>"></script>

    </body>

</html>