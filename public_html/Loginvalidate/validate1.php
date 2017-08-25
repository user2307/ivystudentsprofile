<?php
include "../database.php";
function generateHash($password) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        return crypt($password, $salt);
    }
}


function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


$email=$_POST['email'];
$name=$_POST['name'];
$password=$_POST['password'];
$err='';
list($userName, $mailDomain) = split("@", $email);
if($name=='' || trim($name)=="")
$err= "Please enter your name";
elseif ($email=='')

$err= "Please enter your email address";
elseif($password=='')
$err= "Please enter your password (at least 6 characters long)";
elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
 $err= "Please check your name. Only letters and white space allowed"; 
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $err= "Invalid email address"; 
}
elseif (!checkdnsrr($mailDomain, "MX")) {
$err="This email domain does not exist. Please enter proper email address with correct domain name.";
}
elseif(strlen($password)<6)
$err="Password must contain at least 6 characters";

else{
$sql = "SELECT email FROM LoginDetails WHERE email = '".$_POST['email']."'";
$select = mysqli_query($conn, $sql);
if (mysqli_num_rows($select) > 0) {
  $err= "This email address already has a registered account. Please choose a different email address.";
}
else{
$password= generateHash($password);
$com_code = md5(uniqid(rand()));
$ip=getRealIpAddr();
//$sql = "INSERT INTO LoginDetails (ip,name,email,password,com_code)VALUES ('$ip','$name','$email','$password','$com_code')";
if (true){//$conn->query($sql) === TRUE) {
 $to = $email;
$email_from = "ivyprofiles@ivystudentsprofile.com";

    $full_name = 'Ivystudentsprofile';
    $from_mail = $full_name.'<'.$email_from.'>';
     $from = $from_mail;
 
$subject = "Confirm your email address";
   $header = "Ivystudentsprofile: Confirmation email";
   $message = "Hi ".$name.", <br/><br/>Welcome to Ivystudentsprofile!<br/><br/>Please click the link below to verify your email address. <br/>";
   $message .= "<a href='http://www.ivystudentsprofile.com/Loginvalidate/confirm.php?passkey=$com_code'>http://www.ivystudentsprofile.com/Loginvalidate/confirm.php?passkey=$com_code</a><br/><br/>If you are having trouble clicking the link, copy-paste the url in your browser.<br/><br/>Thanks,<br/>Ivystudentsprofile";
    $headers = "" .
               "Reply-To:" . $from . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: ' . $from . "\r\n";
$headers .= "Bcc: ivyprofiles@ivystudentsprofile.com\r\n";
//  $sentmail =   mail($to,$subject,$message,$headers,'-fivyprofiles@ivystudentsprofile.com');
//   $sentmail = mail($to,$subject,$message,$header);
$sentmail=1;
   if($sentmail)
            {
 //  echo "Your Confirmation link Has Been Sent To Your Email Address.";
$err="success";  
 }
   else
         {
   $err= "Cannot send Confirmation link to your e-mail address";
   }






  //  $err="success";
}
else
$err="Cannot register you at this moment. Please try again.";






$conn->close();


}
}
echo $err;

?>
