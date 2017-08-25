<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if(isset($_GET['id']))
$uid=$_GET['id'];
//$_SESSION['id']=$_GET['id'];
$id=$_SESSION['id'];
//if (!($_SESSION['id'])) {
      // redirect to your login page
//header("Location:http://www.ivystudentsprofile.com/?value=login");
//}
include "database.php";

$check= "SELECT * FROM LoginDetails WHERE user_id=". $_GET['id'];
$see= mysqli_query($conn, $check);
if (!(mysqli_num_rows($see) > 0) && $id) {
echo "<script>window.location.href='user-profile.php?id=$id';</script>";
}
elseif(!(mysqli_num_rows($see) > 0) && !$id) {
echo "<script>window.location.href='http://www.ivystudentsprofile.com';</script>";
}
while($row7= mysqli_fetch_assoc($see)){

 $usrname = $row7['name'];
$user_img=$row7['user_pic'];


}

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
	<title><?php echo $usrname." | Ivystudentsprofile"; ?></title>
	<meta name="description" content="Submit your essays and application material on Ivystudentsprofile and help prospective students gain an insight into your profile. Prospective students can view profiles of students admitted to universities in US, Canada, Europe, Asia and Australia, efficiently sort out their list of universities and enhance their chances of admittance to university of their choice.">
<meta name="keywords" content="ivy student profile, statement of purpose, college essays, resume, scholarship essays, college application essays">
	<meta name="author" content="Ivystudentsprofile">
<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS
	================================================== -->
	<!-- Bootstrap  -->
	<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- web font  -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400' rel='stylesheet' type='text/css'>
	<!-- plugin css  -->
	<link rel="stylesheet" type="text/css" href="js-plugin/animation-framework/animate.css" />
	<!-- Pop up-->
	<link rel="stylesheet" type="text/css" href="js-plugin/magnific-popup/magnific-popup.css" />
	<!-- Owl carousel-->
	<link rel="stylesheet" href="js-plugin/owl.carousel/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="js-plugin/owl.carousel/owl-carousel/owl.theme.css">
	<!-- camera slider -->
	<link type="text/css" rel="stylesheet" href="js-plugin/camera/css/camera.css">
	<!-- nekoAnim-->
	<link rel="stylesheet" type="text/css" href="js-plugin/appear/nekoAnim.css" />
	<!-- icon fonts -->
	<link type="text/css" rel="stylesheet" href="font-icons/custom-icons/css/custom-icons.css">
	<link type="text/css" rel="stylesheet" href="font-icons/custom-icons/css/custom-icons-ie7.css">
<!-- isotope -->
	<link type="text/css" rel="stylesheet" href="js-plugin/isotope/css/style.css">
	<!-- Custom css -->
	<link type="text/css" rel="stylesheet" href="css/layout.css">
	<link type="text/css" id="colors" rel="stylesheet" href="css/red.css">
	<link type="text/css" rel="stylesheet" href="css/custom.css">

	<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
	<script src="js/modernizr-2.6.1.min.js"></script>
  <script type="text/javascript" src="js-plugin/jquery/1.8.3/jquery.min.js"></script>
 <script type="text/javascript" src="js-plugin/jquery-ui/jquery-ui-1.8.23.custom.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="images/apple-touch-icon-144x144.png">
<style>
.pinBox .boxContent{
margin-top:0px;
}
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

.media {
  position: relative;
  vertical-align: top;
}

.media__image { display: block;
 }

.media__body {
  background: rgba(4, 4, 4, 0.65);
  bottom: 0;
  color: white;
  font-size: 1em;
  left: 0;
  opacity: 0;
  overflow: hidden;
  padding: 3.75em 3em;
  position: absolute;
  text-align: center;
  top: 0;
  right: 0;
  -webkit-transition: 0.6s;
  transition: 0.6s;
}

.media__body:hover { opacity: 1;
 }

.media__body:after,
.media__body:before {
  border: 1px solid rgba(255, 255, 255, 0.7);
  bottom: 1em;
  content: '';
  left: 1em;
  opacity: 0;
  position: absolute;
  right: 1em;
  top: 1em;
  -webkit-transform: scale(1.5);
  -ms-transform: scale(1.5);
  transform: scale(1.5);
  -webkit-transition: 0.6s 0.2s;
  transition: 0.6s 0.2s;
}

.media__body:before {
  border-bottom: none;
  border-top: none;
  left: 2em;
  right: 2em;
}

.media__body:after {
  border-left: none;
  border-right: none;
  bottom: 2em;
  top: 2em;
}

.media__body:hover:after,
.media__body:hover:before {
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
  opacity: 1;
}

.media__body h2 { margin-top: 0; }

