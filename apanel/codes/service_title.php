<?php

//service_title.php
session_start();
  $user_id = $_POST["user_id"];
  $qryuser =  "SELECT * FROM tbl_users  WHERE user_status='1' AND `user_id` = $user_id";
  $exeuser = $conn->query($qryuser) or die(mysqli_error($conn));
  $userajax = $exeuser->fetch_assoc();
  $service_id = $userajax['service_id'];
  $service = getServiceByServiceId($service_id);
  $output .= '
            <label for="field">Service</label>
            <input type="text" name="service" id="service" value="'.$service["service_title"].'" class="form-control" disabled />
        ';
  echo $output;
  exit;

?>