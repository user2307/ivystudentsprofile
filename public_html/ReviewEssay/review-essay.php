<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$id=$_SESSION['id'];
if(!$id)
header("Location:http://www.ivystudentsprofile.com");
include "../database.php";
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
	<title>Submit Essays for Review - Ivystudentsprofile</title>
	<meta name="description" content="Submit your college application essays for proofread, grammar checks, spelling errors and to build a more compelling and relevant essay to get admission from college of your choice.">
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
.btn-blue{
background-color:#428bca;
border-color:#357ebd;
color:white;
}
.btn-blue:hover,.btn-blue:active{
background-color:#3276b1;
border-color:#285e8e;
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
<section id="services">
				<div class="container pt40 pb40">

					<div class="row">
						<div class="span12 text-center mb40">
							<h2 class="subTitle">Following reviewer(s) accepted your request to review your college application essays.</h2><p>Click on the respective reviewer to start your essay submission process.</p>
						</div>
					</div>


					<div class="row">
<?php
$sql="SELECT * from EssaysForReview where submitter_id=$id and completed=0";//find array of users/reviewers to whom i've sent request
$query=mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){
while($ele= mysqli_fetch_assoc($query)){
$reviewerid = $ele['reviewer_id'];
$eid=$ele['e_id'];
$stm="SELECT * from LoginDetails where user_id=$reviewerid";
$exec=mysqli_query($conn,$stm);
$abc=mysqli_fetch_assoc($exec);
$user_pic=$abc['user_pic'];
if(!$user_pic)
$user_pic="../images/avtar.png";
$name=$abc['name'];
$sql1="SELECT * FROM UserProfile where user_id=$reviewerid";
$select1=mysqli_query($conn, $sql1);
$univ_name="";
$list_degree_type="";
$major="";
$row2 = mysqli_fetch_assoc($select1);
$univ_name=$row2['univ_name'];
$list_degree_type=$row2['list_degree_type'];
$major=$row2['major'];

?>
						<div class="col-md-4 col-sm-12">
							<article class="boxIcon">
								<a href="process.php?eid=<?php echo $eid;?>">
									<div class="imgBorder">
										<img class="img-circle img-responsive" src="<?php echo $user_pic; ?>" alt="" />
									</div>
									<h2><?php echo $name; ?></h2>
									<p><?php if($list_degree_type && $major && $univ_name)
echo $list_degree_type.' in '.$major.' from '.$univ_name;
elseif($univ_name && !$list_degree_type && !$major)
echo $univ_name;
elseif($list_degree_type && $major && !$univ_name)
echo $list_degree_type.' in '.$major;
elseif($list_degree_type && !$major && !$univ_name)
echo $list_degree_type;
else
echo 'Details not available'; ?></p>
								</a>
</div>							</article>
<?php
}}
else{
?>

 <div class="col-md-12" align="center">
<p style="font-size:80px;padding-bottom:10px;" >0</p>
<p style="padding-bottom:20px;">You do not have any open requests</p>
</div>
 <div class="col-md-12" align="center">
<div class="col-md-4">
<a href="view-reviewers.php" class="btn btn-md btn-blue">View List of Reviewers</a>
</div>
<div class="col-md-4" align="center">
<h3>OR</h3>
</div>
<div class="col-md-4" align="center">
<a href="reviewer.php" class="btn btn-md btn-blue" >Become a Reviewer</a>
</div>
</div>

<?php
}
?>	             


					</div>
				</div>
			</section>
</section>	
											<?php include '../footer.php'; ?>	
							</div>
			<!-- global wrapper -->
<?php
include '../js/commonjs.php'; 
include '../analyticstracking.php'; ?>
</body>
</html>

