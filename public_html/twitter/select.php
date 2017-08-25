<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
        
require_once('../src/TwitterOAuth.php');
        require_once('config.php');
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
        if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
            header('Location: ./clearsessions.php');
        }
        $access_token = $_SESSION['access_token'];
        $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
        $content = $connection->get('account/verify_credentials', array('include_email'=>'true'));
//$twitteruser = $content->{'screen_name'};
//      $notweets = 5;
//      $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
//      print "Name : ".$content->{'name'};
//      echo "<br/>";
        $name = $content->{'name'};
//      print "Screen name : ".$content->{'screen_name'};
//      $screen_name = $content->{'screen_name'};
//      echo "<br/>";
//      print "User id : ".$content->{'id'};
      $img_link = $content->{'profile_image_url'};
$img_link=str_replace('_normal', '', $img_link);
        $id = $content->{'id'};
//      echo "<br/>";
//      print "Location : ".$content->{'location'};
        $location = $content->{'location'};
$email = $content->{'email'};
//      echo "<br/>";
//      $date = date("Ymd");
//      $con = mysqli_connect('', 'root', '', 'mysql');
//      echo "<b>Latest 5 tweets:</b> <br/>";
/*      foreach ($tweets as $item)
        {
                echo $item->text;
                $tweet = $item->text;
                $insertQuery1 = "INSERT INTO user_tweets (`id`,`name`,`tweet`,`date`) VALUES ('".$id."','".$name."','".$tweet."','".$date."')";
                if (!mysqli_query($con,$insertQuery1))
                {
                        //die('Error: ' . mysqli_error($con));
                }
        }

        if (mysqli_connect_errno())
        {
                //echo "Failed to connect to MySQL: " . mysqli_connect_error();
                return;
        }*/
$sql = "SELECT t_id,user_id,user_pic FROM LoginDetails WHERE t_id = ".$id;
$select = mysqli_query($conn, $sql);
if (mysqli_num_rows($select) > 0) {
$row = mysqli_fetch_assoc($select);
$user_pic=$row['user_pic'];
$_SESSION['id']=$row['user_id'];
if(!$user_pic)
$sql="UPDATE LoginDetails SET user_pic='$img_link' WHERE t_id = ".$id;
$conn->query($sql);
if($_SESSION['url']){
$url = $_SESSION['url']; 
header("Location:$url");

}
else
    header("Location: http://www.ivystudentsprofile.com/user.php?id=".$_SESSION['id']);
}
else
//header("Location: http://www.ivystudentsprofile.com/twitter/index.php?name=".$name."&tid=".$id."&location=".$location);
{
$sql = "SELECT email,user_id,user_pic FROM LoginDetails WHERE email = '".$email."'";
$select = mysqli_query($conn, $sql);
if (mysqli_num_rows($select) > 0) {
$row = mysqli_fetch_assoc($select);
$user_pic=$row['user_pic'];
$_SESSION['id']=$row['user_id'];
if(!$user_pic)
$sql="UPDATE LoginDetails SET t_id=$id,user_pic='$img_link' WHERE email='$email'";
else
$sql = "UPDATE LoginDetails SET t_id=$id WHERE email='$email'";
$conn->query($sql);
if($_SESSION['url']){
$url = $_SESSION['url'];
header("Location:$url");

}
else

header("Location: http://www.ivystudentsprofile.com/user.php?id=".$_SESSION['id']);
}
else{

if(!$email)
header("Location: http://www.ivystudentsprofile.com/twitter/index.php?name=".$name."&tid=".$id."&location=".$location."&img_link=".$img_link);
else{
$ip=getRealIpAddr();
 $insertQuery2 = "INSERT INTO LoginDetails (`ip`,`name`,`t_id`,`location`, `email`, `user_pic`) VALUES ('$ip','".$name."','".$id."','".$location."','".$email."','".$img_link."')";
//mysqli_query($conn,$insertQuery2);

     if (!mysqli_query($conn,$insertQuery2))
      {
               die('Error: ' . mysqli_error($conn));
      }
$sql = "SELECT user_id  FROM LoginDetails WHERE t_id=$id";
$select = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($select);
$_SESSION['id']=$row['user_id'];
if($_SESSION['url']){
$url = $_SESSION['url'];
header("Location:$url");

}
else

header("Location: http://www.ivystudentsprofile.com/user.php?id=".$_SESSION['id']);
}}

}
?>
