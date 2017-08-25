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
<?php

include "../database.php";
$sql = "SELECT * FROM LoginDetails WHERE user_id=". $_SESSION['id'];
 $select = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($select)){

    $name = $row['name'];
$com_code=$row['com_code'];
$email=$row['email'];
$user_pic=$row['user_pic'];
}

?>
<html lang="en">
<!--<![endif]-->
<head>
<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Submit Your Story - Ivystudentsprofile</title>
<meta property="og:url"           content="http://www.ivystudentsprofile.com/about/get-featured.php" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Get Featured: Ivystudentsprofile" />
    <meta property="og:description"   content="Feature your life story on Ivystudentsprofile and be an inspiration to people struggling to make it big." />
    <meta property="og:image"         content="http://www.ivystudentsprofile.com/images/logo3.png" />
<meta property="fb:app_id" content="1483905305244715" />
	<meta name="description" content="Feature your life story on Ivystudentsprofile and be an inspiration to people struggling to make it big.">
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
 li{
text-align:justify;
}

</style>

</head>
<body class="activateAppearAnimation">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1483905305244715";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div id="globalWrapper">
<?php if($id)
include '../header.php';
else
include '../header_notloggedin.php';
?>
<section id="page">
<!--<header class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-sm-8">
							<h1>Get Featured</h1>
						</div>
						<div class="col-sm-4 hidden-xs">
							<ul id="navTrail">
								<li><a href="index.html">Home</a></li>
								<li id="navTrailLast">Get Featured</li>
							</ul>
						</div>
					</div>
				</div>
			</header>

-->
<section  class="mt15">


					
					<div class="container">
						<div class="row"> 
							<div class="span12 text-left mb40">
								<h1>Get Featured</h1>
								<h2 class="subTitle">Share your life story and inspire others </h2>
							</div>
</div></div></section>
<section id="content" class="pb30">
					<div class="container">
						<div class="row">
							<div class="col-md-10 boxFocus pt30 mb30">



<h2>Tell your story</h2>
								<p style="font-family:verdana;text-align:justify">
We believe that every person is special and has a unique story to tell. So what sets you apart? Did you face spine-chilling hurdles as a kid but had the guts to overcome every obstacle to reach your goal? Does your life represent a story that can serve as an inspiration to many others?								
</p>
<p style="font-family:verdana;text-align:justify">
If the answer to the above questions is 'yes', we present to you an opportunity to share your story with the world. Write to us and we will feature you on Ivystudentsprofile ensuring that your story reaches to maximum people possible.

</p>
<p style="font-family:verdana;text-align:justify">
Mentioned below are the guidelines that you must adhere to while sending your entry:

</p>
								<div class="row mb15">
									<div class="col-sm-12">
										<ul class="iconList list-unstyled " style="font-family:verdana;text-align:justify">
							<li>Your story must be <b>real one</b> and revolve around your life. We do not accept make-up stories.
</li>
											<li>Mention explicitly all the hurdles, challenges you faced and explain in detail what did you do to overcome those obstacles.</li>
										</ul>
									</div>
								</div>
<p style="font-family:verdana;text-align:justify">
You can send your story at <a href="mailto:ivyprofiles@ivystudentsprofile.com">ivyprofiles@ivystudentsprofile.com</a>. Do not forget to write a short description about yourself and your contact details. We will follow up with you if we need further details.
</p>
<p style="font-family:verdana;text-align:justify">It might take us two weeks to review your work and if you have any questions, do not hesitate to <a href="../contact.php"><b>contact us</b></a>. Yes, we read every email ! 
</p>
<blockquote style="font-family:verdana;text-align:justify">
A Ship in Harbor Is Safe, But that Is Not What Ships Are Built For <small> Grace Hopper</small>
</blockquote>
<p style="font-family: Georgia; font-size:20px;text-align:justify"><em>So write, share and inspire !...</em>
</p>
	
							</div>


<div class="col-md-2">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ivy2 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7323560447153823"
     data-ad-slot="9474028999"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</div>







						</div>
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div align="center">
<table><tbody><tr><td valign="top" style="vertical-align:top !important;padding: 0;margin: 0">
<div class="fb-share-button" data-href="http://www.ivystudentsprofile.com/about/get-featured.php" data-layout="button_count"></div>
</td><td style="padding-left:20px;"><a href="https://twitter.com/share" class="twitter-share-button" data-via="ivyprofiles" data-hashtags="education">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</td><td style="padding-left:20px;">
<a href="//gb.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-color="red"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a>
<!-- Please call pinit.js only once per page -->
<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
</td></tr></tbody></table>
</div></div>
</div>










					</div>
				</section>











<input type="hidden" id="com_code" value=<?php echo $com_code; ?> >
<input type="hidden" id="resend" value=<?php echo $email; ?> >






		<?php include "../footer.php"; ?>	
												
							</div>
			<!-- global wrapper -->
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
<!--<script type="text/javascript" src="../search/search.js"></script>
-->

<script type="text/javascript" src="../js/jquery.noty.packaged.js"></script>
<script>
var tx=document.getElementById('search');
if(tx)
$.getScript("../search/search.js");
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
$.post('../Loginvalidate/resend_confirmation_email.php',{'email' : email}, function(data) {
if(data)
alert(data);
});
}

</script>
<?php include '../analyticstracking.php'; ?>
</body>
</html>

