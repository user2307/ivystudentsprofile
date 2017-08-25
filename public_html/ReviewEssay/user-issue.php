<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
$id=$_SESSION['id'];

include "../database.php";
$issue=$_POST['issue'];
$e_id=$_POST['e_id'];
$reviewer=$_POST['reviewer'];
$sql = "INSERT INTO UserQuery (submitter,reviewer,e_id,issue) VALUES ($id,$reviewer,$e_id,'$issue' )";
$conn->query($sql);
$message="Submitted By: $id<br>Reviewer: $reviewer<br>e_id: $e_id<br><br>$issue";
$headers = "" .
      //         "Reply-To:" . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Ivystudentsprofile<ivyprofiles@ivystudentsprofile.com>'. "\r\n";
mail("contact@ivystudentsprofile.com","User Query Regarding Essay Review", $message, $headers,'-fivyprofiles@ivystudentsprofile.com');



?>