.media__body p { margin-bottom: 1.5em; }
.form-control{
//height:32px;
//font-size:12px;
}
label{
//margin-bottom:0px;
font-size:15px;}
.btn-file {
    position: relative;
    overflow: hidden;
padding:11px;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
.btn-default:hover{

background:linear-gradient(to bottom,#fff 0,#e0e0e0 100%);
border:1px solid lightgray;
color:black;
}
.btn-info:hover{
background-color:#39b3d7;
border-color:#269abc;
}
.img-circle{
height:40px;
width: 40px;
}

.btn-primary[disabled]
{

background-color:#e36a57;
border-color:#e36a57;
}
.alert-default{


//color:#170CA5;
//background-color:#E6E6F1;
padding:11px 12px 9px;
border-radius:4px;
margin-bottom:10px;
border:solid 1px lightgray; 


}
.alert-dismissable .close{

top:-10px;
right:0px;
}





</style>
 
</head>
<body>
<?php
//include "database.php";
$sql = "SELECT * FROM LoginDetails WHERE user_id=". $_SESSION['id'];
 $select = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($select)){

    $name = $row['name'];
$com_code=$row['com_code'];
$email=$row['email'];
$user_pic=$row['user_pic'];
}
/*$check= "SELECT * FROM LoginDetails WHERE user_id=". $_GET['id'];
$see= mysqli_query($conn, $check);
if (!(mysqli_num_rows($see) > 0)) {
echo "<script>window.location.href='user-profile.php?id=$id';</script>";
}
while($row7= mysqli_fetch_assoc($see)){

 $usrname = $row7['name'];
$user_img=$row7['user_pic'];


}*/
$general="SELECT * FROM UserProfile WHERE user_id=".$_GET['id'];
 $query = mysqli_query($conn, $general);
while($row1 = mysqli_fetch_assoc($query)){
$university= $row1['univ_name'];
$degree_type=$row1['degree_type'];
$list_degree_type=$row1['list_degree_type'];
$major=$row1['major'];
$sat=$row1['sat'];
$gre=$row1['gre'];
$gre_analytical=$row1['gre_analytical'];
$appear_gre_subject=$row1['appear_gre_subject'];
$gre_subject=$row1['gre_subject'];
$gre_subject_score=$row1['gre_subject_score'];
$toefl=$row1['toefl'];
$ielts=$row1['ielts'];
$other_test_name=$row1['other_test_name'];
$other_test_score=$row1['other_test_score'];
}
if($other_test_name)
{$j=0;
$tagsold=explode("@@#",$other_test_name);
for ($i=0;$i< count($tagsold);$i++)
{
    if(""!=$tagsold[$i])
$tags[$j++]=$tagsold[$i];
}
}
else
$tags=[];
$len=count($tags);
$jj=0;
if($other_test_score)
{
$tagsnext=explode("@@#",$other_test_score);
for ($i=0;$i< count($tagsnext);$i++)
{
    if(""!=$tagsnext[$i])
$tags1[$jj++]=$tagsnext[$i];
}

}
else
$tags1=[];

$details="SELECT * FROM UserDetails WHERE user_id=".$_GET['id'];
 $find = mysqli_query($conn, $details);
while($row2 = mysqli_fetch_assoc($find)){
$admit_univ=$row2['admit_univ'];
$course_type=$row2['course_type'];
$term=$row2['term'];
$sop_essay=$row2['sop_essay'];
$lor_path=$row2['lor_path'];
$resume_path=$row2['resume_path'];
$scholarship_received=$row2['scholarship_received'];
$scholarship_name=$row2['scholarship_name'];
$scholarship_amount=$row2['scholarship_amount'];
$scholarship_path=$row2['scholarship_path'];
$facebook_url=$row2['facebook_url'];
$linkedin_url=$row2['linkedin_url'];
$alternate_email=$row2['alternate_email'];
$mobile=$row2['mobile'];
}
if($admit_univ)
$deckk=explode("@@#",$admit_univ);
else
$deckk=[];
if($course_type)
$deck11=explode("@@#",$course_type);
else
$deck11=[];
if($term)
$deck22=explode("@@#",$term);
else
$deck22=[];
$one=count($deckk);
$two=count($deck11);
$three=count($deck22);
if($sop_essay){
$deck33=explode("@@#",$sop_essay);
}
else
$deck33=[];
$four=count($deck33);
$mx=max($one,$two,$three,$four);
if($mx>0)
{
$l=0;
$m=0;
$n=0;
$p=0;
for($i=0;$i<$mx;$i++)
{

if($deckk[$i]!="" ||  $deck11[$i]!="" || $deck22[$i]!="" || $deck33[$i]!="")
{
$deck[$l++]=$deckk[$i];
$deck1[$m++]=$deck11[$i];
$deck2[$n++]=$deck22[$i];
$deck3[$p++]=$deck33[$i];
}
}
}
if(!$deck)
{
$deck=[];
$deck1=[];
$deck2=[];
$deck3=[];
}
$len1=count($deck);
if($lor_path){
$path_lor=explode("@@#",$lor_path);
}else
$path_lor=[];
$len_lor=count($path_lor);


if($scholarship_received=="1"){
$sch_name=explode("@@#",$scholarship_name);
$sch_amount=explode("@@#",$scholarship_amount);
$sch_path=explode("@@#",$scholarship_path);
$c1=count($sch_name);
$c2=count($sch_amount);
$c3=count($sch_path);
$final_c=max($c1,$c2,$c3);
if($final_c>0)
{$e=0;$f=0;$g=0;
for($i=0;$i<$final_c;$i++)
{
if($sch_name[$i] || $sch_amount[$i] || $sch_path[$i]){ 
$sch_nm[$e++]=$sch_name[$i];
$sch_amt[$f++]=$sch_amount[$i];
$sch_pth[$g++]=$sch_path[$i];
}}
}
}
if(!$sch_nm){
$sch_nm=[];
$sch_amt=[];
$sch_pth=[];
}$len_scholarship=count($sch_nm);




$sql = "SELECT * FROM RequestsRecords WHERE reviewer_id=". $_SESSION['id']." and sender_id=$uid and accepted=0";
 $select = mysqli_query($conn, $sql);
if(mysqli_num_rows($select)>0)
{
$request=1;
}

?>

<!-- Primary Page Layout 
	================================================== -->
	<!-- globalWrapper -->
	<div id="globalWrapper">
<!--correct<form class="nav navbar-nav" role="form" style="float:none;">
                                                                   <div class="input-group input-group-sm" >
                                                                            <input type="text" class="form-control" placeholder="Search...">
                                                                                <span class="input-group-btn">
                                                                                        <button type="submit" class="btn btn-sm"><i class="icon-search"></i></button>
                                                                                </span>
                                                                </div>
                                                          </form>

-->
<?php if($id)
include 'header.php';
else
include 'header_notloggedin.php';
?>

<input type="hidden" id="com_code" value="<?php echo $com_code; ?>" >
<input type="hidden" id="resend" value="<?php echo $email; ?>" >
<input type="hidden" id="clickme" value="<?php echo $len; ?>" >
<input type="hidden" id="clickme1" value="<?php echo $len1; ?>" >
<input type="hidden" id="clickme2"  value="<?php echo $len_lor; ?>" >
<input type="hidden" id="clickme3" value="<?php echo $len_scholarship; ?>" >
<input type="hidden" id="uid" value="<?php echo $uid; ?>" >
<input type="hidden" id="usrname"  value="<?php echo $usrname; ?>" >
<input type="hidden" id="request"  value="<?php echo $request; ?>" >
<section id="page">
<section id="content" class="mt30 pb30">
				<div class="container">

<!--<div class="row">

<div class="col-md-10" style="text-align:center" >
<div class="alert-default alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<?php
echo "<b>".$usrname."</b> sent you an essay review request.";
?>
<a style="margin-left:20px;" id="accept"  class="btn btn-sm btn-warning">Accept Request</a>
</div>



</div>


</div>
-->					<div class="row">
						<!-- sidebar -->
						<aside id="sidebar" class="col-md-3">
<div class="media" id="poi" style="cursor:pointer;width:250px;max-height:250px;">
<img  src="<?php   if($user_img) echo $user_img; else echo "/images/avtar.png"?>" id="image"  alt="User Image" style="min-width:200px;min-height:150px" class="media__image img-responsive imgBorder mb15" />

  <div class="media__body">
<h3 style="font-weight:bold;font-size:24px;"><span class="icon-camera" style="color:white;font-size:140%"></span></h3>

  </div>

</div>

<input  class="file-upload" style="display:none;" type="file" accept="image/*"/>
  
<h3 style="font-weight:bold;"><?php echo $usrname;  ?></h5>

							<nav id="subnav">
								<ul>
									<li><a  data-toggle="tab"  href="#general">General Details<i class=" icon-right-open-mini"></i></a></li>
									<li><a data-toggle="tab" href="#sop" >Statement of Purpose<i class=" icon-right-open-mini"></i></a></li>
									<li><a href="#lor" data-toggle="tab">Letters of Recommendation<i class=" icon-right-open-mini"></i></a></li>
									<li><a href="#admit" data-toggle="tab">Scholarship Details<i class=" icon-right-open-mini"></i></a></li>
									<li><a href="#resume" data-toggle="tab">Resume<i class=" icon-right-open-mini"></i></a></li>
<!--  <li><a href="#ayq" data-toggle="tab">Ask your question<i class=" icon-right-open-mini"></i></a></li>
--> <li><a href="#cwm" data-toggle="tab">Connect with me<i class=" icon-right-open-mini"></i></a></li>
								</ul>
							</nav>
						</aside>


<section class="col-md-7" id="check">
<?php if($uid!=$id && $id)
echo '
<a class="btn btn-sm btn-primary" style="float:right;"  data-toggle="modal" data-target="#myModal1" id="message">Message</a>';
?>
<!--message modal-->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Compose Message</h4>
      </div>
      <div class="modal-body">
<h5><b>To: </b>&nbsp;<img src="<?php   if($user_img) echo $user_img; else echo "/images/avtar.png"?>" class="img-circle">&nbsp;&nbsp;<?php echo  $usrname; ?></h5>
<div class="form-group">
<textarea  style="resize:none;"  class="form-control" id="getmessage"  cols="3" rows="5" autofocus ></textarea>
                                                                </div>



      </div>
      <div class="modal-footer">
        <button class="btn btn-primary"  data-dismiss="modal"  id="send_message"  disabled>Send</button>
  </div>
    </div>

  </div>
</div>

<!--end message modal-->



<div class="tab-content">

								<div class="tab-pane fade in active" id="general">
<?php if($id==$uid) echo '
<a class="btn btn-sm btn-primary" style="float:right;" id="detail1">Edit Details</a>';
?>
<h2>General Details</h2>
<!-- contact -->
			<section class="mt40">

				<div class="container">

					<div class="row">

						<div class="col-md-12 boxFocus pt30 mb30" id="box1" style="display:none;">
							
							<div class="row">



								<div class="col-md-12" > 
		<form method="post" action="accounts/general.php" id="contactfrm" role="form" class="mb15 pb40" style="margin-bottom:0px;">

										<div class="form-group">
											<label for="name">University/College Name</label>
											<input type="text" class="form-control" value="<?php if($university) echo $university ?>" name="name" id="name" placeholder= "Enter your university/college name" />
										</div>
										<div class="form-group">
<label >Degree Type</label>
<br><label class="radio-inline"><input type="radio" name="optradio" value="1" <?php if ($degree_type=="1") echo "checked"; ?> >Associate</label>
<label class="radio-inline"><input type="radio" name="optradio" value="2" <?php if ($degree_type=="2") echo "checked"; ?> >Bachelor</label>
<label class="radio-inline"><input type="radio" name="optradio" value="3" <?php if ($degree_type=="3") echo "checked"; ?> >Master</label>
<label class="radio-inline"><input type="radio" name="optradio" value="4" <?php if ($degree_type=="4") echo "checked"; ?> >Doctoral</label>
<label class="radio-inline"><input type="radio" name="optradio" value="5" <?php if ($degree_type=="5") echo "checked"; ?> >Professional</label>
<label class="radio-inline"><input type="radio" name="optradio" value="6" <?php if ($degree_type=="6") echo "checked"; ?> >Other</label>
										</div>
 <div class="form-group">
                                                                                        <label for="degtype">List Your Degree Type</label>
<input type="text" class="form-control" value="<?php if($list_degree_type) echo $list_degree_type; else echo ""; ?>"  name="degtype" id="degtype" placeholder="e.g. BS, MS"  title="Please list your degree type"/>
                                                                                </div>


 <div class="form-group">
                                                                                        <label for="subject">Area of Specialization (Major)</label>
<input type="text" class="form-control" name="subject" value="<?php  if ($major) echo $major; ?>"id="subject" placeholder="e.g. Computer Science, Maths" title="Please list your area of apecialization"/>
                                                                                </div>


<div class="form-group">
                                                                                        <label>Test Scores</label>
<ul class="nav nav-tabs"> <li class="active"><a href="#sat" data-toggle="tab">SAT</a></li> <li><a href="#gre" data-toggle="tab">GRE</a></li> <li><a href="#toefl" data-toggle="tab">TOEFL</a></li> <li><a href="#ielts" data-toggle="tab">IELTS</a></li>  <li><a href="#other" data-toggle="tab">Other</a></li></ul>
                                                                              <div class="tab-content"> <div class="tab-pane fade active in" id="sat">


<input type="text" class="form-control"  name="sats" id="sats" placeholder="SAT score" value="<?php  if($sat) echo $sat;?>"  />


</div> <div class="tab-pane" id="gre">
<label >GRE Score</label><input type="text" name="gres" id="gres" class="form-control" value="<?php if($gre) echo $gre;  ?>"style="width:20%;display:inline;margin-left:10px"    />
<br><br><label>Analytical</label>
<select name="ana" >
  <option value="100" <?php if($gre_analytical=="100") echo "selected"; ?>  >---Please Select---</option>
  <option value="6" <?php if($gre_analytical=="6") echo "selected"; ?> >6</option>
  <option value="5.5" <?php if($gre_analytical=="5.5") echo "selected"; ?> >5.5</option>
  <option value="5" <?php if($gre_analytical=="5") echo "selected"; ?> >5</option>
 <option value="4.5" <?php if($gre_analytical=="4.5") echo "selected"; ?> >4.5</option>
 <option value="4" <?php if($gre_analytical=="4") echo "selected"; ?> >4</option>
 <option value="3.5" <?php if($gre_analytical=="3.5") echo "selected"; ?> >3.5</option>
 <option value="3" <?php if($gre_analytical=="3") echo "selected"; ?> >3</option>
 <option value="2.5" <?php if($gre_analytical=="2.5") echo "selected"; ?> >2.5</option>
 <option value="2" <?php if($gre_analytical=="2") echo "selected"; ?> >2</option>
 <option value="1.5" <?php if($gre_analytical=="1.5") echo "selected"; ?> >1.5</option>
 <option value="1" <?php if($gre_analytical=="1") echo "selected"; ?> >1</option>
 <option value="0.5" <?php if($gre_analytical=="0.5") echo "selected"; ?> >0.5</option>
 <option value="0" <?php if($gre_analytical=="0") echo 'selected'; ?> >0</option>

</select>

<br><br><label >Did you appear in GRE subject test?</label>
<label class="radio-inline"><input type="radio" id="radio1"  name="optradio1" value="1" onclick="show();" <?php if($appear_gre_subject=="1") echo "checked"; ?> >Yes</label>
<label class="radio-inline"><input type="radio" name="optradio1" value="2" onclick="hide();"  <?php if($appear_gre_subject=="2") echo "checked";?>  >No</label><br>
<div id="toggle" style="display:none;">
<br><label>Score:</label><input type="text" class="form-control" name="subscr" id="subscr" value="<?php if($gre_subject_score) echo $gre_subject_score;   ?>" style="width:20%;display:inline;margin-left:10px"   />
<br><br><label>Subject  </label>
<select name="gresub">
  <option value="1" <?php if($gre_subject=="1") echo "selected"; ?> >---Please Select---</option>
  <option value="2"  <?php if($gre_subject=="2") echo "selected"; ?> >Biochemistry, Cell and Molecular Biology</option>
  <option value="3"  <?php if($gre_subject=="3") echo "selected"; ?> >Biology</option>
  <option value="4"  <?php if($gre_subject=="4") echo "selected"; ?> >Chemistry</option>
 <option value="5"   <?php if($gre_subject=="5") echo "selected"; ?> >Computer Science</option>
 <option value="6"  <?php if($gre_subject=="6") echo "selected"; ?> >Literature in English</option>
 <option value="7"   <?php if($gre_subject=="7") echo "selected"; ?> >Mathematics</option>
 <option value="8"  <?php if($gre_subject=="8") echo "selected"; ?> >Mathematics Rescaled</option>
 <option value="9"  <?php if($gre_subject=="9") echo "selected"; ?> >Physics</option>
 <option value="10"  <?php if($gre_subject=="10") echo "selected"; ?> >Psychology</option>
</select>
</div>


</div> <div class="tab-pane" id="toefl">

<input type="text" class="form-control" value="<?php  if($toefl) echo $toefl; ?>"  placeholder="TOEFL score"  name="toefls" id="toefls"/>
</div> <div class="tab-pane" id="ielts">
<input type="text" class="form-control"  placeholder="IELTS score"  value="<?php if($ielts) echo $ielts;  ?>" name="ielt" id="ielt"/>
</div> 
<div class="tab-pane" id="other">
<div id="inside">
<input type="text" name="dynfields[]" class="form-control" value="<?php if($tags[0])echo $tags[0];?>"   placeholder="Test name" /><br>
<input type="text" name="scorefields[]" class="form-control" value="<?php if($tags1[0])echo $tags1[0];?>"  placeholder="Score"  />
</div><br><a class="btn-link" style="float:right;" onclick="add()">Add more</a>
</div>
</div> 




 </div>


				<div class="result"></div><br>
	<button name="submit" type="submit"    onclick="return add_test()" class="btn btn-sm btn-primary" style="float:right;"   id="submit1">Save</button>


									</form>
								</div>

							</div>

						</div>
						
					</div>
				</div>

			</section>

			<!-- contact -->
 <div id="xob1" class="col-md-12 boxFocus pt30 mb30"> 
<?php
$o=0;
echo "<table><tbody><tr><td>";
if($university)
{echo "<p><b>Alma Mater </b></p></td><td style='padding-left:20px;'><p >".$university."</p>";

$o=1;
}
echo "</td></tr><tr><td>";
if($list_degree_type && $major)
{
echo "<p><b>Degree </b></p></td><td style='padding-left:20px;'><p>".$list_degree_type." in ".$major."</p>";
$o=1;
}
elseif($list_degree_type)
{echo "<p><b>Degree </b></p></td><td><p>".$list_degree_type."</p>";
$o=1;
}elseif($major)
{echo "<p><b>Major </b></p></td><td><p>".$major."</p>";
$o=1;}
echo "</td></tr></tbody></table>";
if($gre || $toefl  || $ielts || $len!=0 || ($appear_gre_subject==1 && $gre_subject!=1))
{echo "<br><h4><u>Test Score Details</u></h4>";
$o=1;}
echo "<table><tbody><tr><td>";
if($sat)
echo "<p><b>SAT </b></p></td><td><p>".$sat."</p>";
echo "</td></tr><tr><td>";
if($gre)
{
if($gre_analytical!=100)

echo  "<p><b>GRE General Score </b></p></td><td style='padding-left:20px;'><p>".$gre." &nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;Analytical: ".$gre_analytical."</p>";
else
echo  "<p><b>GRE General Score &nbsp;&nbsp;</b></p></td><td style='padding-left:20px;'><p>".$gre."</p>";
}
echo "</td></tr>";
echo "<tr><td>";
if($appear_gre_subject==1){
if($gre_subject!=1)
{
if($gre_subject=='2')$s= 'Biochemistry, Cell and Molecular Biology';
elseif($gre_subject=='3')$s= 'Biology';
elseif($gre_subject=='4')$s= 'Chemistry';
elseif($gre_subject=='5')$s= 'Computer Science';
elseif($gre_subject=='6')$s= 'Literature in English';
elseif($gre_subject=='7')$s= 'Mathematics';

elseif($gre_subject=='8')$s= 'Mathematics Rescaled';
elseif($gre_subject=='9')$s= 'Physics';
elseif($gre_subject=='10')$s= 'Psychology';
if($gre_subject_score)
echo "<p><b>Appeared in GRE Subject Test for </b></p></td><td><p style='margin-left:10px;'>".$s."&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;Score: ".$gre_subject_score."</p>";
else
echo "<p><b>Appeared in GRE Subject Test for </b></p></td><td><p>".$s."</p>";
}}echo "</td></tr>";
echo "<tr><td>";
if($toefl)
echo "<p><b>TOEFL </b></p></td><td style='padding-left:20px;'><p>".$toefl."</p>";
echo "</td></tr><tr><td>";
if($ielts)
echo "<p><b>IELTS </b></p></td><td><p>".$ielts."</p>";
echo "</td></tr>";
if($len!=0){
for($i=0;$i<$len;$i++){
echo "<tr><td>";
echo "<p><b>".$tags[$i]."&nbsp;&nbsp;&nbsp;&nbsp;</b></p></td><td><p>".$tags1[$i]."</p>";

echo "</td></tr>";
}}
echo "</tbody></table>";
if($o==0 && $uid==$id)
echo "<p>Oops, you've not filled out your details.</p>";
elseif($o==0 && $uid!=$id)
echo "The person has not yet filled out their details.";
?>
</div>



</div><!--end general-->
<div class="tab-pane fade" id="sop">
<a class="btn btn-sm btn-primary" style="float:right;" id="detail2">Edit Details</a>
<h2>Statement of Purpose</h2>
<!-- contact -->
                        <section class="mt40">

                                <div class="container">

                                        <div class="row">

                                                <div class="col-md-12 boxFocus pt30 mb30" style="display:none;" id="box2">
                                                        <div class="row">



                                                                <div class="col-md-12" >
 <form method="post"  action="accounts/sop.php" id="contactfrm1" role="form" class="mb15 pb40" style="margin-bottom:0px;" enctype="multipart/form-data">
<p>Please submit essays only for the universities for which you got admits.</p>
<div id="inside1">
 <div class="form-group">
                                                                                        <label>Name of university for which you got admit</label>
                                                                                        <input type="text" class="form-control" value="<?php if($deck[0]) echo $deck[0]; ?>" name="unv[]"  />
                                                                                </div>

 <div class="form-group">
                                                                                        <label>Course Type</label>
                                                                                        <input type="text" class="form-control" name="ctype[]" value="<?php if($deck1[0]) echo $deck1[0];  ?>" placeholder="e.g. MS in Sociology" />
                                                                                </div>

 <div class="form-group">
                                                                                        <label>Term applied for</label>
                                                                                        <input type="text" class="form-control" name="term[]" value="<?php if($deck2[0]) echo $deck2[0];  ?>"  placeholder="e.g. Fall 2015" />
                                                                                </div>

<?php
if($deck3[0]){
$dep=explode('/',$deck3[0]);
echo '<div id="tra"><label>Essay</label>
<br>
<div>
<a href="'.$deck3[0].'" target="_blank" id="tra">'.end($dep).'</a>
<a  onclick="remove_sop(\''.$deck3[0].'\',\'ess\', \'inp\',\'tra\')" style="cursor:pointer;float:right">Remove</a>
</div>
</div>




<label style="display:none;" id="ess">Upload essay</label>
<div class="input-group"  style="display:none;" id="inp">
                <span class="input-group-btn">
                    <span class="btn btn-default btn-file" onclick="choose()">
                        Browse... <input type="file"   name="sopessays[]" multiple="multiple">
                    </span>
                </span>
<input type="text" class="form-control"  readonly="">
            </div>';







}
else
{
echo '
<label>Upload essay</label>
<div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-default btn-file" onclick="choose()">
                        Browse... <input type="file"   name="sopessays[]" multiple="multiple">
                    </span>
                </span>
<input type="text" class="form-control"  readonly="">
            </div>';
}
?>



<br>
</div><!-- end inside1-->
<a class="btn-link" style="float:left;" onclick="show_sop()">Add more</a>
 <div class="result"></div>
                   <button name="submit" type="submit" style="float:right;"  onclick="return part_two()" class="btn btn-sm btn-primary" id="submit2">Save</button>

</form>
</div></div></div></div></div></section>
 <div id="xob2" class="col-md-12 boxFocus pt30 mb30">
<?php
$pos=0;
if($len1!=0)
{
for($i=0;$i<$len1;$i++){
if($deck3[$i])
{if($deck[$i] )
echo "<h2><a href='user-content.php?id=$uid&essay=$i'>".$deck[$i]."</a></h2>";
else echo "<h2><a href='user-content.php?id=$uid&essay=$i'>Essay</a></h2>";
echo "<p>";
if($deck1[$i])
echo $deck1[$i];
if($deck2[$i] && $deck1[$i])
echo "&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;".$deck2[$i];
else echo $deck2[$i];
echo "</p>";
$get_file=file_get_contents('http://' . $_SERVER['HTTP_HOST'] . $deck3[$i]);
echo "<p>". nl2br(htmlspecialchars(substr(preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $get_file),0,300)))."...<a href='user-content.php?id=$uid&essay=$i'>Read full essay</a></p><br><br>";
$pos=1;
}}}
if($pos==0 && $uid==$id)
echo "<p>Oops, you've not submitted any essay yet.</p>";
elseif($pos==0 && $uid!=$id)
echo "<p>The person has not yet uploaded any essay.</p>";
?></div>

