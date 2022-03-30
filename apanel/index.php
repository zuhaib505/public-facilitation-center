<?php
include_once("../includes/conn.php");
include_once('../includes/SimpleImage.php');
include_once('../includes/baseFunctions.php');
include_once('../includes/siteFunctions.php');
include_once('includes/adminFunctions.php');
include_once("includes/confg.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel - <?= $site_name ?></title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
    <link href="<?= $path ?>assets/images/logo/icon.png" rel="icon">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="<?= $apath; ?>assets/vendor/perfect-scrollbar.css" rel="stylesheet">



    <!-- App CSS -->
    <link type="text/css" href="<?= $apath; ?>assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="<?= $apath; ?>assets/css/app.rtl.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="<?= $apath; ?>assets/css/vendor-material-icons.css" rel="stylesheet">
    <link type="text/css" href="<?= $apath; ?>assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="<?= $apath; ?>assets/css/vendor-fontawesome-free.css" rel="stylesheet">
    <link type="text/css" href="<?= $apath; ?>assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

    <!-- Flatpickr -->
    <link type="text/css" href="<?= $apath; ?>assets/css/vendor-flatpickr.css" rel="stylesheet">
    <link type="text/css" href="<?= $apath; ?>assets/css/vendor-flatpickr.rtl.css" rel="stylesheet">
    <link type="text/css" href="<?= $apath; ?>assets/css/vendor-flatpickr-airbnb.css" rel="stylesheet">
    <link type="text/css" href="<?= $apath; ?>assets/css/vendor-flatpickr-airbnb.rtl.css" rel="stylesheet">

    <!-- Vector Maps -->
    <link type="text/css" href="<?= $apath; ?>assets/vendor/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- Toastr -->
    <link type="text/css" href="assets/vendor/toastr.min.css" rel="stylesheet">

    <!-- Custom -->
    <link rel="stylesheet" href="<?= $apath; ?>assets/custom.css">
    <script src="<?= $apath; ?>assets/ajax.js"></script>
    <!-- jQuery -->
    <script src="<?= $apath; ?>assets/vendor/jquery.min.js"></script>
    <style>
        .layout-default {
            width: 100%;
            height: auto;
        }
    </style>
</head>


<body class="layout-default">
    <div class="preloader"></div>
    <!-- <div class="preloader"></div> -->

    <?php include_once('pages/shared/header.php'); ?>
    <?php @include_once($includefile); ?>

    <?php //include_once('pages/shared/footer.php'); 
    ?>

    <!-- Bootstrap -->
    <script src="<?= $apath; ?>assets/vendor/popper.min.js"></script>
    <script src="<?= $apath; ?>assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="<?= $apath; ?>assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- DOM Factory -->
    <script src="<?= $apath; ?>assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="<?= $apath; ?>assets/vendor/material-design-kit.js"></script>

    <!-- App -->
    <script src="<?= $apath; ?>assets/js/toggle-check-all.js"></script>
    <script src="<?= $apath; ?>assets/js/check-selected-row.js"></script>
    <script src="<?= $apath; ?>assets/js/dropdown.js"></script>
    <script src="<?= $apath; ?>assets/js/sidebar-mini.js"></script>
    <script src="<?= $apath; ?>assets/js/app.js"></script>

    <!-- App Settings (safe to remove) -->
    <!-- <script src="<?= $apath; ?>assets/js/app-settings.js"></script> -->

    <!-- Toastr -->
    <script src="assets/vendor/toastr.min.js"></script>
    <script src="assets/js/toastr.js"></script>

    <!-- Flatpickr -->
    <script src="<?= $apath; ?>assets/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="<?= $apath; ?>assets/js/flatpickr.js"></script>

    <!-- Global Settings -->
    <script src="<?= $apath; ?>assets/js/settings.js"></script>

    <!-- Moment.js -->
    <script src="<?= $apath; ?>assets/vendor/moment.min.js"></script>
    <script src="<?= $apath; ?>assets/vendor/moment-range.js"></script>
    <?php showToastMsg(); ?>

</body>

</html>