<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);

include "../database.php";
$email=$_POST['email'];
$password=$_POST['password'];
function verify($password, $hashedpassword) {
   return crypt($password, $hashedpassword) == $hashedpassword;
}

$sql = "SELECT email FROM LoginDetails WHERE email = '".$email."'";
$select = mysqli_query($conn, $sql);
if (mysqli_num_rows($select) == 0) {
    echo "The email id does not have an associated user account. Please check your email id or sign up with email if you are a new user.";
}
else
{
$sql = "SELECT password FROM LoginDetails WHERE email = '".$email."'";
$select = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($select);
    $hashedpassword = $row['password'];
$result = verify($password,$hashedpassword);
if($result==1){
//$sql = "SELECT * FROM LoginDetails WHERE  email='$email' AND password='$hashedpassword'";// AND com_code IS NULL";
//$select = mysqli_query($conn, $sql);
//$row = mysqli_fetch_assoc($select);
//$com_code=$row['com_code'];
//if($com_code===NULL)
//if (mysqli_num_rows($select) > 0){



$sql = "SELECT user_id FROM LoginDetails WHERE email = '".$email."'";
$select = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($select);
    $_SESSION["id"] = $row['user_id'];

echo "matched";
}
//else
//echo "Your account is not yet confirmed. You must confirm your account to proceed further.";
//echo "not-confirmed";
//}
else
echo "The password and email id do not match. Please try again.";

}
?>
