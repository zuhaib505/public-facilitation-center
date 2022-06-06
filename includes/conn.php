<?php session_start();
error_reporting(1);

if ($_SERVER['HTTP_HOST'] != 'localhost') {
    $hostname_dbconn = "localhost";
    $rating_dbname = "public";
    $username_dbconn = "root";
    $password_dbconn = '';

    $path = "http://localhost/public-facilitation-center/";
} else {
    $hostname_dbconn = "localhost";
    $rating_dbname = "public";
    $username_dbconn = "root";
    $password_dbconn = "";

    $path = "http://localhost/public-facilitation-center/";
}

define('CURRENCY', '$');
@include_once($path . 'vendor/autoload.php');

global $conn;
$conn = mysqli_connect($hostname_dbconn, $username_dbconn, $password_dbconn, $rating_dbname) or die('mysql_error');

$apath = $path . "apanel/";
define('PATH', $path);
define('APATH', $apath);
$domain = "public.com";
define('VERSION', '1.3');


$site_sql = "SELECT * FROM `tbl_siteadmin` WHERE 1 ";
$site_ex = $conn->query($site_sql) or die('mysqli error');
$aConfig = $site_ex->fetch_assoc();

extract($aConfig);


$site_data1 = unserialize(stripslashes($site_info_data));
extract($site_data1);
$site_data2 = unserialize(stripslashes($site_contact_data));
extract($site_data2);
$site_data3 = unserialize(stripslashes($site_meta_data));
extract($site_data3);
$site_data4 = unserialize(stripslashes($site_social_data));
extract($site_data4);
$site_data5 = unserialize(stripslashes($site_smtp_data));
extract($site_data5);
$site_data7 = unserialize(stripslashes($site_captcha));
extract($site_data7);
$site_data8 = unserialize(stripslashes($site_script_data));
extract($site_data8);

date_default_timezone_set($timezone);
