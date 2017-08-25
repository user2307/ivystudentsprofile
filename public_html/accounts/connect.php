<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);


include "../database.php";
$id=$_SESSION['id'];
if ($_POST['facebook'])
$facebook=$_POST['facebook'];
else
$facebook="";
if ($_POST['linkedin'])
$linkedin=$_POST['linkedin'];
else
$linkedin="";
if ($_POST['em'])
$em=$_POST['em'];
else
$em="";
if ($_POST['ph'])
$ph=$_POST['ph'];
else
$ph="";
$sql = "SELECT * FROM UserDetails WHERE user_id = ".$id;
$select = mysqli_query($conn, $sql);

if (!(mysqli_num_rows($select) > 0)) {

$sql = "INSERT INTO UserDetails (user_id,facebook_url,linkedin_url,alternate_email,mobile) VALUES ($id,'$facebook','$linkedin','$em','$ph'  )";
$conn->query($sql);
}
else
{
$sql = "UPDATE UserDetails set facebook_url='$facebook', linkedin_url='$linkedin', alternate_email='$em', mobile='$ph'  WHERE user_id=".$id;
$conn->query($sql);
}
echo "<script>window.location.href='http://www.ivystudentsprofile.com/user-profile.php?id=$id';</script>";
?>