</div>
<div class="tab-pane fade" id="lor">
<a class="btn btn-sm btn-primary" style="float:right;"  id="detail3" >Edit Details</a>
<h2>Letters of Recommendation</h2>
<!-- contact -->
                        <section class="mt40">

                                <div class="container">

                                        <div class="row">

                                                <div id="box3" style="display:none;" class="col-md-12 boxFocus pt30 mb30">

                                                        <div class="row">



                                                                <div class="col-md-12" >
 <form method="post" action="accounts/lor.php" id="contactfrm2" role="form" class="mb15 pb40" style="margin-bottom:0px;" enctype="multipart/form-data">
<p>Please submit LORs only for the universities for which you got admits.</p>

<div  id="exp_lor">
<?php
if($path_lor[0]){
$arc=explode('/',$path_lor[0]);
echo '<div id="rec"><label>Recommendation Letter1</label>
<br>
<div>
<a href="'.$path_lor[0].'" target="_blank" >'.end($arc).'</a>
<a  onclick="remove_lor(\''.$path_lor[0].'\',\'putresume\',\'rec\')" style="cursor:pointer;float:right">Remove</a>
</div>
</div>
<div id="putresume" style="display:none;" >
<a class="file-input-wrapper btn btn-default  btn-default"><span>Search for a file to add</span><input name="insres[]"  type="file" title="Search for a file to add" class="btn-default" style="left: -96.5px; top: -9px;"></a>
</div>

';
}else{
echo '
<div id="putresume">
<a class="file-input-wrapper btn btn-default  btn-default"><span>Search for a file to add</span><input name="insres[]"  type="file" title="Search for a file to add" class="btn-default" style="left: -96.5px; top: -9px;"></a>
</div>
';}
?>
</div>
<br>
<a class="btn-link" style="float:left;" onclick="addlor()">Add more</a>
 <div class="result"></div>
                                                 <button name="submit" type="submit" style="float:right;"   onclick="return part_three()" class="btn btn-sm btn-primary" id="submit3">Save</button>

</form>
</div></div></div></div></div></section>
 <div id="xob3" class="col-md-12 boxFocus pt30 mb30">
<?php
$rol=0;
if($len_lor!=0)
{
$j=1;
for($i=0;$i<$len_lor;$i++){

if($path_lor[$i])
{echo "<h2><a href=''>Letter".$j++."</a></h2>";
$get_lor=file_get_contents('http://' . $_SERVER['HTTP_HOST'] . $path_lor[$i]);
echo nl2br(htmlspecialchars(substr(preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $get_lor),0,300)))."...<a href='lor.php?id=$uid&lor=$i'>Read full letter</a><br><br><br>";
$rol=1;
}}}
if($rol==0 && $uid==$id)
echo "<p>Oops, you've not submitted any letter yet.</p>";
elseif($rol==0 && $uid!=$id)
echo "The person has not yet submitted any recommendation letter.";
?></div>


