<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);


include "../database.php";
$message=$_POST['message'];
$id=$_SESSION['id'];
$uid=$_POST['uid'];
$sql = "INSERT INTO TextMessages (sender_id,receiver_id, message) VALUES ($id,'$uid','$message'  )";
$conn->query($sql);

$sender="select name from LoginDetails where user_id=$id";
$get= mysqli_query($conn, $sender);
$row34= mysqli_fetch_assoc($get);
$sender_name=$row34['name'];

$sql1= "SELECT email,name FROM LoginDetails WHERE user_id = ".$uid;
$select = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($select);
$email= $row1['email'];
$name=$row1['name'];
 $to = $email;
$email_from = "ivyprofiles@ivystudentsprofile.com";

    $full_name = 'Ivystudentsprofile';
    $from_mail = $full_name.'<'.$email_from.'>';
     $from = $from_mail;

$subject = "New mesage in your inbox";
   $header = "Ivystudentsprofile: New Message";
   $message = "<html><body>Hi ".$name.", <br/><br/>".$sender_name." has sent you a new message in your inbox.<br><br><a href='http://www.ivystudentsprofile.com/accounts/messages.php?thread=".$id."' style='display: block;width: 120px;height: 20px;text-decoration:none;font-family: verdana;background: #d34932;padding: 5px;text-align: center;border-radius: 0px;color: white;'>View Message</a><br/><br>Thanks,<br>Ivystudentsprofile</body></html>";
    
$headers = "" .
               "Reply-To:" . $from . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: ' . $from . "\r\n";
$headers .= "Bcc: ivyprofiles@ivystudentsprofile.com\r\n";
  $sentmail =   mail($to,$subject,$message,$headers,'-fivyprofiles@ivystudentsprofile.com');


echo "success";
?>
