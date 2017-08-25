<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
//$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$id=$_SESSION['id'];
if(!$id)
header("Location:http://www.ivystudentsprofile.com");
include "../database.php";
$reviewer=$_SESSION['reviewer'];
if(!$reviewer)
header("Location:http://www.ivystudentsprofile.com/ReviewEssay/review-essay.php");
$sql = "SELECT * FROM ReviewEssays where user_id=$reviewer";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$days=$row['days'];

$sql = "SELECT * FROM LoginDetails WHERE user_id =$reviewer";
$query = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($query);
$rname= $row1['name'];
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Essay Submitted for Review - Ivystudentsprofile</title>
	<meta name="description" content="Correct your spelling, grammar, and mechanical errors by reaching out to reviewers on Ivystudentsprofile and get great suggestions about your essay's structure and content.">
	<meta name="author" content="Ivystudentsprofile">
<?php include "../css/includecsshead.php"; ?>
<style>
.form-control:focus{
border:1px solid #d34932;
}
.pinInfo li a{
color:#d34932;
}
@media only screen and (min-width: 751px) {
div.input-group.input-group-sm{
padding:30px 11px;
}

}
@media only screen and (max-width: 750px) {
div.input-group.input-group-sm{
padding:0  !important;
}

}
.paralaxText .iconRounded,.paralaxText .iconRounded:hover
{border-color:#4CAF50;
}
@media (min-width: 768px){
.paralaxText h2{
font-size:20px;
}}
</style>
</head>
<body class="activateAppearAnimation">
	<div id="globalWrapper">
<?php if($id)
include '../header.php';
?>
<section id="page">
<div class="container">
				<div class="row">
					<div class="col-md-12">
<section id="paralaxSlice2" data-stellar-background-ratio="0.5">
				<div class="maskParent">
					<div class="paralaxMask" style="background:white;"></div>
					<div class="paralaxText">

						<h2 style="background:whitesmoke;color:black;">
							<i class="icon-ok-circled iconMedium iconRounded" style="color:#4CAF50;"></i><br />

							Your essay has been successfully submitted to <a href="../user-profile.php?id=<?php echo $reviewer;?>"><?php echo $rname; ?></a> for review. Please wait for <?php if($days==1) echo "a day"; else echo $days." days";?> before the reviewer responds with reviewed content.
						</h2>

					</div>
				</div>
			</section>
</div></div></div>
</section>	
<?php include '../footer.php'; ?>	
							</div>
<?php
include '../js/commonjs.php'; 
include '../analyticstracking.php'; ?>
</body>
</html>