</div>
<div class="tab-pane fade" id="admit">
<a class="btn btn-sm btn-primary" style="float:right;" id="detail4">Edit Details</a>
<h2>Scholarship Details</h2>
<!-- contact -->
                        <section class="mt40">

                                <div class="container">

                                        <div class="row">

                                                <div class="col-md-12 boxFocus pt30 mb30" id="box4" style="display:none;">

                                                        <div class="row">



                                                                <div class="col-md-12" >
 <form method="post" action="accounts/scholarship.php" id="contactfrm3" role="form" class="mb15 pb40" style="margin-bottom:0px;" enctype="multipart/form-data">
<label >Did you receive any scholarship?</label>
<label  class="radio-inline"><input type="radio" name="optradio2" id="money" value="1" onclick="showscholarship()"  <?php if($scholarship_received=="1") echo "checked"; ?>>Yes</label>
<label class="radio-inline"><input type="radio" name="optradio2" value="2" onclick="hidescholarship()"  <?php if($scholarship_received=="2") echo "checked"; ?>>No</label>
<div id="scholarblock" style="display:none;">
<div id="viewscholar">
 <div class="form-group">
                                                                                        <label >Scholarship Name</label>
                                                                                        <input type="text" name="scholarshipname[]" value="<?php if($sch_nm[0]) echo $sch_nm[0]; else echo "";  ?>"class="form-control" />
                                                                                </div>
 <div class="form-group">
                                                                                        <label >Amount</label>
                                                                                        <input type="text" name="scholarshipamt[]"  value="<?php if($sch_amt) echo $sch_amt[0]; else echo "";?>" class="form-control" />
                                                                                </div>



