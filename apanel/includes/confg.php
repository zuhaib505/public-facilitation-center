<?php

$phpfile = explode(".", $_REQUEST["page"]);

$phpfilename = $phpfile[0] . ".inc.php";

$phpcodefile = $phpfile[0] . ".php";



if (file_exists("codes/" . $phpcodefile)) {

	include_once("codes/" . $phpcodefile);

}



if (file_exists("pages/" . $phpcodefile)) {

	$includefile = "pages/" . $phpcodefile;

} else {

	$includefile = "pages/home.php";

}


?>