<?php

// $phpfile = $_REQUEST["page"];
// $phpfilename = $phpfile . ".inc.php";
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
    // if ($page_ex = getList("SELECT * FROM tbl_pages  WHERE page_name = '" . $_REQUEST['page'] . "' ")) {
    //     $page = fetch($page_ex);
    //     extract($page);
    //     $includefile = "inc_pages/page_name.php";
    // } else {
    redirectTo('page-not-found.html');
    // }
}
//pr($_SESSION);

$texts = getTexts();
extract($texts);