<?php
if($sch_pth[0]){
$mon=explode('/',$sch_pth[0]);
echo '<div id="stipend">
<label>Scholarship Essay</label>
<br>
<a href="'.$sch_pth[0].'" target="_blank" >'.end($mon).'</a>
<a  onclick="remove_scholarship(\''.$sch_pth[0].'\',\'stipend\',\'money_block\')" style="cursor:pointer;float:right">Remove</a>
</div>
<div  id="money_block" style="display:none">
<a class="file-input-wrapper btn btn-default  btn-default"><span>Upload essay (if applicable)</span><input type="file" title="Scholarship essays" name="scholarshipessay[]" class="btn-default" style="left: -96.5px; top: -9px;"></a>
</div>

';
}else
{echo'
<a class="file-input-wrapper btn btn-default  btn-default"><span>Upload essay (if applicable)</span><input type="file" title="Scholarship essays" name="scholarshipessay[]" class="btn-default" style="left: -96.5px; top: -9px;"></a>

';
}
?>
<!--<a class="file-input-wrapper btn btn-default  btn-default"><span>Upload essay (if applicable)</span><input type="file" title="Scholarship essays" name="scholarshipessay[]" class="btn-default" style="left: -96.5px; top: -9px;"></a>-->
<br></div><br>
<a class="btn-link" style="float:left" onclick="addscholarship()">Add more</a>
</div>
 <div class="result"></div>
            <button name="submit" type="submit" style="float:right;" onclick="return part_four()"  class="btn btn-sm btn-primary" id="submit4">Save</button>
</form>
</div></div></div></div></div></section>
 <div id="xob4" class="col-md-12 boxFocus pt30 mb30">
<?php
$sch=0;
if($len_scholarship!=0)
{
for($i=0;$i<$len_scholarship;$i++){
if($sch_nm[$i] && $sch_amt[$i]){
echo '<h2>'.$sch_nm[$i].'</h2>';
echo '<h4>Received '.$sch_amt[$i].'</h4>';
$sch=1;
}
elseif($sch_nm[$i] && !$sch_amt[$i]){
echo '<h2>'.$sch_nm[$i].'</h2>';
$sch=1;
}
elseif(!$sch_nm[$i] && !$sch_amt[$i] && $sch_pth[$i])
{
echo '<h2>Scholarship Essay</h2>';
$sch=1;

}
if($sch_pth[$i])
{

$get_sch=file_get_contents('http://' . $_SERVER['HTTP_HOST'] . $sch_pth[$i]);
echo "<p>". nl2br(htmlspecialchars_decode(substr(preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $get_sch),0,300)))."...<a href='scholarship-essay.php?id=$uid&essay=$i'>Read full essay</a></p><br><br>";

$sch=1;
}

}}
elseif($scholarship_received=="2")
{
echo "<p>No scholarship received.</p>";
$sch=1;
}
if($sch==0 && $uid==$id)
echo "<p>Oops, you've not submitted any scholarship details.</p>";
elseif($sch==0 && $uid!=$id)
echo "The person has not yet submitted any scholarship details.";

?>
</div>
</div>
<div class="tab-pane fade" id="resume">
<a class="btn btn-sm btn-primary" style="float:right;"  id="detail5">Edit Resume</a>
<h2>Resume</h2>
<!-- contact -->
                        <section class="mt40">

                                <div class="container">

                                        <div class="row">

                                                <div class="col-md-12 boxFocus pt30 mb30" style="display:none;"  id="box5">

                                                        <div class="row">



                                                                <div class="col-md-12" >

<!--<form method="post"  id="contactfrm4" role="form" class="mb15 pb40" style="margin-bottom:0px;" enctype="multipart/form-data">
-->
<div id="contactfrm4">
<?php



?>
 <div class="result"></div>
 <button name="submit" type="submit"  style="float:right;" onclick="part_five()"  class="btn btn-sm btn-primary" id="submit5">Save</a>
<?php

//if($bmw==1)
//echo '<script>document.getElementById("submit5").style.display="none";</script>';
?>
<!--</form>-->
</div>
</div></div></div></div></div></section>
 <div id="xob5" class="col-md-12 boxFocus pt30 mb30">
<?php
$view="";
if($resume_path){
$view_resume= htmlspecialchars_decode($resume_path);
$view=strip_tags($view_resume);
if($view)
echo $view_resume;
}
if( $uid==$id && !$view)
echo "<p>Oops, you've not yet submitted your resume.</p>";
elseif(!$view && $uid!=$id)
echo "The person has not yet submitted their resume.";
 
?>
</div>
</div>
<div class="tab-pane fade" id="ayq">
<h2>Ask Your Question</h2>
<!-- contact -->
                        <section class="mt40">

                                <div class="container">

                                        <div class="row">

                                                <div class="col-md-12 boxFocus pt30 mb30">

                                                        <div class="row">



                                                                <div class="col-md-12" >

<a class="btn btn-sm btn-info" id="ask"  data-toggle="modal" data-target="#myModal"  style="float:left;" >Ask Question</a>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ask Your Question</h4>
      </div>
      <div class="modal-body">
<!--<div class="form-group">
									<textarea name="question" style="resize:none;"  class="form-control" id="uestion" cols="3" rows="7" ></textarea>
								</div>



<p>Max 150 words allowed</p>-->
      </div>
      <div class="modal-footer">
<!--<form method="post" onsubmit="return proceed();"   role="form"  >
-->
        <button  type="button"  class="btn btn-default"  id="post_question"  >Post</button>
<!--  </form>-->
  </div>
    </div>

  </div>
</div>




</div></div></div></div></div></section>

</div>
<div class="tab-pane fade" id="cwm">
<a class="btn btn-sm btn-primary" style="float:right;" id="detail7">Edit Details</a>
<h2>Connect With Me</h2>
<!-- contact -->
                        <section class="mt40">

                                <div class="container">

                                        <div class="row">

                                                <div class="col-md-12 boxFocus pt30 mb30" style="display:none;"  id="box7">

                                                        <div class="row">



                                                                <div class="col-md-12" >

 <form method="post" action="accounts/connect.php" id="contactfrm5" role="form" class="mb15 pb40" style="margin-bottom:0px;" enctype="multipart/form-data">
 <div class="form-group">
                                                                                        <label >Provide URL to your Facebook account</label>
                                <input type="text" name="facebook" value="<?php if($facebook_url)echo $facebook_url; else echo "";  ?>"  class="form-control" />
                                                                                </div>
 <div class="form-group">
                                                                                        <label >Provide URL to your LinkedIn account</label>
                                        <input type="text" name="linkedin" value="<?php if($linkedin_url)echo $linkedin_url; else echo "";  ?>" class="form-control" />
                                                                                </div>



 <div class="form-group"> 
<label >Provide an alternate email address<span class="icon-info-circled tips" title="The email address you provide here will be publicly visible."></span></label>
                                                                                        <input type="email" name="em"  value="<?php if($alternate_email)echo $alternate_email; else echo "";  ?>"  class="form-control" />
                                                                                </div>
 <div class="form-group">
<label >Provide your phone number<span class="icon-info-circled tips" title="Your phone number will be publicly visible."></span></label>
                                                                                        <input type="phone" name="ph"  value="<?php if($mobile)echo $mobile;  else echo "";  ?>" class="form-control" />
                                                                                </div>
 <div class="result"></div>
                                                                  <button name="submit" type="submit" onclick="return part_seven()"  class="btn btn-sm btn-primary" style="float:right;" id="submit7">Save</button>
</form>
</div></div></div></div></div></section>
 <div id="xob7" class="col-md-12 boxFocus pt30 mb30">
