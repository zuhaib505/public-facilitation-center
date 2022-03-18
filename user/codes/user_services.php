<?php
$news_title = 'User Services';
$news_short = 'User Services';
$news_page = 'user_services';
$page_uri = 'user_services';
$this_prefix = 'us_';
$this_table = 'tbl_user_services';

if (isset($_POST['submit1'])) {
    $vals = $_POST;
    unset($vals['submit1']);
    if ($_REQUEST['mode'] == 'add') {
        global $conn;
        $s1_max_orderid = "select max({$this_prefix}order) as orderid from $this_table where 1 ";
        $q1_max_orderid = $conn->query($s1_max_orderid) or die($s1_max_orderid);
        $r1_max_orderid = $q1_max_orderid->fetch_array();
        $vals[$this_prefix . 'order'] = intval($r1_max_orderid["orderid"]) + 1;
        $vals['us_slug'] = toSlugUrl($vals['us_title']);
        $vals['user_id'] = $_SESSION['user_id'];
        $vals['us_status'] = 1;
        if ($img_rs = uploadImage($_FILES[$this_prefix . "image"], "../uploads/services/", 720)) {
            $vals[$this_prefix . 'image'] = $img_rs;
        }
        if ($_POST['terms']) {
            unset($vals['terms']);
            saveRecord($this_table, $vals);
            $_SESSION['successMsg'] = "Service has been saved successfully !";
        } else {
            $_SESSION['errorMsg'] = "Please Agree To The Terms And Conditions!";
        }
    } else if ($_REQUEST['mode'] == 'update') {
        if ($vals['us_slug'] == trim($vals['us_slug']) && strpos($vals['us_slug'], ' ') !== false) {
            $vals['us_slug'] = toSlugUrl($vals['us_slug']);
        }
        if ($img_rs = uploadImage($_FILES[$this_prefix . "image"], "../uploads/services/", 720)) {
            $vals[$this_prefix . 'image'] = $img_rs;
        }
        if ($_POST['terms']) {
            unset($vals['terms']);
            $_SESSION['successMsg'] = "Service has been saved successfully !";
        } else {
            $_SESSION['errorMsg'] = "Please Agree To The Terms And Conditions!";
        }
        updateRecord($this_table, $vals, " `{$this_prefix}id` = '" . $_REQUEST["code"] . "' ");

        $_SESSION['successMsg'] = "Service has been updated successfully !";
    }
}


if (!empty($_REQUEST['code']))
    $data = getTable($this_table, $this_prefix . "id = '" . $_REQUEST["code"] . "'");

if (isset($_REQUEST['mode'])) {
    if ($_REQUEST['mode'] == 'delete') {
        $id = $_REQUEST['code'];
        $delqry = "DELETE FROM `tbl_user_services` WHERE us_id=$id";
        $delexe = $conn->query($delqry) or die($delqry);
        $_SESSION['successMsg'] = 'Record Deleted successfully !';
    }
}



if (isset($_POST)) {
    global $conn;

    $query_rs_pages = "SELECT * FROM $this_table WHERE 1 ORDER BY {$this_prefix}order ASC";
    $rs_pages = $conn->query($query_rs_pages) or die('mysql error');
    while ($row_rs_pages = $rs_pages->fetch_array()) {
        if (isset($_REQUEST["orderid" . $row_rs_pages[$this_prefix . "id"] . ""])) {
            $s35 = "update $this_table set {$this_prefix}order = '" . $_REQUEST["orderid" . $row_rs_pages[$this_prefix . "id"] . ""] . "' where {$this_prefix}id = '" . $row_rs_pages[$this_prefix . "id"] . "' ";
            $q35 = $conn->query($s35) or die($s35);
            $_SESSION['successMsg'] = 'Changes has been saved successfully !';
        }
    }
}

$pager = '&pager=' . $_REQUEST['pager'];