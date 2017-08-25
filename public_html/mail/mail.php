<?php
include "../database.php";
$sql = "SELECT email FROM LoginDetails WHERE user_id=81";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)){

$email= $row['email'];

 $to = $email;
$email_from = "ivyprofiles@ivystudentsprofile.com";

    $full_name = 'Ivystudentsprofile';
    $from_mail = $full_name.'<'.$email_from.'>';
     $from = $from_mail;

$subject = "Get Your Essays Reviewed By Top University Graduates";
$message=file_get_contents('content2.html');
    $headers = "" .
               "Reply-To:" . $from . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: ' . $from . "\r\n";
if(mail($to, $subject, $message, $headers,'-fivyprofiles@ivystudentsprofile.com')) {
		$file = fopen("mailsentlist.txt","a+"); // add email id to mailsentlist.txt to track the email sent
		fwrite($file, $to.",\r\n");
		fclose($file);
	}
	else
	{
		$file = fopen("notmailsentlist.txt","a+"); // add email to notmailsentlist.txt here which have sending email error
		fwrite($file, $to.",\r\n");
		fclose($file);
	}
 




}






?>