<?php
$cw=0;
//echo "<table><tbody><tr><td>";
if($alternate_email)
{

$cw=1;
echo "<p><b>Alternate Email</b><br>".$alternate_email."</p>";


}
//echo "</td></tr><tr><td>";
if($mobile)
{
$cw=1;
echo "<p><b>Phone</b><br>".$mobile."</p>";
}
//echo "</td></tr><tr><td>";
if($facebook_url || $linkedin_url){
echo '<p><b>Connect with me:</b>';
if($facebook_url) echo '
<a href="'.$facebook_url.'" class="icon-facebook-1" target="_blank">Facebook</a>';
if( $linkedin_url) echo '
<a href="'.$linkedin_url.'" class="icon-linkedin-1" style="margin-left:10px;" target="_blank">LinkedIn</a>';
echo '</p>';
$cw=1;
}
//echo "</td></tr></tbody></table>";
if($cw==0 && $uid==$id)
echo "Oops, you've not provided any contact details yet.";
elseif($cw==0 && $uid!=$id)
echo "The person has not provided any contact details";
?>
</div>
</div>










</div><!--ensd tab content-->
</section>

<div class="col-md-2">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ivy1 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7323560447153823"
     data-ad-slot="3745552993"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>






</div></div></section>

</section>
<?php include "footer.php"; ?>
												
							</div>

			<!-- global wrapper -->
<!-- End Document 
	================================================== -->
	<script type="text/javascript" src="js-plugin/respond/respond.min.js"></script>
<script type="text/javascript" src="sticky/sticky.min.js"></script>
<link rel="stylesheet" href="sticky/sticky.min.css" type="text/css" />
	<!-- third party plugins  -->
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js-plugin/easing/jquery.easing.1.3.js"></script>
	<!-- carousel -->
	<script type="text/javascript" src="js-plugin/owl.carousel/owl-carousel/owl.carousel.min.js"></script>
	<!-- pop up -->
	<script type="text/javascript" src="js-plugin/magnific-popup/jquery.magnific-popup.min.js"></script>
	<!-- isotope -->
	<script type="text/javascript" src="js-plugin/isotope/jquery.isotope.min.js"></script>
<script type="text/javascript" src="js-plugin/isotope/jquery.isotope.sloppy-masonry.min.js"></script>
	<!-- sharrre -->
	<script type="text/javascript" src="js-plugin/jquery.sharrre-1.3.4/jquery.sharrre-1.3.4.min.js"></script>
	<!-- form -->
	<script type="text/javascript" src="js-plugin/neko-contact-ajax-plugin/js/jquery.form.js"></script>
	<script type="text/javascript" src="js-plugin/neko-contact-ajax-plugin/js/jquery.validate.min.js"></script>
	<!-- parallax -->
	<script type="text/javascript" src="js-plugin/parallax/js/jquery.stellar.min.js"></script>
	<!-- camera slider -->
	<script type="text/javascript" src="js-plugin/camera/camera.min.js"></script>
	
	<!-- appear -->
	<script type="text/javascript" src="js-plugin/appear/jquery.appear.js"></script>

	<!-- Custom  -->
	<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/bootstrap.file-input.js"></script>
<script type="text/javascript" src="/js/jquery.noty.packaged.js"></script>
<script type="text/javascript" src="/search/search.js"></script>
<?php
echo "<script>var abs='".htmlspecialchars_decode($resume_path)."';</script>";

echo '<script>var ab=document.getElementById("submit5");$("#detail5").on("click", function(){$.post("quill/examples/advanced.html", function(data){$("#contactfrm4").html(data).fadeIn(); $("#ql-editor-2").html(abs); $("#contactfrm4").append(ab);$("#xob5").remove();});});</script>';

?>
<?php
if($id!=$uid)

echo "<script>function clickdisable(){
document.getElementById('poi').style.pointerEvents = 'none';
$('div').removeClass('media__body');
$('.file-upload').remove();
$('a[id^=\'detail\']').remove();
$('div[id^=\'box\']').remove();
$('.icon-camera').remove();
}
clickdisable();</script>";


?>

<script>
/*$('#accept').on('click',function(){
alert("hello");
var ind=$("#uid").val();
 $.post('ReviewEssay/accept_request.php', {'senderid' : ind}, function(data) {
if(data=="success"){
//$("#accept").text("Request Accepted");
//$("#accept").attr('disabled',true);
}
else
{
alert(data);

}
});

});
*/
function add_test(){
names = [];
scores=[];
var ch=0,mn=0;
$("input[name='dynfields[]']").each(function() {
   names.push($(this).val());
});
$("input[name='scorefields[]']").each(function() {
    scores.push($(this).val());
});
//for(var i=0;i<names.length;i++)
//{
//if((names[i]=="" && scores[i]!="") || (names[i]!="" && scores[i]=="")) 
//$("input[name='dynfields[]']").focus();

         var i=0,j=0;                                               
$("input[name='scorefields[]']").each(function() {
    if(names[i] && $(this).val()==""){
$(this).focus();
ch=1;
return false;
}
i++;
});
//}
$("input[name='dynfields[]']").each(function() {
    if(scores[j] && $(this).val()==""){
$(this).focus();
mn=1;
return false;
}
j++;
});
if(ch==1 || mn==1)
return false;
//else
return true;

}
function part_seven(){
var u=0;
var ph=$("input[name='ph']").val();
 var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
var facebook=$("input[name='facebook']").val();
var linkedin=$("input[name='linkedin']").val();
if(!(/^\d+$/.test(ph)) && ph){
alert("Please enter correct mobile number.");
u=1;
}
else if(facebook){
  if(!pattern.test(facebook)) {
    alert("Please enter a valid Facebook URL. \n E.g. http://www.example.com");
u=1;
}}
else if(linkedin){
if(!pattern.test(linkedin)) {
    alert("Please enter a valid LinkedIn URL.\n E.g. http://www.example.com");
u=1;
}}

if(u==1)
return false;
else
return true;
}
function part_four(){
var u=0;
$("input[name='scholarshipessay[]']").each(function() {
var tt=$(this).val();
if(tt)
{
var ext = $(this).val().split('.').pop().toLowerCase();
if($.inArray(ext, ['txt']) == -1) {
u=1;
}
else if(this.files[0].size>(500*1024))
{

u=2;

}
else if(this.files[0].size<=0)
{
u=3;

}

}

});
if(u==1)
{
 alert('You can upload files with .txt extension only.');
return false;

}
else if(u==2)
{

 alert('File size should not exceed 500 KB.');
return false;

}
else if(u==3)
{
 alert('You are trying to upload an empty file. Please upload a proper file.');
return false;


}
else

return true;





}
function part_five(){
var span_val = $("#ql-editor-2").html();//text();
$.post('accounts/resume.php',{'resume' : span_val}, function(data) {
location.reload(true);
});
}


function part_three(){

var u=0;
$("input[name='insres[]']").each(function() {
var tt=$(this).val();
if(tt)
{
var ext = $(this).val().split('.').pop().toLowerCase();
if($.inArray(ext, ['txt']) == -1) {
u=1;
}
else if(this.files[0].size>(500*1024))
{

u=2;

}
else if(this.files[0].size<=0)
{
u=3;

}

}

});
if(u==1)
{
 alert('You can upload files with .txt extension only.');
return false;

}
else if(u==2)
{

 alert('File size should not exceed 500 KB.');
return false;
}
else if(u==3)
{
 alert('You are trying to upload an empty file. Please upload a proper file.');
return false;


}
else

return true;


}
function part_two(){
var u=0;
$("input[name='sopessays[]']").each(function() {
var tt=$(this).val();
if(tt)
{
var ext = $(this).val().split('.').pop().toLowerCase();
if($.inArray(ext, ['txt']) == -1) {
u=1;
}
else if(this.files[0].size>(500*1024))
{

u=2;

}
else if(this.files[0].size<=0)
{
u=3;

}

}

});
if(u==1)
{
 alert('You can upload files with .txt extension only.');
return false;

}
else if(u==2)
{

 alert('File size should not exceed 500 KB.');
return false;
}
else if(u==3)
{
 alert('You are trying to upload an empty file. Please upload a proper file.');
return false;


}
else

return true;
}
$("#detail1").on('click',function(){
$("#box1").show();
$(this).hide();
$("#xob1").hide();
});
$("#detail2").on('click',function(){
$("#box2").show();
$(this).hide();
$("#xob2").hide();
});
$("#detail3").on('click',function(){
$("#box3").show();
$(this).hide();
$("#xob3").hide();
});
$("#detail4").on('click',function(){
$("#box4").show();
$(this).hide();
$("#xob4").hide();
});

