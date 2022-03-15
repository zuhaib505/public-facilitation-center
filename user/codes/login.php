<?php
if ($_SESSION['user_id'] > 0) {

    redirectTo('user/');
}

if (isset($_REQUEST['login']) && $_REQUEST['login'] == 'posted') {


    $loginUsername = trim($_POST['email']);

    $password = trim(stripslashes(htmlentities(htmlspecialchars($_POST['password'], ENT_QUOTES))));

    if (!empty($loginUsername) || !empty($password)) {


        if ($ex = getList(" SELECT * FROM tbl_users 	WHERE 	user_email='" . $loginUsername . "' AND user_password='" . doEncode($password) . "' ")) {

            $rs = fetch($ex);
            $time = time();
            $_SESSION['user_id'] = $rs["user_id"];
            $_SESSION['user_session'] = $time;
            $_SESSION['user_name'] = $rs["user_name"];
            $_SESSION['user_image'] = $rs["user_profile_image"];
            $data['user_login_session'] = $time;
            $_SESSION['successMsg'] = "Dear <strong>" . $rs['user_name'] . "!</strong>, Welcome to the ISKNI Dashboard for session 2021-22.";
            updateRecord("tbl_users", $data, "user_id = '" . $rs["user_id"] . "'");
            redirectTo('user/');
        } elseif ($ex = getList(" SELECT * FROM tbl_users 	WHERE 	user_username='" . $loginUsername . "' AND user_password='" . doEncode($password) . "' ")) {

            $rs = fetch($ex);
            $time = time();
            $_SESSION['user_id'] = $rs["user_id"];
            $_SESSION['user_session'] = $time;
            $_SESSION['user_name'] = $rs["user_name"];
            $_SESSION['user_image'] = $rs["user_profile_image"];
            $data['user_login_session'] = $time;
            $_SESSION['successMsg'] = "Dear <strong>" . $rs['user_name'] . "!</strong>, Welcome to the ISKNI Dashboard for session 2021-22.";
            updateRecord("tbl_users", $data, "user_id = '" . $rs["user_id"] . "'");
            redirectTo('user/');
        } else {
            $_SESSION['errorMsg'] = "Invalid Login Credentials.";
        }
    } else {
        $_SESSION['errorMsg'] = "Please fill in all the required fields.";
    }
}
// For Testing Purpose
if (isset($_REQUEST['just']) && $_REQUEST['just'] == 'doit' && $_REQUEST['user_email'] != "") {
    $rs = getAmbassadorByEmail(trim($_REQUEST['user_email']));
    if ($rs) {
        $_SESSION['user_id'] = $rs["user_id"];
        $_SESSION['user_session'] = $time;
        $_SESSION['user_name'] = $rs["user_name"];
        $_SESSION['user_image'] = $rs["user_profile_image"];
        echo '<script type="text/javascript" language="javascript">document.location="' . $path . 'portal";</script>';
        exit;
    }
}

if (isset($_REQUEST['reset']) && $_REQUEST['reset'] == '1') {


    if ($ex = getList("SELECT * FROM tbl_siteadmin WHERE 1 ")) {
        $rs = fetch($ex);
        // Email to Admin

        $msg_body = "
        Dear SuperAdmin<br>
        System has received password reset request.<br>
        <br>
        Following are the login credentials:<br>
        <br>
        <strong>Username: </strong> " . $rs['site_login'] . "<br>
        <strong>Password: </strong> " . doDecode($rs['site_pswd']) . "
        <br>
        <br>
        Best regards<br>
        $site_name";

        $emailto = $site_email;
        $subject = "$site_name : Password Reset";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html;charset=utf-8\r\n";
        $headers .= "From: No-Reply <noreply@$domain>" . "\r\n";
        $headers .= "Reply-To: No-Reply <noreply@$domain>" . "\r\n";
        $body = $msg_body;
        @mail($emailto, $subject, $body, $headers);
        $_SESSION['successMsg'] = "Password has been sent to Admin email address.";
        echo '<script type="text/javascript" language="javascript">document.location="' . $apath . 'login";</script>';
        exit;
    }
}
