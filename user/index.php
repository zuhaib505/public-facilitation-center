<?php
include_once("../includes/conn.php");
include_once('../includes/SimpleImage.php');
include_once('../includes/baseFunctions.php');
include_once('../includes/siteFunctions.php');
include_once('../apanel/includes/adminFunctions.php');
include_once("includes/confg.php");
if ($_SESSION["user_id"] < 1) {

    redirectTo("login");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User - Public Facilitaion Center</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
    <link href="<?= $path ?>assets/images/favicon.ico" rel="icon">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="<?= $path; ?>apanel/assets/vendor/perfect-scrollbar.css" rel="stylesheet">



    <!-- App CSS -->
    <link type="text/css" href="<?= $path; ?>apanel/assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="<?= $path; ?>apanel/assets/css/app.rtl.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="<?= $path; ?>apanel/assets/css/vendor-material-icons.css" rel="stylesheet">
    <link type="text/css" href="<?= $path; ?>apanel/assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="<?= $path; ?>apanel/assets/css/vendor-fontawesome-free.css" rel="stylesheet">
    <link type="text/css" href="<?= $path; ?>apanel/assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

    <!-- Vector Maps -->
    <link type="text/css" href="<?= $path; ?>apanel/assets/vendor/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- Toastr -->
    <link type="text/css" href="<?= $path; ?>apanel/assets/vendor/toastr.min.css" rel="stylesheet">

    <!-- Custom -->
    <link rel="stylesheet" href="<?= $path; ?>apanel/assets/custom.css">
    <script src="<?= $path; ?>apanel/assets/ajax.js"></script>
    <!-- jQuery -->
    <script src="<?= $path; ?>apanel/assets/vendor/jquery.min.js"></script>
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
    <script src="<?= $path; ?>apanel/assets/vendor/popper.min.js"></script>
    <script src="<?= $path; ?>apanel/assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="<?= $path; ?>apanel/assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- DOM Factory -->
    <script src="<?= $path; ?>apanel/assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="<?= $path; ?>apanel/assets/vendor/material-design-kit.js"></script>

    <!-- App -->
    <script src="<?= $path; ?>apanel/assets/js/toggle-check-all.js"></script>
    <script src="<?= $path; ?>apanel/assets/js/check-selected-row.js"></script>
    <script src="<?= $path; ?>apanel/assets/js/dropdown.js"></script>
    <script src="<?= $path; ?>apanel/assets/js/sidebar-mini.js"></script>
    <script src="<?= $path; ?>apanel/assets/js/app.js"></script>

    <!-- Toastr -->
    <script src="<?= $path; ?>apanel/assets/vendor/toastr.min.js"></script>
    <script src="<?= $path; ?>apanel/assets/js/toastr.js"></script>

    <!-- Global Settings -->
    <script src="<?= $path; ?>apanel/assets/js/settings.js"></script>

    <!-- Moment.js -->
    <script src="<?= $path; ?>apanel/assets/vendor/moment.min.js"></script>
    <script src="<?= $path; ?>apanel/assets/vendor/moment-range.js"></script>
    <?php showToastMsg(); ?>

</body>

</html>