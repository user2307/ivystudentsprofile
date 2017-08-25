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
$name=$_GET['name'];
$tid=$_GET['tid'];
$location=$_GET['location'];
$email=$_GET['email'];
$img_link$_GET['img_link'];
$id=getRealIpAddr();
 $insertQuery2 = "INSERT INTO LoginDetails (`ip`,`name`,`t_id`,`location`,`email`,`user_pic`) VALUES ('$ip','".$name."','".$tid."','".$location."','".$email."','".$img_link."')";
mysqli_query($conn,$insertQuery2);
$sql = "SELECT user_id  FROM LoginDetails WHERE t_id='$tid'";
$select = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($select);
$_SESSION['id']=$row['user_id'];
if($_SESSION['url']){
$url = $_SESSION['url'];
header("Location:$url");

}
else

header("Location: http://www.ivystudentsprofile.com/user.php?id=".$_SESSION['id']);

?>
