<?php
if(isset($_POST['submit'])){
    unset($_POST['submit']);
    $vals= $_POST;
    $status=true;
    if($vals['user_password']!=$vals['c_password']){
        $status=false;
        $_SESSION['successMsg'] = "Password Does Not Match!";
    }
    if ($ex = getList(" SELECT * FROM tbl_users WHERE user_email='" . trim($vals['user_email']) . "' ")) {
        $status = false;
        $_SESSION['errorMsg'] = "Email already taken by a member.";
    }
    unset($vals['c_password']);
    $vals['user_status'] = 1;
    $vals['user_password'] = doEncode($_POST['user_password']);
    global $conn;
        $s1_max_orderid = "select max(user_order) as orderid from tbl_users";
        $q1_max_orderid = $conn->query($s1_max_orderid) or die($s1_max_orderid);
        $r1_max_orderid = $q1_max_orderid->fetch_array();
        $vals['user_order'] = intval($r1_max_orderid["orderid"]) + 1;
    if ($img_rs = uploadImage($_FILES["user_profile_image"], "uploads/users/", 720)) {
        $vals['user_profile_image'] = $img_rs;
    }
    if($status){
        saveRecord("tbl_users", $vals);
        $_SESSION['successMsg'] = "Your Account Has Been Created Successfully!";
    }
    unset($_POST);
}
?>