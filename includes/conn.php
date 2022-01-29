<?php session_start();
error_reporting(E_ALL);

if ($_SERVER['HTTP_HOST'] != 'localhost') {
    $hostname_dbconn = "localhost";
    $rating_dbname = "public";
    $username_dbconn = "root";
    $password_dbconn = '';

    $path = "http://localhost:121/public-facilitation-center/";
} else {
    $hostname_dbconn = "localhost";
    $rating_dbname = "public";
    $username_dbconn = "root";
    $password_dbconn = "";

    $path = "http://localhost:121/public-facilitation-center/";
}
@include_once($path . 'vendor/autoload.php');

define('PATH', $path);
