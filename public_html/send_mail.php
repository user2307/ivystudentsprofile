<?php
$name=$_POST['name'];
$email=$_POST['email'];
$comments=$_POST['comment'];
$comments="<b>Name:</b> ".$name."<br><b>Email: </b>".$email."<br><br><b>Message: </b>".$comments;
$headers = "" .
               "Reply-To:" . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//$headers .= 'From: ' . $email . "\r\n";
mail("contact@ivystudentsprofile.com","User Query", $comments, $headers,'-fivyprofiles@ivystudentsprofile.com');
echo "Your mail has been sent successfully ! Thank you for your feedback";

?>