$("#detail5").on('click',function(){
$("#box5").show();
$(this).hide();

});
$("#detail7").on('click',function(){
$("#box7").show();
$(this).hide();
$("#xob7").hide();
});


var f=1;
var l=1;
$(document).ready(function(){
var t=$("#clickme").val();
for(var y=0;y<t-1;y++)
{add();
}
var t1=$("#clickme1").val();
for(var y=0;y<t1-1;y++)
{
f=0;
show_sop();
}
var t2=$("#clickme2").val();
for(var y=0;y<t2-1;y++)
{addlor();
}
var t3=$("#clickme3").val();
for(var y=0;y<t3-1;y++)
{
l=0;
addscholarship();
}




$('textarea').on('keyup',function() {
    var textarea_value = $("#getmessage").val();
//    var text_value = $('input[name="textField"]').val();
    if(textarea_value.trim() != '') {
        $('#send_message').attr('disabled' , false);
    }else{
        $('#send_message').attr('disabled' , true);
    }
});
var usrname=$("#usrname").val();

$("#send_message").on('click',function(){

 var textarea_value = $("#getmessage").val();
var uid=$("#uid").val();
$.post('accounts/send_message.php',{'message' : textarea_value,'uid':uid}, function(data) {
if(data=="success")
{
 $.sticky('Your message has been sent.');
}
});
});
var request=$("#request").val();
if(request)
generateAll1();
function generateAll1() {
        generate1('topCenter');
}
function generate1(layout) {
        var n = noty({
            text        : usrname+' has sent you a request to review their essay.',
            type        : 'alert',
            dismissQueue: true,
            layout      : layout,
            theme       : 'relax',
            buttons     : [
                {addClass: 'btn btn-sm btn-success', text: 'Accept Request', id:'accept',onClick: function ($noty) {
                    $noty.close();
                    noty({dismissQueue: true, force: true, layout: layout, theme: 'defaultTheme', text: 'Request Accepted', type: 'success'});
var ind=$("#uid").val();
 $.post('ReviewEssay/accept_request.php', {'senderid' : ind}, function(data) {
if(data!="success"){
alert(data);

}
});


                }
                }
               // {addClass: 'btn btn-danger', text: 'Cancel', onClick: function ($noty) {
                 //   $noty.close();
                   // noty({dismissQueue: true, force: true, layout: layout, theme: 'defaultTheme', text: 'You clicked "Cancel" button', type: 'error'});
              //  }
               // }
            ]
        });
        console.log('html: ' + n.options.id);
var nn=document.getElementById('noty_topCenter_layout_container');
$('body').prepend(nn);
    }

if($('#radio1').is(':checked')) { show(); }
if($('#money').is(':checked')) { showscholarship(); }
var com_code=$("#com_code").val();
if(com_code)
{
 generateAll();


}
});
function generateAll() {
        generate('top');
}
 function generate(layout) {
        var n = noty({
            text        : "Please do not forget to confirm your email address. You may <a style='cursor:pointer' onclick='resend_mail()'><b>resend confirmation email here</b></a>",// or <a href='google.com'><b>update your email address.</b></a>",//layout,
            type        : 'alert',
            dismissQueue: true,
            layout      : layout,
            theme       : 'relax'
        });
        console.log('html: ' + n.options.id);
var nn=document.getElementById('noty_top_layout_container');
$('body').prepend(nn);
    }
function resend_mail()
{
var email=$("#resend").val();
$.post('Loginvalidate/resend_confirmation_email.php',{'email' : email}, function(data) {
if(data)
alert(data);
});
}
var jArray= <?php echo json_encode($tags ); ?>;
var jArray1= <?php echo json_encode($tags1 ); ?>;
var jArray2= <?php echo json_encode($deck); ?>;
var jArray3= <?php echo json_encode($deck1 ); ?>;
var jArray4= <?php echo json_encode($deck2 ); ?>;
var jArray5=<?php echo json_encode($deck3); ?>;
var jArray6=<?php echo json_encode($path_lor); ?>;
var jArray7=<?php  echo json_encode($sch_nm);  ?>;
var jArray8=<?php echo json_encode($sch_amt);  ?>;
var jArray9=<?php   echo json_encode($sch_pth);  ?>;
var y=1,z=1,a=1,v=1;

var temp=2;
var addlor =  function() {
var ss='';
if(jArray6[a])
{
var nw=jArray6[a].split("/");
nw=nw[nw.length-1];
ss='<div id="reveal'+a+'"><label>Recommendation Letter'+temp++ +'</label><br><div><a href="'+jArray6[a]+'"  target="_blank" >'+nw+'</a><a  onclick="remove_lor(\''+jArray6[a]+'\',\'\',\'reveal'+a+'\')" style="cursor:pointer;float:right">Remove</a></div></div>';

$("#exp_lor").append('<div><br>'+ss+'</div>');
}
else
{
ss='<a class="file-input-wrapper btn btn-default  btn-default"><span>Search for a file to add</span><input type="file" name="insres[]"  title="Search for a file to add" class="btn-default" style="left: -96.5px; top: -9px;"></a>';
$("#exp_lor").append('<div><br><i class="icon-cancel" onclick="del(this)"></i><br>'+ss+'</div>');
}
//$("#exp_lor").append('<div><br><i class="icon-cancel" onclick="del(this)"></i><br>'+ss+'</div>');
//<a class="file-input-wrapper btn btn-default  btn-default"><span>Search for a file to add</span><input type="file" name="insres[]"  title="Search for a file to add" class="btn-default" style="left: -96.5px; top: -9px;"></a></div>');

a++;
};



var gets='';
var addscholarship =  function() {
if(jArray9[v]){
var tex=jArray9[v].split("/");
tex=tex[tex.length-1];
gets='<div id="black'+v+'"><label>Scholarship Essay</label><br><a href="'+jArray9[v]+'" target="_blank" >'+tex+'</a><a  onclick="remove_scholarship(\''+jArray9[v]+'\',\'black'+v+'\',\'fellow'+v+'\')" style="cursor:pointer;float:right">Remove</a></div><div  id="fellow'+v+'" style="display:none"><a class="file-input-wrapper btn btn-default  btn-default"><span>Upload essay (if applicable)</span><input type="file" title="Scholarship essays" name="scholarshipessay[]" class="btn-default" style="left: -96.5px; top: -9px;"></a></div>';
}
else
{
gets='<div  id="fellow'+v+'" ><a class="file-input-wrapper btn btn-default  btn-default"><span>Upload essay (if applicable)</span><input type="file" title="Scholarship essays" name="scholarshipessay[]" class="btn-default" style="left: -96.5px; top: -9px;"></a></div>';

}

//$("#viewscholar").append('<div><br><i class="icon-cancel" onclick="del(this)"></i><div class="form-group"> <label >Scholarship Name</label> <input type="text" name="scholarshipname[]" class="form-control" /> </div><div class="form-group"><label >Amount</label> <input type="text" name="scholarshipamt[]" class="form-control" /></div><a class="file-input-wrapper btn btn-default  btn-default"><span>Upload essay (if applicable)</span><input type="file" name="scholarshipessay[]"  title="Scholarship essays" class="btn-default" style="left: -96.5px; top: -9px;"></a></div>');
jArray7[v]=jArray7[v]?jArray7[v]:"";
jArray8[v]=jArray8[v]?jArray8[v]:"";

if(l==0){
$("#viewscholar").append('<br><div  style="border-top:1px lightgray dashed"><br><div class="form-group"> <label >Scholarship Name</label> <input type="text" value="'+jArray7[v]+'" name="scholarshipname[]" class="form-control" /> </div><div class="form-group"><label >Amount</label> <input type="text"  value="'+jArray8[v]+'" name="scholarshipamt[]" class="form-control" /></div>'+gets+'</div>');

}
else
if(l==1)

{
$("#viewscholar").append('<div><br><i class="icon-cancel" onclick="del(this)"></i><div class="form-group"> <label >Scholarship Name</label> <input type="text" value="'+jArray7[v]+'" name="scholarshipname[]" class="form-control" /> </div><div class="form-group"><label >Amount</label> <input type="text"  value="'+jArray8[v]+'" name="scholarshipamt[]" class="form-control" /></div>'+gets+'</div>');

}
l=1;

v++;
};


