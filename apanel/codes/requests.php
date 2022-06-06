<?php
$news_title = 'Requests';
$news_short = 'Requests';
$news_page = 'requests';
$page_uri = 'requests';
$this_prefix = 'req_';
$this_table = 'tbl_requests';

if (isset($_POST['submit1'])) {
    $vals = $_POST;
    unset($vals['submit1']);
    if ($_REQUEST['mode'] == 'add') {
        global $conn;
        $s1_max_orderid = "select max({$this_prefix}order) as orderid from $this_table where 1 ";
        $q1_max_orderid = $conn->query($s1_max_orderid) or die($s1_max_orderid);
        $r1_max_orderid = $q1_max_orderid->fetch_array();
        $vals[$this_prefix . 'order'] = intval($r1_max_orderid["orderid"]) + 1;
        $us_id = $vals['us_id'];
        $user_qry =  "SELECT * FROM tbl_user_services  WHERE us_id = $us_id ORDER BY us_order ASC";
        $user_exe = $conn->query($user_qry) or die(mysqli_error($conn));
        $user = $user_exe->fetch_assoc();
        if($user){
            $vals['user_id'] = $user['user_id'];
        }

        if ($_POST['terms']) {
            unset($vals['terms']);
            saveRecord($this_table, $vals);
            $_SESSION['successMsg'] = "Request has been saved successfully !";
        } else {
            $_SESSION['errorMsg'] = "Please Agree To The Terms And Conditions!";
        }
    } else if ($_REQUEST['mode'] == 'update') {
        
        if ($_POST['terms']) {
            unset($vals['terms']);
            $_SESSION['successMsg'] = "Request has been saved successfully !";
        } else {
            $_SESSION['errorMsg'] = "Please Agree To The Terms And Conditions!";
        }
        if($vals['us_id']){
        $us_id = $vals['us_id'];
        $user_qry =  "SELECT * FROM tbl_user_services  WHERE us_id = $us_id ORDER BY us_order ASC";
        $user_exe = $conn->query($user_qry) or die(mysqli_error($conn));
        $user = $user_exe->fetch_assoc();
        if($user){
            $vals['user_id'] = $user['user_id'];
        }
    }
        updateRecord($this_table, $vals, " `{$this_prefix}id` = '" . $_REQUEST["code"] . "' ");

        $_SESSION['successMsg'] = "Request has been updated successfully !";
    }
}


if (!empty($_REQUEST['code']))
    $data = getTable($this_table, $this_prefix . "id = '" . $_REQUEST["code"] . "'");

if (isset($_POST[$this_prefix . 'delete']))
    deleteRows($this_table, $this_prefix . "id", $_POST[$this_prefix . 'delete']);

if (isset($_POST[$this_prefix . 'status']))
    updateRows($this_table, $this_prefix . "status", $this_prefix . "id", $_POST[$this_prefix . 'status']);

if (isset($_POST[$this_prefix . 'accept']))
    updateRows($this_table, $this_prefix . "accept", $this_prefix . "id", $_POST[$this_prefix . 'accept']);



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
