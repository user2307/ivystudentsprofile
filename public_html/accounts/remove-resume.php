<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);


include "../database.php";
$id=$_SESSION['id'];
$file=$_POST['file'];
system("rm -r ../uploads/".$id."/resume/");
$sql = "UPDATE UserDetails set resume_path='' WHERE user_id=".$id;
$conn->query($sql);

echo "Resume is deleted.";
?>
