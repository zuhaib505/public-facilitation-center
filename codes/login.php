<?php
if(isset($_POST['submit'])){
    unset($_POST['submit']);
    $vals= $_POST;
    $status=true;
$email= $_POST['email'];
$password= $_POST['password'];

global $conn;
    $query = "select * from tbl_customers where cus_email= $email and cus_password=$password";
        $queryexe = $conn->query($query) or die($query);
        $validate = $queryexe->fetch_assoc();
        if($validate){
            $_SESSION['cus_id']=$validate['cus_id'];
            $_SESSION['cus_name']=$validate['cus_name'];
            $_SESSION['cus_image']=$validate['cus_image'];
            redirectTo($path);
        }else{
            $_SESSION['successMsg'] = "Invalid Login Credentials!";
        }
}
?>