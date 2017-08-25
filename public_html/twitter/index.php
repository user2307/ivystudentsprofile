<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <title>Sign up with Twitter: Ivystudentsprofile</title>
        <meta name="description" content="Login to Ivstudentsprofile to submit your essays or view profiles of students admitted to Stanford, yale, columbia, harvard, duke, Upenn, princeton, brown, cornell and other universities in US, Europe, Asia and Australia."
        <meta name="author" content="Ivystudentsprofile">
<!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS
        ================================================== -->
        <!-- Bootstrap  -->
        <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <!-- web font  -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="../images/favicon.ico">
        <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../images/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../images/apple-touch-icon-144x144.pnpt">
  <link type="text/css" rel="stylesheet" href="../css/layout.css">
       <link type="text/css" id="colors" rel="stylesheet" href="../css/red.css">
        <link type="text/css" rel="stylesheet" href="../css/custom.css">
<!-- icon fonts -->
	<link type="text/css" rel="stylesheet" href="../font-icons/custom-icons/css/custom-icons.css">
	<link type="text/css" rel="stylesheet" href="../font-icons/custom-icons/css/custom-icons-ie7.css">
	<!-- Custom css -->
<style>
.popover.top{


z-index:9999999;
}

</style>
</head>
<body>
<?php
$id=$_GET['tid'];
$name=$_GET['name'];
$location=$_GET['location'];
$img_link==$_GET['img_link'];
if(!$id || !$name )
{

echo "<script>window.location.href='http://www.ivystudentsprofile.com'</script>";
}
/*	session_start();
	require_once('../src/TwitterOAuth.php');
	require_once('config.php');
include "../database.php";
	if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
	    header('Location: ./clearsessions.php');
	}
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$content = $connection->get('account/verify_credentials');
//$twitteruser = $content->{'screen_name'};
//	$notweets = 5;
//	$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
//	print "Name : ".$content->{'name'}; 
//	echo "<br/>";
	$name = $content->{'name'}; 
//	print "Screen name : ".$content->{'screen_name'};
//	$screen_name = $content->{'screen_name'};
//	echo "<br/>";
//	print "User id : ".$content->{'id'}; 
//	$img_link = $content->{'profile_image_url'};
	$id = $content->{'id'}; 
//	echo "<br/>";
//	print "Location : ".$content->{'location'}; 
	$location = $content->{'location'}; 
//	echo "<br/>";
//	$date = date("Ymd"); 
//	$con = mysqli_connect('', 'root', '', 'mysql');
//	echo "<b>Latest 5 tweets:</b> <br/>";
/*	foreach ($tweets as $item)
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
/*$sql = "SELECT t_id FROM LoginDetails WHERE t_id = ".$id;
$select = mysqli_query($conn, $sql);
if (mysqli_num_rows($select) > 0) {
    header("Location: http://www.ivystudentsprofile.com");
}
else {
*/
echo ' <header class="navbar-fixed-top">
                        <div id="mainHeader" role="banner">
                                <div class="container">
                                        <nav class="navbar navbar-default scrollMenu" role="navigation">
                                                <div class="navbar-header">
                                                        <a class="navbar-brand" href="../index.php" ><img src="../images/logo3.png"  alt="Ivystudentprofiles" /></a>
                                                </div>
</nav></div></div></header>
';
echo "<div class='container'><div class='row'><div class='col-md-4 col-md-offset-4'><div align='center'><h2 class='subTitle' style='font-weight:bold;'>Last Step for Signup</h2> <p style='display:inline'>Enter your email address</p>&nbsp;<a rel='popover' data-placement='top' data-trigger='hover' data-content='It seems you have not provided your email address to Twitter; we need to get your email address to continue.' style='cursor:pointer;text-decoration:none;font-size:1.5em'><i class='icon-help-circled'></i></a><br><br><input type='email' id='email'  name='email'  class='form-control' placeholder='Email address' /><span id='text' style='display:none;float:left;margin-top:5px;color:#e36a57;font-weight:bold'></span><br><br><a class='btn btn-primary btn-md' id='twit_mail'>Finish Signup</a></div></div></div>";
//	$insertQuery2 = "INSERT INTO LoginDetails (`first_name`,`t_id`,`location`) VALUES ('".$name."','".$id."','".$location."')";
//mysqli_query($conn,$insertQuery2);
//header("Location: http://www.ivystudentsprofile.com");
//}
//	if (!mysqli_query($con,$insertQuery2))
//	{
		//die('Error: ' . mysqli_error($con));
//	}
?>
<script type='text/javascript' src='../js-plugin/jquery/1.8.3/jquery.min.js'></script>
<script type='text/javascript' src='../bootstrap/js/bootstrap.js'></script>
  <script>
jQuery(document).ready(function() {
        jQuery('[rel=popover]').popover();
    });


$('#twit_mail').click(function() {
$('#text').hide();
 var emailVal = $('#email').val(); // assuming this is a input text field
 $.post('validate.php',{'email' : emailVal}, function(data) {
if(data)
//alert(data);
{

$('#text').text(data);
$('#text').show();


}
else
window.location.href='http://www.ivystudentsprofile.com/twitter/insert.php?name=<?php echo $name; ?>&tid=<?php echo $id; ?>&email='+emailVal+'&location=<?php echo $location;?>&img_link=<?php echo $img_link; ?>';
});
});






</script>
<?php include 'analyticstracking.php'; ?>
</body></html>
