<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
include "../database.php";
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
$fid=$_POST['f_id'];
$pic="http://graph.facebook.com/".$fid."/picture?type=large";
$sql = "SELECT f_id,user_id FROM LoginDetails WHERE f_id ='".$fid."'";
$select = mysqli_query($conn, $sql);
if (!(mysqli_num_rows($select) > 0)) {
$sql1 = "SELECT email FROM LoginDetails WHERE email = '".$email."'";
$select1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($select1) > 0) {
$api="SELECT user_pic FROM LoginDetails WHERE email = '".$email."'";
 $query = mysqli_query($conn, $api);
while($row1 = mysqli_fetch_assoc($query)){
$user_pic=$row1['user_pic'];
}
if(!$user_pic)
$sql = "UPDATE LoginDetails SET f_id='$fid', user_pic='$pic' WHERE email='".$email."'";
else
$sql = "UPDATE LoginDetails SET f_id='$fid' WHERE email='".$email."'";
}
else
{
$ip=getRealIpAddr();
$sql = "INSERT INTO LoginDetails(`ip`,`name`,`email`,`f_id`,`user_pic`) VALUES ('$ip','$name', '$email','$fid','$pic')";

}
if ( mysqli_query($conn,$sql) === TRUE) {
$sql= "SELECT user_id FROM LoginDetails WHERE email = '".$email."'";    
$select = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($select);
     $_SESSION['id']= $row['user_id'];
echo $_SESSION['id'];
}
   
}
else{
$row = mysqli_fetch_assoc($select);
  $_SESSION['id']= $row['user_id'];
//header("Location:http://www.ivystudentsprofile.com/user.php");
echo  $_SESSION['id'];
}


?>
