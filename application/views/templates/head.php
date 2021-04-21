<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <?php
    if (isset($title) && $title == 'Home') { ?>
        <title><?= APP_NAME ?></title>
    <?php } else { ?>
        <title><?= isset($title) && $title ? $title . ' | ' : "" ?><?= APP_NAME ?></title>
    <?php } ?>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/frontend/img/favi.png" rel="icon">
    <link href="<?php echo base_url(); ?>assets/frontend/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url(); ?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url(); ?>assets/frontend/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Mentor - v2.2.1
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <!-- <h1 class="logo mr-auto"><a href="<?php echo base_url(); ?>"><?= APP_NAME ?></a></h1> -->
            <h1 class="logo mr-auto"><a href="<?php echo base_url(); ?>"> <img src="<?= base_url('assets/frontend/img/logo.png') ?>" alt="<?= APP_NAME ?>"></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="<?= isset($nav_title) && $nav_title == 'home' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <!-- <li class="<?= isset($nav_title) && $nav_title == 'about' ? 'active' : '' ?>"><a href="<?= base_url('about-us') ?>">About</a></li> -->
                    <!--<li class="<?= isset($nav_title) && $nav_title == 'list' ? 'active' : '' ?>"><a href="<?= base_url('list') ?>">List</a></li> -->
                    <?php if($this->session->userdata('vendor_login')) { ?>
                        <li class="<?= isset($nav_title) && $nav_title == 'image' ? 'active' : '' ?>"><a href="<?= base_url('vendor-image') ?>">Image</a></li>
                        <li class="<?= isset($nav_title) && $nav_title == 'xls' ? 'active' : '' ?>"><a href="<?= base_url('xlsx-list') ?>">Xlsx</a></li>
                    <?php } ?>
                    <li class="<?= isset($nav_title) && $nav_title == 'contact' ? 'active' : '' ?>"><a href="<?= base_url('contact-us') ?>">Contact</a></li>
                </ul>
            </nav><!-- .nav-menu -->
            <?php if (!$this->session->userdata('vendor_login')) : ?>
                <a href="<?php echo base_url(); ?>users/login" class="get-started-btn">Sign In</a>
                <!-- <a href="<?php echo base_url(); ?>users/register" class="get-started-btn">Register</a> -->
            <?php endif; ?>
            <?php if ($this->session->userdata('vendor_login')) : ?>
                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li class="drop-down"><a href=""><?= $this->session->vendor_username ?></a>
                            <ul>
                                <li><a href="<?= base_url('users/dashboard') ?>">Dashboard</a></li>
                                <li><a href="<?= base_url('users/logout') ?>">Logout</a></li>

                            </ul>
                        </li>
                    </ul>
                </nav>
            <?php endif; ?>

        </div>
    </header><!-- End Header -->