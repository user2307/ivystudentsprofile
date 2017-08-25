<?php
include "../database.php";
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
$id=$_SESSION['id'];
$email=$_POST['email'];
$com_code = md5(uniqid(rand()));

$sql = $conn->prepare("UPDATE LoginDetails set com_code=(?) WHERE user_id=(?) AND com_code IS NOT NULL");
$sql->bind_param("sd", $com_code,$id);
$sql->execute();
$nrows= $sql->affected_rows;
if ($nrows) {
//$conn->query($sql);
 $to = $email;
$email_from = "ivyprofiles@ivystudentsprofile.com";

    $full_name = 'Ivystudentsprofile';
    $from_mail = $full_name.'<'.$email_from.'>';
     $from = $from_mail;

$subject = "Confirm your email address";
   $header = "Ivystudentsprofile: Confirmation email";
   $message = "Hi there,<br/><br/>Please click the link below to verify your email address. <br/>";
   $message .= "<a href='http://www.ivystudentsprofile.com/Loginvalidate/confirm.php?passkey=$com_code'>http://www.ivystudentsprofile.com/Loginvalidate/confirm.php?passkey=$com_code</a><br/><br/>If you are having trouble clicking the link, copy-paste the url in your browser.<br/><br/>Thanks,<br/>Ivystudentsprofile";
    $headers = "" .
               "Reply-To:" . $from . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: ' . $from . "\r\n";
$headers .= "Bcc: ivyprofiles@ivystudentsprofile.com\r\n";
  $sentmail =   mail($to,$subject,$message,$headers,'-fivyprofiles@ivystudentsprofile.com');

   if($sentmail)
            {
$err="Your Confirmation link Has Been Sent To Your Email Address. Please confirm your email.";
 }
   else
         {
   $err= "Cannot send Confirmation link to your e-mail address";
   }
}
else
 $err= "Cannot send Confirmation link to your e-mail address. Your email address has been verified.";

echo $err;
?>
