<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);

if (!($_SESSION['id'])) {
      // redirect to your login page
header("Location:http://www.ivystudentsprofile.com");
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
	<title>Ivystudentsprofile Search</title>
	<meta name="description" content="Submit your essays and application material on Ivystudentsprofile and help prospective students gain an insight into your profile. Prospective students can view profiles of students admitted to universities in US, Canada, Europe, Asia and Australia, efficiently sort out their list of universities and enhance their chances of admittance to university of their choice.">
	<meta name="author" content="Ivystudentsprofile">
<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <!-- web font  -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400' rel='stylesheet' type='text/css'>
        <!-- plugin css  -->
        <link rel="stylesheet" type="text/css" href="../js-plugin/animation-framework/animate.css" />
        <!-- Pop up-->
        <link rel="stylesheet" type="text/css" href="../js-plugin/magnific-popup/magnific-popup.css" />
        <!-- Owl carousel-->
        <link rel="stylesheet" href="../js-plugin/owl.carousel/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="../js-plugin/owl.carousel/owl-carousel/owl.theme.css">
        <!-- camera slider -->
        <link type="text/css" rel="stylesheet" href="../js-plugin/camera/css/camera.css">
        <!-- nekoAnim-->
        <link rel="stylesheet" type="text/css" href="../js-plugin/appear/nekoAnim.css" />
        <!-- icon fonts -->
        <link type="text/css" rel="stylesheet" href="../font-icons/custom-icons/css/custom-icons.css">
        <link type="text/css" rel="stylesheet" href="../font-icons/custom-icons/css/custom-icons-ie7.css">
<!-- isotope -->
        <link type="text/css" rel="stylesheet" href="../js-plugin/isotope/css/style.css">
        <!-- Custom css -->
        <link type="text/css" rel="stylesheet" href="../css/layout.css">
        <link type="text/css" id="colors" rel="stylesheet" href="../css/red.css">
        <link type="text/css" rel="stylesheet" href="../css/custom.css">

        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
        <script src="../js/modernizr-2.6.1.min.js"></script>
  <script type="text/javascript" src="../js-plugin/jquery/1.8.3/jquery.min.js"></script>
 <script type="text/javascript" src="../js-plugin/jquery-ui/jquery-ui-1.8.23.custom.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="../images/favicon.ico">
 <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../images/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../images/apple-touch-icon-144x144.png">
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
<body>
<?php
include "../database.php";
$sql = "SELECT * FROM LoginDetails WHERE user_id=". $_SESSION['id'];
 $select = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($select)){

    $name = $row['name'];
$com_code=$row['com_code'];
$email=$row['email'];
}

?>
<!-- Primary Page Layout 
	================================================== -->
	<!-- globalWrapper -->
	<div id="globalWrapper">
<?php include '../header.php'; ?>
<section id="page">
<section id="content">
				<section class="pt30 pb30"> 
					<div class="container clearfix">
						<div class="row">


<h2>Search Results</h2>
<?php
$search=$_GET['search'];
$sql = "SELECT * FROM LoginDetails WHERE name LIKE '%".$search."%' and active!=2 ORDER BY user_id";
 $select = mysqli_query($conn, $sql);
if (mysqli_num_rows($select) > 0) {
while($row = mysqli_fetch_assoc($select)){

    $name = $row['name'];
$userid=$row['user_id'];
$user_pic=$row['user_pic'];
if(!$user_pic)
$user_pic="/images/avtar.png";
echo "<div class='col-md-4' style='height:80px;'><a href='/user-profile.php?id=".$userid."' style='color:black;text-decoration:none'><img class='img-circle' src='".$user_pic."'>&nbsp;&nbsp;<h5 style='display:inline'>".$name."</h5></a></div>";
}

}
else
echo "<h5>No results found.</h5>";
?>




<input type="hidden" id="com_code" value=<?php echo $com_code; ?> >
<input type="hidden" id="resend" value=<?php echo $email; ?> >







</div>
</div></section></section></section>
<?php include '../footer.php'; ?>
</div>

<!-- End Document 
	================================================== -->
	<script type="text/javascript" src="../js-plugin/respond/respond.min.js"></script>
	<!-- third party plugins  -->
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../js-plugin/easing/jquery.easing.1.3.js"></script>
	<!-- carousel -->
	<script type="text/javascript" src="../js-plugin/owl.carousel/owl-carousel/owl.carousel.min.js"></script>
	<!-- pop up -->
	<script type="text/javascript" src="../js-plugin/magnific-popup/jquery.magnific-popup.min.js"></script>
	<!-- isotope -->
	<script type="text/javascript" src="../js-plugin/isotope/jquery.isotope.min.js"></script>
<script type="text/javascript" src="../js-plugin/isotope/jquery.isotope.sloppy-masonry.min.js"></script>
	<!-- sharrre -->
	<script type="text/javascript" src="../js-plugin/jquery.sharrre-1.3.4/jquery.sharrre-1.3.4.min.js"></script>
	<!-- form -->
	<script type="text/javascript" src="../js-plugin/neko-contact-ajax-plugin/js/jquery.form.js"></script>
	<script type="text/javascript" src="../js-plugin/neko-contact-ajax-plugin/js/jquery.validate.min.js"></script>
	<!-- parallax -->
	<script type="text/javascript" src="../js-plugin/parallax/js/jquery.stellar.min.js"></script>
	<!-- camera slider -->
	<script type="text/javascript" src="../js-plugin/camera/camera.min.js"></script>
	
	<!-- appear -->
	<script type="text/javascript" src="../js-plugin/appear/jquery.appear.js"></script>

	<!-- Custom  -->
	<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="/js/jquery.noty.packaged.js"></script>


<script type="text/javascript" src="/search/search.js"></script>
<script>
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
$(document).ready(function(){
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
            text        : "Please do not forget to confirm your email address. You may <a style='cursor:pointer' onclick='resend_mail()'><b>resend confirmation email here.</b></a>",// or <a href='accounts/seetings.php'><b>update your email address.</b></a>",//layout,
            type        : 'alert',
            dismissQueue: true,
            layout      : layout,
            theme       : 'relax'
        });
        console.log('html: ' + n.options.id);
var nn=document.getElementById('noty_top_layout_container');
$('body').prepend(nn);
    }
//$("#resend_mail").on('click',function(){
function resend_mail()
{
var email=$("#resend").val();
$.post('../Loginvalidate/resend_confirmation_email.php',{'email' : email}, function(data) {
if(data)
alert(data);
});
}
//});
</script>
<?php include '../analyticstracking.php'; ?>
</body>
</html>

