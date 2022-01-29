<?php
$phpfile = $_REQUEST['page'];
$phpfilename = $phpfile . ".php";
$phpcodefile = $phpfile . ".php";
if (file_exists("codes/" . $phpcodefile)) {
    include_once("codes/" . $phpcodefile);
}

if ($_REQUEST["page"] == 'index' || !isset($_REQUEST["page"])) {
    $includefile = "inc_pages/home.php";
} else if (file_exists("inc_pages/" . $phpfilename)) {
    $includefile = "inc_pages/" . $phpfilename;
} else {
    redirectTo('home');
}
