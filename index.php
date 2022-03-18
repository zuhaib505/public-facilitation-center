<?php
include_once("includes/conn.php");
include_once('includes/baseFunctions.php');
include_once('includes/siteFunctions.php');
include_once('includes/functions.php');
include_once("includes/confg.php");
$banners = unserialize(str($banners['txt_data']));
$header_sec = unserialize(str($header_sec['txt_data']));
$intake_sec = unserialize(str($intake_sec['txt_data'])); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="public facilication">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--====== Title ======-->
    <title>Public Facilitaion Services</title>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?= $path ?>assets/images/favicon.ico" type="image/png">
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?= $path ?>assets/css/bootstrap.min.css">
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="<?= $path ?>assets/fonts/fontawesome/css/all.min.css">
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="<?= $path ?>assets/fonts/flaticon/flaticon.css">
    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="<?= $path ?>assets/css/magnific-popup.css">
    <!--====== Slick css ======-->
    <link rel="stylesheet" href="<?= $path ?>assets/css/slick.css">
    <!--====== Animate css ======-->
    <link rel="stylesheet" href="<?= $path ?>assets/css/animate.css">
    <!--====== Default css ======-->
    <link rel="stylesheet" href="<?= $path ?>assets/css/default.css">
    <!--====== Style css ======-->
    <link rel="stylesheet" href="<?= $path ?>assets/css/style.css">
</head>

<body>

    <body>
        <!-- Body main wrapper start -->
        <div class="body-wrapper">
            <!-- Start Header -->
            <?php @include_once('inc_pages/shared/header.php'); ?>
            <!-- End Header -->
            <!-- Start Include File -->
            <?php @include_once($includefile); ?>
            <!--End Include File-->

            <!--Start Footer-->
            <?php @include_once('inc_pages/shared/footer.php'); ?>
            <!--End Footer-->


        </div>
        <!-- Body main wrapper end -->

        <!--====== back-to-top ======-->
        <a href="#" class="back-to-top"><i class="fas fa-angle-up"></i></a>
        <!--====== Jquery js ======-->
        <script src="<?= $path ?>assets/js/vendor/modernizr-3.6.0.min.js"></script>
        <script src="<?= $path ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
        <!--====== Bootstrap js ======-->
        <script src="<?= $path ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= $path ?>assets/js/popper.min.js"></script>
        <!--====== Slick js ======-->
        <script src="<?= $path ?>assets/js/slick.min.js"></script>
        <!--====== Counterup js ======-->
        <script src="<?= $path ?>assets/js/jquery.counterup.min.js"></script>
        <!--====== Waypoints js ======-->
        <script src="<?= $path ?>assets/js/waypoints.min.js"></script>
        <!--====== Magnific Popup js ======-->
        <script src="<?= $path ?>assets/js/jquery.magnific-popup.min.js"></script>
        <!--====== Isotope js ======-->
        <script src="<?= $path ?>assets/js/isotope.pkgd.min.js"></script>
        <!--====== Imagesloaded js ======-->
        <script src="<?= $path ?>assets/js/imagesloaded.pkgd.min.js"></script>
        <!--====== WoW js ======-->
        <script src="<?= $path ?>assets/js/wow.min.js"></script>
        <!--====== Main js ======-->
        <script src="<?= $path ?>assets/js/main.js"></script>
        <!-- Form validation -->
        <script src="<?= $path ?>assets/js/form-validation.js"></script>
    </body>

</html>