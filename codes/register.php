<?php
if(isset($_POST['submit'])){
    unset($_POST['submit']);
    unset($_POST['c_password']);
    $vals= $_POST;
    $vals['cus_status'] = 1;
    // global $conn;
    //     $s1_max_orderid = "select max(cus_order) as orderid from tbl_customers";
    //     $q1_max_orderid = $conn->query($s1_max_orderid) or die($s1_max_orderid);
    //     $r1_max_orderid = $q1_max_orderid->fetch_array();
    //     $vals['cus_order'] = intval($r1_max_orderid["orderid"]) + 1;
    $vals['cus_order'] = 1;
    // if ($img_rs = uploadImage($_FILES["image"], "uploads/customers/", 720)) {
    //     $vals['cus_image'] = $img_rs;
    // }
    // print_r($vals);
    saveRecord("tbl_customers", $vals);
    $_SESSION['successMsg'] = "Your Account Has Been Created Successfully!";
}
?>