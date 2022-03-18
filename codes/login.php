<?php
if ($_SESSION["user_id"] > 0) {

    redirectTo("user/");
}
if(isset($_POST['submit'])){
    unset($_POST['submit']);
    $vals= $_POST;
    $status=true;
    $email= $_POST['email'];
    $password= $_POST['password'];

    $user_qry =  "SELECT * FROM tbl_users WHERE user_email='" . trim($email) . "'AND user_password = '".doEncode($password)."' ";
    $user_exe = $conn->query($user_qry) or die(mysqli_error($conn));
    $user = $user_exe->fetch_assoc();

if ($user) {
    $_SESSION['user_id']=$user['user_id'];
    $_SESSION['user_email']=$user['user_email'];
    $_SESSION['user_image']=$user['user_profile_image'];
    $_SESSION['user_name']=$user['user_name'];
    $_SESSION['successMsg'] = "Welcome ".$_SESSION['user_name']." !";
    redirectTo("user/");
}else{
    $_SESSION['errorMsg'] = "Invalid Login Credentials !";
}
}
?>