<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
$id=$_SESSION['id'];
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
	<title>Ivystudentsprofile: Connecting admitted and prospective university students</title>
	<meta name="description" content="Submit your essays and application material on Ivystudentsprofile and help prospective students gain an insight into your profile. Prospective students can view profiles of students admitted to universities in US, Canada, Europe, Asia and Australia, efficiently sort out their list of universities and enhance their chances of admittance to university of their choice.">
	<meta name="author" content="Ivystudentsprofile">
<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
.img-circle{
height:40px;
width: 40px;
}
</style>
</head>
<body>
<?php
include "database.php";
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
<?php if($id)
include 'header.php';
else
include 'header_notloggedin.php';
?>

<section id="page">
<section id="content">
				<section class="pt30 pb30"> 
					<div class="container clearfix">
						<div class="row">
		<nav id="filter" class="span12 text-center">

								<div class="btn-group">
									<a href="#" class="btn btn-default current" data-filter="*" >All</a>
								<a href="#" class="btn btn-default" data-filter=".usa">US & Canada</a>
<a href="#" class="btn btn-default" data-filter=".europe">Europe</a>
									<a href ="#" class="btn btn-default" data-filter=".asia">Asia</a>
								<!--<a href ="#" type="button" class="btn btn-default"  data-filter=".australia">Australia</a>-->
								</div>

								
							</nav>	
<input type="hidden" id="com_code" value=<?php echo $com_code; ?> >
<input type="hidden" id="resend" value=<?php echo $email; ?> >

<div class="portfolio-items isotopeWrapper  clearfix" id="3">

<?php
$sql = "SELECT * FROM LoginDetails WHERE active=1";
 $select = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($select)){
$users_name=$row['name'];
$users_pic=$row['user_pic'];
$user_id=$row['user_id'];
$location=$row['location'];
$sql1="SELECT * FROM UserProfile where user_id=$user_id";
$select1=mysqli_query($conn, $sql1);
$univ_name="";
$list_degree_type="";
$major="";
while($row2 = mysqli_fetch_assoc($select1)){
$univ_name=$row2['univ_name'];
$list_degree_type=$row2['list_degree_type'];
$major=$row2['major'];
}






echo '




								<article class="col-sm-3 isotopeItem '.$location.'">
<div class="pinBox" style="padding:5px;">										<!--<figure>';
if($users_pic)echo '
											<img alt="'.$users_name.'" src="'.$users_pic.'" style="width:265px;height:270px" class="img-responsive">';
else echo '
 <img alt="'.$users_name.'" src="images/avtar.png"  style="width:265px;height:270px" class="img-responsive">
';
echo '
										</figure>-->

										<section class="boxContent" style="max-width:265px;">
<h2 style="font-weight:bold;margin:0 0 0.3em 0">'.$users_name.'</h2>';
if($list_degree_type && $major && $univ_name)
echo '
<h5 style="margin:0 0 0.3em 0" >'.$list_degree_type.' in '.$major.' from '.$univ_name.'</h5>';
elseif($univ_name && !$list_degree_type && !$major)echo '
<h5 style="margin:0 0 0.3em 0" >'.$univ_name.'</h5>';
elseif($list_degree_type && $major && !$univ_name)
echo '<h5 style="margin:0 0 0.3em 0" >'.$list_degree_type.' in '.$major.'</h5>';
elseif($list_degree_type && !$major && !$univ_name)
echo '<h5 style="margin:0 0 0.3em 0" >'.$list_degree_type.'</h5>';
else
echo '<h5  style="margin:0 0 0.3em 0">Details not available</h5>';
echo'
<a href="user-profile.php?id='.$user_id.'" class="moreLink">&rarr; Check Profile</a>
 <ul class="pinInfo"><br>
 <div class="iconLinks pull-right">';
echo'
                                                                                                </div>
</ul>
										</section>

</div>								</article>


';







}
?>


</div>






<!-- footer --></div>
<div class="row">
<div class="col-md-12">

                                                                        <blockquote>
<p>The aim of education should be to teach us how to think, rather than what to think. To improve our minds, so as to enable us to think for ourselves, rather than to load the memory with thoughts of other men.
</p><small> Bill Beattie</small>                                                                        </blockquote>
                                                                </div>




</div>







</div></section></section></section>
<?php include 'footer.php'; ?>
							</div>
			<!-- global wrapper -->
<!-- End Document 
	================================================== -->
	<script type="text/javascript" src="js-plugin/respond/respond.min.js"></script>
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
$.post('Loginvalidate/resend_confirmation_email.php',{'email' : email}, function(data) {
if(data)
alert(data);
});
}
//});
</script>
<?php include 'analyticstracking.php'; ?>
</body>
</html>