var opp= 0;
function remove_lor(file,id1,id2){

var x=confirm("Are you sure you want to delete your recommendation letter? This action cannot be undone.");
if(x){
$.post('accounts/remove-lor.php',{'file' : file}, function(data) {
if(data)
{
alert(data);
var tt=$('div[id^="reveal"]').length;
if(id1 )
{$("#"+id1).show();

}
$("#"+id2).hide();
}
});

}


}
/*function remove_resume(file,id1,id2){

var x=confirm("Are you sure you want to delete your resume?");
if(x){
$.post('accounts/remove-resume.php',{'file' : file}, function(data) {
if(data)
{
alert(data);
$("#"+id1).show();


$("#"+id2).hide();
$("#submit5").show();
}
});

}


}*/
function remove_scholarship(path,id1,id2)
{
var x=confirm("Are you sure you want to delete your essay? This action cannot be undone.");
if(x){
$.post('accounts/remove-scholarship.php',{'file' :path}, function(data) {
if(data)
{
alert(data);
$("#"+id1).hide();
$("#"+id2).show();

}
});
}
}
function remove_sop(file,id1,id2,id3){
var x=confirm("Are you sure you want to delete your essay? This action cannot be undone.");
if(x){

$.post('accounts/remove-sop.php',{'file' : file}, function(data) {
if(data)
{
alert(data);
$("#"+id1).show();
$("#"+id2).show();
$("#"+id3).hide();
//$("#"+id4).hide();

}
});
}
}
var add = function() {
if(jArray.length===0 || jArray.length===1 ||  opp==1)
{
jArray[y]="";
jArray1[y]="";
opp=1;
}
    $('#inside').append('<div><br><i class="icon-cancel" onclick="del(this)"></i><input type="text" class="form-control" name="dynfields[]"  value="'+jArray[y]+'"  placeholder="Test name"  /><br><input type="text" value="'+jArray1[y]+'" class="form-control" name="scorefields[]"  placeholder="Score"  /></div>');
y++;  //  numAdd++;
if(y>=jArray.length)
{jArray[y]="";
jArray1[y]="";
}
};
var del = function(btn) {
    $(btn).parent().remove();
//numAdd--;
};
 function show() { document.getElementById('toggle').style.display = 'block'; }
        function hide() { document.getElementById('toggle').style.display = 'none'; }

function showscholarship(){document.getElementById('scholarblock').style.display = 'block'; }
function hidescholarship(){document.getElementById('scholarblock').style.display = 'none' };
var op=0;
var show_sop = function() {
if(jArray2.length===0 || jArray2.length===1 || op==1)
{
jArray2[z]="";
jArray3[z]="";
jArray4[z]="";
jArray5[z]="";
op=1;
}



str='';
if(jArray5[z]=="")
{

str='  <div> <label>Upload essay</label><div class="input-group"><span class="input-group-btn"> <span class="btn btn-default btn-file" onclick="choose()">Browse... <input type="file" name="sopessays[]" multiple="multiple"></span></span><input type="text" class="form-control" readonly=""></div><br></div>';


}
else
{
var qw=jArray5[z].split("/");
qw=qw[qw.length-1];
 str='<label style="display:none;" id="ess'+z+'">Upload essay</label><div class="input-group" style="display:none;" id="inp'+z+'"><span class="input-group-btn"> <span class="btn btn-default btn-file" onclick="choose()">Browse... <input type="file" name="sopessays[]" multiple="multiple"></span></span><input type="text" class="form-control" readonly=""></div><div id="tra'+z+'"><label>Essay</label><br><a href="'+jArray5[z]+'" target="_blank">'+qw+'</a><a  onclick="remove_sop(\''+jArray5[z]+'\',\'ess'+z+'\',\'inp'+z+'\',\'tra'+z+'\')" style="cursor:pointer;float:right">Remove</a></div><br>';


}
if(f==0)
{

    $('#inside1').append('<div style="border-top:1px lightgray dashed"><br><div class="form-group"> <label>Name of university for which you got admit</label> <input type="text"  value="'+jArray2[z]+'"  class="form-control" name="unv[]"  /> </div> <div class="form-group"><label>Course Type</label><input type="text"  value="'+jArray3[z]+'"  class="form-control" name="ctype[]" placeholder="e.g. MS in Sociology" /></div> <div class="form-group"> <label>Term applied for</label><input type="text"  value="'+jArray4[z]+'"  class="form-control" name="term[]"  placeholder="e.g. Fall 2015" /> </div>'+str+'</div>');
}
if(f==1){

   $('#inside1').append('<div ><i class="icon-cancel" onclick="del(this)"></i><div class="form-group"> <label>Name of university for which you got admit</label> <input type="text"  value="'+jArray2[z]+'"  class="form-control" name="unv[]"  /> </div> <div class="form-group"><label>Course Type</label><input type="text"  value="'+jArray3[z]+'"  class="form-control" name="ctype[]" placeholder="e.g. MS in Sociology" /></div> <div class="form-group"> <label>Term applied for</label><input type="text"  value="'+jArray4[z]+'"  class="form-control" name="term[]"  placeholder="e.g. Fall 2015" /> </div>'+str+'</div>');

}
f=1;
/*if(jArray5[z]=="")
{

$('#inside1').append('  <div> <label>Upload essay</label><div class="input-group"><span class="input-group-btn"> <span class="btn btn-default btn-file" onclick="choose()">Browse... <input type="file" name="sopessays[]" multiple="multiple"></span></span><input type="text" class="form-control" readonly=""></div><br></div>');

}
else
{
var qw=jArray5[z].split("/");
qw=qw[qw.length-1];
$('#inside1').append('<label style="display:none;">Upload essay</label><div class="input-group" style="display:none;"><span class="input-group-btn"> <span class="btn btn-default btn-file" onclick="choose()">Browse... <input type="file" name="sopessays[]" multiple="multiple"></span></span><input type="text" class="form-control" readonly=""></div><div><label>Essay</label><br><a href="'+jArray5[z]+'" target="_blank">'+qw+'</a><a  onclick="remove_sop(\''+jArray5[z]+'\')" style="cursor:pointer;float:right">Remove</a></div><br>');

}*/
z++;
if( z>=jArray2.length)
{jArray2[z]="";
jArray3[z]="";
jArray4[z]="";
jArray5[z]="";
}


};




$(document).ready(function(){

    $("#ask").on("click", function(){

        //Put the code from above here.
$.post("quill/examples/advanced.html", function(data){

    $(".modal-body").html(data).fadeIn();

});
    });

});


$(window).scroll(function() {
if( $(this).width()>750){
if ($(this).scrollTop() > 1 && $(this).width()>1024 ){  
    $('div.input-group.input-group-sm').attr('style','padding:10px 11px');
  }
  else{
  $('div.input-group.input-group-sm').attr('style','padding:30px 11px');  
}
}
else
 $('div.input-group.input-group-sm').attr('style','padding:0 0');



});


$(document).ready(function() {
    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
var image  = new Image();
            reader.onload = function (e) {
image.src=e.target.result;
image.onload = function() {
    //        var w = this.width,
      //          h = this.height;
//var  t =  e.target.result.type;                           // ext only: // file.type.split('/')[1],
//                n = this.name,
  //              s = ~~(this.size/1024) +'KB';

//alert(t);
//alert(n);
//alert(s);

//if(w>=250 && h>=150)

//                $('#image').attr('src', e.target.result);
 //$('#image').width(600).height(200);
//else
//alert("Image is too small. Minimum dimensions of image should be 250*150");
};
$.post('accounts/upload.php',{'string' : e.target.result}, function(data) {
if(data=="1")
alert("Please upload proper image file with .png, .jpeg, .jpg, .gif and .bmp extensions only.");
else if(data=="2")
alert("File size must be less than 2 MB");
else
   $('#image').attr('src', e.target.result);
});
            }
    
            reader.readAsDataURL(input.files[0]);
}
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".media").on('click', function() {
       $(".file-upload").click();
    });
});

      $(document).on('change', '.btn-file :file', function () {
    var input = $(this), numFiles = input.get(0).files ? input.get(0).files.length : 1, label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [
        numFiles,
        label
    ]);
});

//$(document).ready(function () {
function choose(){
    $('.btn-file :file').on('fileselect', function (event, numFiles, label) {
      var input = $(this).parents('.input-group').find(':text'), log = numFiles > 1 ? numFiles + ' files selected' : label;
    if (input.length) {
            input.val(log);
        } else {
            if (log)
          alert(log);
        }
    });
}
//});
      //@ sourceURL=pen.js
//$('input[type=file]').bootstrapFileInput();
$('.file-inputs').bootstrapFileInput();

//function proceed(){

$("#post_question").click(function(){
var span_val = $("#ql-editor-2").text(); 
if(span_val!=""){
$.post('accounts/question.php',{'question' : span_val}, function(data) {

});
}
else
alert("Please post your question.");

});
  </script>
<?php include 'analyticstracking.php'; ?>
</body>
</html>

