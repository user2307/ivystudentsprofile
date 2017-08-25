
<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
$id=$_SESSION['id'];
?>
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
	<title>Sitemap: Ivystudentsprofile</title>
	<meta name="description" content="Sitemap of Ivystudentsprofile">
<?php include '../css/includecsshead.php'; ?>
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


</style>
</head>
<body class="activateAppearAnimation">
<!-- Primary Page Layout 
	================================================== -->
	<!-- globalWrapper -->
	<div id="globalWrapper">
<?php if($id)
include '../header.php';
else
include '../header_notloggedin.php';
?>
<section id="page">
			<header class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<h1>Site map</h1>
						</div>
						<div class="col-sm-6 hidden-xs">
							<ul id="navTrail">
								<li><a href="/user.php?id=<?php echo $id; ?>">Home</a></li>
								<li id="navTrailLast">Site map</li>
							</ul>
						</div>
					</div>
				</div>
			</header>



<section id="content" class="mt30 pb30">
				<div class="container">

					<div class="row">
<div class="col-md-4">
                                                        <h2>Home</h2>
                                                        <ul>
                                                                                <li><a href="http://www.ivystudentsprofile.com">Default</a></li>
                                                                                <li><a href="http://www.ivystudentsprofile.com/404.shtml">404 error</a></li>
<li><a href="/contact.php">Contact us</a></li>
                                                                                <li><a href="/sitemap/">Site map</a></li>
                                                                        </ul>
                                                </div>
<div class="col-md-4">
							<h2>About</h2>
							<ul>
										<li><a href="/about/policy.php">Policy</a></li>
										<li><a href="/about/tos.php">Terms of Service</a></li>
										<li><a href="/about/about-us.php">About us</a></li>
									</ul>
						</div>
<div class="col-md-4">
                                                        <h2>Topics</h2>
                                                        <ul>
                                                                                <li><a href="/about/get-featured.php">Get Featured</a></li>
                                                                                <li><a href="/ReviewEssay/reviewer.php">Become a Reviewer</a></li>
                                                                        </ul>
                                                </div>
</div>


<div class="row">

<div class="col-md-12">
<h2>People</h2>
</div>
<div class="row">
<?php
include "../database.php";
$sql = "SELECT * FROM LoginDetails WHERE active!=2";
 $select = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($select)){

    $name = $row['name'];
$usrid=$row['user_id'];
?>
<div class="col-md-4">
                                                        <ul>
                                                                                <li><a href="../user-profile.php?id=<?php echo $usrid; ?>"><?php echo $name; ?></a></li>
                                                                        </ul>
                                                </div>
<?php
}

?>
</div>
</div>

</div>
</section>	
											<?php include 'footer.php'; ?>	
							</div>
			<!-- global wrapper -->

<?php 
include '../js/commonjs.php';
include '../analyticstracking.php'; ?>
</body>
</html>

