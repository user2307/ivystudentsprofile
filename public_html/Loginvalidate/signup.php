<?php
include "../database.php";
$email=$_POST['email'];
//$email="vandanaarora231990@gmail.com";
if ($email=='')

echo  "Please enter your email address";
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Invalid email address";
}
else{


$sql = "SELECT email FROM LoginDetails WHERE email = '".$email."'";
$select = mysqli_query($conn, $sql);


if (!(mysqli_num_rows($select) > 0)) {
    echo "This e-mail address doesn't have an associated user account. Are you sure you've registered?";
}
else
{
$sql = "SELECT password_reset_key FROM LoginDetails WHERE email = '".$email."'";
$select = mysqli_query($conn, $sql);
if (mysqli_num_rows($select) > 0) {
$row = mysqli_fetch_assoc($select);
    $token = $row['password_reset_key'];
if(!$token){
$key = uniqid(mt_rand(), true);
$token = md5($_POST['email'].$key);
}}
$url="http://www.ivystudentsprofile.com/accounts/reset-password.php?key=$token";
/*$headers = "From: ivyprofiles@ivystudentsprofile.com \r\n" . 
"Reply-To: ivyprofiles@ivystudentsprofile.com \r\n" . 
"Content-type: text/html; charset=UTF-8 \r\n"; 
mail($email,"Reset Password", $url, $Headers);
*/
$sql = "UPDATE LoginDetails SET password_reset_key='$token' WHERE email='$email'";
if ($conn->query($sql) === TRUE) {

$to = $email;
    $email_from = "ivyprofiles@ivystudentsprofile.com";

    $full_name = 'Ivystudentsprofile';
    $from_mail = $full_name.'<'.$email_from.'>';



    $subject = "Reset Password";
    $message = "<p>Hi there,</p>";
    $message .= '
            <p>Please use the following link to reset the password. Note that this is one-time-use link.<br/><a href="'.$url.'">
    '.$url.'</a><br><br/>Thanks,<br>Ivystudentsprofile</p>';
    $from = $from_mail;

    $headers = "" .
               "Reply-To:" . $from . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";        
$headers .= 'From: ' . $from . "\r\n";
$headers .= "Bcc: ivyprofiles@ivystudentsprofile.com\r\n";
    mail($to,$subject,$message,$headers,'-fivyprofiles@ivystudentsprofile.com');

}
}
}



?>
