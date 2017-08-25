<?php
include "../database.php";
$email=$_POST['email'];
if ($email=='')

echo "Please enter your email address.";
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Invalid email address.";
}
else{
$sql = "SELECT email FROM LoginDetails WHERE email = '".$email."'";
$select = mysqli_query($conn, $sql);
if (mysqli_num_rows($select) > 0) {
    echo "The email address already exists. Please choose a different email address.";
}








}


?>
