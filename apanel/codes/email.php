<?php

if (isset($_POST['submit1'])) {
    $vals = $_POST;
    unset($vals['submit1']);

    if ($_REQUEST['mode'] == 'add') {
        saveRecord("tbl_emails", $vals);
        $_SESSION['successMsg'] = 'email has been saved successfully !';
    } else if ($_REQUEST['mode'] == 'update') {
        updateRecord("tbl_emails", $vals, " `email_id` = '" . $_REQUEST["code"] . "' ");
        $_SESSION['successMsg'] = 'email has been updated successfully !';
    }
}

if (!empty($_REQUEST['code']))
    $data = getTable('tbl_emails', "email_id = '" . $_REQUEST["code"] . "'");

if (isset($_REQUEST['mode']))
    deleteRow("tbl_emails", $_REQUEST["mode"], "email_id = '" . $_REQUEST["code"] . "'");

if (isset($_POST['email_status']))
    updateRows("tbl_emails", "email_status", "email_id", $_POST['email_status']);


$pager = '&pager=' . $_REQUEST['pager'];


?>