<?php
include_once("../includes/conn.php");

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = mres($_POST['email']);

$output['status'] = TRUE;

// validations
if (empty($email)) {
    $output['status'] = FALSE;
    $output['message'] = "Please add your email address";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $output['status'] = FALSE;
    $output['message'] = "Please add a valid email address";
}
if ($output['status']) {
    $temp = "SELECT * FROM tbl_emails WHERE email_type='newsletter'";
    $exetemp = $conn->query($temp) or die('mysql_error');
    $email_tempplate = $exetemp->fetch_assoc();
    // Setup email to the admin
    $admin_data = array(
        "BASE_URL" => $path,
        "SITE_LOGO" => $path . 'uploads/logo/' . $site_logo,
        "SITE_NAME" => $site_name,
        "SITE_FOOTER" => $site_name,
        "TOP_BANNER" => $path . 'assets/images/illustrations/mailbox.png',
        "MSG_TITLE" => "Dear Admin",
        "MSG_BODY" => "<h4>You have received  a message</h4>",
    );
    $msg_data = array(
        //"Ful Name" => $fullname,
        "Purpose" => "Get Latest Newsletters",
        "Email Address" => $email,
    );
    $admin_data['MSG_BODY'] .= nl2br($_POST['message']);
    $msg_body = '<table width="100%" style="margin-top:2rem;" border="0" cellspacing="0" cellpadding="0">
                <tr><th align="left"><u>Message Details</u><th></tr>';
    foreach ($msg_data as $key => $value) {
        $msg_body .= '  <tr>
                        <th width="30%" style="text-align: left;vertical-align: top;padding: 4px 0px;">' . $key . '</th>
                        <td>' . $value . '</td>
                    </tr>';
    }
    $msg_body .= "</table>";
    $admin_data['DATA'] = $msg_body;
    $template = file_get_contents("./inc_pages/widgets/email-templates/admin-send-message.php");
    foreach ($admin_data as $key => $value) {
        $template = str_replace('{{' . $key . '}}', $value, $template);
    }
    $emailto = trim($email_tempplate['email_to']);
    $subject = "Lattest News : " . stripslashes($_POST["email"]);
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html;charset=utf-8\r\n";
    $headers .= "From: No-Reply <no-reply@publicfacilitationcenter.com>" . "\r\n";
    $headers .= "Reply-To: No-Reply <no-reply@publicfacilitationcenter.com>" . "\r\n";

    if ($site_driver == "mail") {
        $oldsub = "SELECT * FROM tbl_subscribers WHERE sub_email='$email'";
        $exeoldsub = $conn->query($oldsub) or die('mysql_error');
        if ($fetcholdsub = $exeoldsub->fetch_assoc()) {
            $output['message'] = "You Have Already Subscribed.";
        } else {
            $s1_max_orderid = "select max(`sub_order`) as orderid from tbl_subscribers where 1 ";
            $q1_max_orderid = $conn->query($s1_max_orderid) or die($s1_max_orderid);
            $r1_max_orderid = $q1_max_orderid->fetch_array();
            $order = intval($r1_max_orderid["orderid"]) + 1;
            $newsub = "INSERT INTO `tbl_subscribers`(`sub_email`, `sub_status`, `sub_order`) VALUES ('$email','1','$order')";
            $exenewsub = $conn->query($newsub) or die('mysql_error');
            // $fetchnewsub = $exenewsub->fetch_assoc();
            @mail($emailto, $subject, $template, $headers);
            $output['message'] = "Thank you for subscribing";
        }

    } else {

        //Load composer's autoloader
        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.mailtrap.io:2525';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'cb8cb9f466f91a';                 // SMTP username
            $mail->Password = '5b9c00d39e2d52';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('from@example.com');
            $mail->addAddress('to@example.com');     // Add a recipient


            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = $template;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $output['message'] = "Thank you for subscribring";
        } catch (Exception $e) {
            $output['status'] = FALSE;
            $output['message'] = 'Message could not be sent, Please try later.';
        }
    }
    // Setup auto-reply email to the user
    $data = array(
        "BASE_URL" => $path,
        "SITE_LOGO" => $path . 'uploads/logo/' . $site_logo,
        "SITE_NAME" => $site_name,
        "SITE_FOOTER" => $site_name,
        "TOP_BANNER" => $path . 'assets/images/illustrations/contact-us.png',
        "MSG_TITLE" => "Dear Customer",
        "MSG_BODY" => $email_tempplate['email_body'],
    );
    $template = file_get_contents("./inc_pages/widgets/email-templates/send-message.php");
    foreach ($data as $key => $value) {
        $template = str_replace('{{' . $key . '}}', $value, $template);
    }
    $emailto = $email;
    $subject = $email_tempplate['email_subject'];;
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html;charset=utf-8\r\n";
    $headers .= "From: No-Reply <no-reply@publicfacilitationcenter.com>" . "\r\n";
    $headers .= "Reply-To: No-Reply <no-reply@publicfacilitationcenter.com>" . "\r\n";
    $body = $msg_body;

    if ($site_driver == "mail") {
        @mail($emailto, $subject, $template, $headers);
    } else {

        //Load composer's autoloader
        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.mailtrap.io:2525';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'cb8cb9f466f91a';                 // SMTP username
            $mail->Password = '5b9c00d39e2d52';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('from@example.com');
            $mail->addAddress('to@example.com');     // Add a recipient


            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = $body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $output['message'] = "Thank you for subscribing";
        } catch (Exception $e) {
            $output['status'] = FALSE;
            $output['message'] = 'Message could not be sent, Please try later.';
        }
    }
}

echo json_encode($output);
exit;
