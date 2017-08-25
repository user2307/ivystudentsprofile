<?php  header( "Refresh:5;url=http://www.ivystudentsprofile.com/?value=login" ); ?>
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
	<title>Redirect: Ivystudentsprofile</title>
	<meta name="description" content="Subscribe and follow Ivystudentsprofile by connecting on social media"
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
<!-- Custom css -->
	<link type="text/css" rel="stylesheet" href="../css/layout.css">
   <link type="text/css" rel="stylesheet" href="../css/red.css">
<!-- icon fonts -->
	<link type="text/css" rel="stylesheet" href="../font-icons/custom-icons/css/custom-icons.css">
	<link type="text/css" rel="stylesheet" href="../font-icons/custom-icons/css/custom-icons-ie7.css">
 <link type="text/css" rel="stylesheet" href="../font-icons/custom-icons/css/animation.css">
<link rel="shortcut icon" href="../images/favicon.ico">
	<link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../images/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../images/apple-touch-icon-144x144.png">

</head>
<body>
<?php
include('../database.php');
 $passkey = $_GET['passkey'];
 $sql = $conn->prepare("UPDATE `LoginDetails` SET `com_code`=NULL WHERE `com_code`= (?) ");//'$passkey'");
$sql->bind_param("s", $passkey);
// $result = mysqli_query($mysqli,$sql) or die(mysqli_error());
$sql->execute();
//You can get the number of rows affected by your query
$nrows= $sql->affected_rows;
if ($nrows) {

// if($conn->query($sql)=== TRUE)
// {
// echo '<div>Your account is now active. You may now <a href="../login.php">Log in</a></div>';
 echo '<div class="container"><div class="row"><div class="col-md-12" align="center"><h3 style="font-weight:bold;color:#d34932">Thanks for verifying your email address. You will shortly be redirected to the login page.</h3><span class="icon-spinner iconBig animate-spin"></span></div></div></div>';
}
 else
 {
  echo "Some error occurred.";
//header("Location: ../user.php");
 }

?>
</body>
</html>
