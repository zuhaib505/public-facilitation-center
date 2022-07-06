<?php
    $vals= $_POST;
    $status=true;
    $vals['req_status'] = 0;
    $vals['req_accept'] = 0;
    global $conn;
        $s1_max_orderid = "select max(req_order) as orderid from tbl_requests";
        $q1_max_orderid = $conn->query($s1_max_orderid) or die($s1_max_orderid);
        $r1_max_orderid = $q1_max_orderid->fetch_array();
        $vals['req_order'] = intval($r1_max_orderid["orderid"]) + 1;
        $redir = $_POST['us_slug'];
        unset($vals['us_slug']);
        if (empty($vals['req_sender_name']) || empty($vals['req_sender_email']) || empty($vals['req_sender_phone']) || empty($vals['req_subject']) || empty($vals['req_message'])) {
            $output['status'] = FALSE;
            $status = false;
            $output['message'] = "Please fill in all the required fields";
        } elseif (!filter_var($vals['req_sender_email'], FILTER_VALIDATE_EMAIL)) {
            $output['status'] = FALSE;
            $status = false;
            $output['message'] = "Please add a valid email address";
        }
    if($status){
        saveRecord("tbl_requests", $vals);
        $_SESSION['successMsg'] = "Your Request Has Been Sent Successfully!";
        unset($_POST);
    }
    redirectTo('pakage/'.$redir);
    

?>