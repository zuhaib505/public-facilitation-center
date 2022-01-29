<?php
if(isset($_POST['submit'])){
    unset($_POST['submit']);
    $vals['cus_name'] = $_POST['name'];
    $vals['cus_email'] = $_POST['email'];
    $vals['cus_password'] = doEncode($_POST['password']);
    if ($img_rs = uploadFile($_FILES["image"], "uploads/image/")) {
        $vals['cus_image'] = $img_rs;
    }
    saveRecord("tbl_customers", $vals);
    $_SESSION['successMsg'] = "Your Account Has Been Created Successfully!";
}
?>