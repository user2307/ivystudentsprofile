<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
$id=$_SESSION['id'];

include "../database.php";
$payment_email=$_POST['email'];
$sql = "UPDATE ReviewEssays set payment_email='$payment_email' where user_id=$id";
$conn->query($sql);
echo "<script>window.location.href='http://www.ivystudentsprofile.com/ReviewEssay/reviewer.php'</script>";

?>
