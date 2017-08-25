<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
$id=$_SESSION['id'];
if ($id) {
      // redirect to your login page
header("Location:user.php");//?id=$id");
}
$value=$_GET['value'];
if($value!='login' && $value)
header("Location:http://www.ivystudentsprofile.com/");
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
	<title>Ivystudentsprofile - Connecting admitted and prospective university students</title>
	<meta name="description" content="Login to Ivystudentsprofile to submit your essays or view profiles of students admitted to Stanford, Yale, Columbia, Harvard, Duke, Upenn, Princeton, Brown, Cornell and other universities in US, Europe, Asia and Australia."
	<meta name="author" content="Ivystudentsprofile">
<meta name="p:domain_verify" content="ffbf3f030e74ce7dbadad6af3ad0b34a"/>
<meta name="alexaVerifyID" content="rjtMIWO1UnARsszuS_-JX2r9udw"/>
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
<!-- Revolution Slider -->
	<link rel="stylesheet" type="text/css" href="js-plugin/revolution-slider/rs-plugin/css/navstylechange.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="js-plugin/revolution-slider/rs-plugin/css/settings-hideo.css" media="screen" />

	<!-- nekoAnim-->
	<link rel="stylesheet" type="text/css" href="js-plugin/appear/nekoAnim.css" />
	<!-- icon fonts -->
	<link type="text/css" rel="stylesheet" href="font-icons/custom-icons/css/custom-icons.css">
	<link type="text/css" rel="stylesheet" href="font-icons/custom-icons/css/custom-icons-ie7.css">
	<!-- Custom css -->
	<link type="text/css" rel="stylesheet" href="css/layout.css">
	<link type="text/css" id="colors" rel="stylesheet" href="css/red.css">
	<link type="text/css" rel="stylesheet" href="css/custom.css">
	<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
	<script src="js/modernizr-2.6.1.min.js"></script>
<!-- Favicons
	================================================== -->
<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="images/apple-touch-icon-144x144.pnpt">

  <script src="https://apis.google.com/js/api:client.js"></script>
 <link type="text/css" rel="stylesheet" href="css/jquery.fadeshow-0.1.1.min.css">
<style>
@media only screen and (max-width: 400px) {
h1{
font-size:30px;
}
}
@media only screen and (max-width: 1000px) {
div.col-md-6{
border-left:none !important;

}
}
@media only screen and (min-width: 995px) {
#horizontal{
display:none;
}
}
.btn-info:hover{
background:#49AFCD;
border-color:#49AFCD;

}
.btn-md:hover{
border-color:transparent;
}
.form-control:focus{
border-style:solid;
}
.form-control{

height:30px;
padding:5px;
}
label{
font-size:15px;


    clear: both;
    float:left;
  margin-bottom:0px;
}
  


  #customBtn {
      display: inline-block;
      background: #A20202;
      color: white;
      width: 190px;
      border-radius: 4px;
      white-space: nowrap;
    }
    #customBtn:hover {
      cursor: pointer;
    }
    span.label {
      font-weight: normal;
    }
    span.icon {
  //    background: url('/identity/sign-in/g-normal.png') transparent 5px 50% no-repeat;
      display: inline-block;
      vertical-align: middle;
    //  width: 42px;
      height: 34px;
//      border-right: #2265d4 1px solid;
    }
    span.buttonText {
      display: inline-block;
      vertical-align: middle;
      //padding-left: 12px;
 //     padding-right: 42px;
      font-size: 14px;
      font-weight: normal;
      /* Use the Roboto font that is loaded in the <head> */
      font-family: 'custom-icons';
    }
#email1 {
  text-transform: lowercase;
}
::-webkit-input-placeholder { /* WebKit browsers */
    text-transform: none;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    text-transform: none;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
    text-transform: none;
}
:-ms-input-placeholder { /* Internet Explorer 10+ */
    text-transform: none;
}
#name{
text-transform:capitalize;
}
a{
cursor:pointer;
}
.iconRounded:hover{

    background-color: white;
    color: #d34932;
    text-shadow: 0 0 5px #FFF;
    border-style: dashed;
}
ul.quickMenu li a{
color:#ffffff;
}
ul.quickMenu li a:hover{
color:lightgray;
}
.social-network>li{
display:inline;
}
.modify{
color:#ffffff;
border:1px solid white;
}
.modify:hover{
border:1px solid lightgray;
color:lightgray;
background:none;
text-shadow:none;
}
.btn-success:hover{
background-color: #47a447;
    border-color: #398439;
}
</style>

</head>
<body  class="activateAppearAnimation"  >
<div id="fb-root"></div>
<input type="hidden" value="<?php echo  $_SESSION['url'];?>" id="redirect"  >
<input type="hidden" value="<?php echo  $value;?>" id="value"  >
<script>


  var googleUser = {};
  var startApp = function() {
    gapi.load('auth2', function(){
      // Retrieve the singleton for the GoogleAuth library and set up the client.
      auth2 = gapi.auth2.init({
        client_id: '5412424443-a40hp4nnep6ohb3o398kgv3djm0mifq1.apps.googleusercontent.com',
        cookiepolicy: 'single_host_origin'
        // Request scopes in addition to 'profile' and 'email'
        //scope: 'profile,email'
      });
      attachSignin(document.getElementById('customBtn'));
    });
  };

  function attachSignin(element) {
    console.log(element.id);
    auth2.attachClickHandler(element, {},
        function(googleUser) {
    var gname=googleUser.getBasicProfile().getName();
var gmail=googleUser.getBasicProfile().getEmail();
var g_id=googleUser.getBasicProfile().getId();
var img=googleUser.getBasicProfile().getImageUrl();
$.post('Loginvalidate/gmailsignup.php', {'email' : gmail,'name':gname,'g_id':g_id,'img':img}, function(data) {
var redirect_link=$("#redirect").val();
if(redirect_link)
window.location.href="http://www.ivystudentsprofile.com"+redirect_link;
else
window.location.href="http://www.ivystudentsprofile.com/user.php?id="+data;
  });

        }, function(error) {
          alert(JSON.stringify(error, undefined, 2));
        });
  }

window.fbAsyncInit = function() {
    FB.init({
        appId   : '1483905305244715',
       oauth   : true,
        status  : true, // check login status
        cookie  : true, // enable cookies to allow the server to access the session
        xfbml   : true, // parse XFBML
version:'v2.4'
    });

  };

function checkLoginState(){
    FB.login(function(response){

        if (response.authResponse) {
            console.log('Welcome!  Fetching your information.... ');
        //    console.log(response); // dump complete info
            access_token = response.authResponse.accessToken; //get access token
            user_id = response.authResponse.userID; //get FB UID
console.log(user_id);
            FB.api('/me?fields=id,name,email', function(response) {
                name = response.name; //get user email
          // you can store this data into your database           
email = response.email;
if(!email)
{
alert("It seems you have not registered/confirmed your email with facebook or haven't given permission to access your email. Retry or signup with email to continue.");
}




else
{
 $.post('Loginvalidate/facebooksignup.php', {'email' : email,'name':name, 'f_id':user_id}, function(data) {
var redirect_link=$("#redirect").val();
if(redirect_link)
window.location.href="http://www.ivystudentsprofile.com"+redirect_link;
else

window.location.href="http://www.ivystudentsprofile.com/user.php?id="+data;

    });
}
});

        } else {
            //user hit cancel button
            console.log('User cancelled login or did not fully authorize.');

        }
    }, {
        scope: 'public_profile,email'
    });
}
(function() {
    var e = document.createElement('script');
    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
    e.async = true;
    document.getElementById('fb-root').appendChild(e);
}());

/*function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail());
}*/




</script>
<div id="globalWrapper" >
<header class="navbar-fixed-top">
			
			<!-- header -->
			<div id="mainHeader" role="banner">
				<div class="container">
					<nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<!-- responsive navigation -->
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<!-- Logo -->
<a class="navbar-brand" href="http://www.ivystudentsprofile.com" ><img src="../images/logo3.png"  alt="Ivystudentprofiles" /></a>						
</div>
						<div class="collapse navbar-collapse" id="mainMenu">
							<!-- Main navigation -->
							<ul class="nav navbar-nav pull-right">

								<li class="primary">
									<a href="/about/about-us.php" class="firstLevel" >About us</a>
								</li>

								<li class="sep"></li>

								<li class="primary"> 
									<a href="/about/get-featured.php" class="firstLevel" >Get Featured</a>
								</li>

								<li class="sep"></li>

								<li class="primary">
									<a href="/ReviewEssay/reviewer.php" class="firstLevel">Become a Reviewer</a>

								</li>
  <li class="sep"></li>
   <li class="primary">
                                                                        <a href="/blogs/?bid=1" class="firstLevel">Blogs</a>

                                                                </li>

								<li class="sep"></li>

								<li class="primary">
									<a href="/contact.php" class="firstLevel">Contact us</a>
								</li>

<a class="btn btn-sm btn-success" style="margin-top:30px;" href="#page" id="bbr"><i class="icon-login" style="display:inline;float:none;"></i>Login / Signup</a>
		
					</ul>
							<!-- End main navigation -->
						</div>
					</nav>
				</div>
			</div>
		</header>
		<!-- header -->
<!-- ======================================= content ======================================= -->
		<!-- slider -->
		<section id="rsDemoWrapper">

			<div class="tp-banner-container">
				<div class="tp-banner" >
					<ul>	<!-- SLIDE  -->

			<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
				<!-- MAIN IMAGE -->
				<img src="/images/slider/slide1.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
				<!-- LAYERS -->
<!-- LAYER NR. 1 -->
							<div class="tp-caption largeblackbg  tp-resizeme"
							data-x="center" data-hoffset="0"
							data-y="150"
							data-speed="600"
							data-start="1400"
							data-endspeed="600"
							>
Connect with university students
						</div>

						<!-- LAYER NR. 2 -->
						<div class="tp-caption medium_bg_darkblue customin customout tp-resizeme"
						data-x="center" data-hoffset="0"
						data-y="250"
						data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="600"
						data-start="2400"
						data-easing="Power4.easeOut"
						data-endspeed="600"
						data-endeasing="Power0.easeIn"
						style="z-index: 3">View admission profiles of students admitted to top universities

					</div>

					<!-- LAYER NR. 3 -->
		<!--			<div class="tp-caption medium_bg_asbestos customin customout tp-resizeme"
					data-x="center" data-hoffset="0"
					data-y="bottom" data-voffset="-140"
					data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
					data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
					data-speed="600"
					data-start="2700"
					data-easing="Power4.easeOut"
					data-endspeed="600"
					data-endeasing="Power0.easeIn"
					style="z-index: 4">Get your essays reviewed by top university graduates
				</div>
-->
</li>
<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
				<!-- MAIN IMAGE -->
				<img src="images/slider/slide1.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
				<!-- LAYERS -->
				<!-- LAYER NR. 2 -->
				<div class="tp-caption  largeblackbg  skewfromleft tp-resizeme"
				data-x="20" data-hoffset="0"
				data-y="200"
				data-speed="600"
				data-start="1400"
				data-easing="Power4.easeOut"
				data-endspeed="600"
				data-endeasing="Power0.easeIn"
				style="z-index: 3">Build your admission profile

			</div>

			<!-- LAYER NR. 3 -->
			<div class="tp-caption medium_bg_orange skewfromleft tp-resizeme"
			data-x="20" data-hoffset="0"
			data-y="280"
			data-speed="600"
			data-start="1800"
			data-easing="Power4.easeOut"
			data-endspeed="600"
			data-endeasing="Power0.easeIn"
			style="z-index: 3">Register as a reviewer or submit essay for review

		</div>

		<!-- LAYER NR. 4 -->
<!--		<div class="tp-caption medium_light_white skewfromleft tp-resizeme"
		data-x="20" data-hoffset="0"
		data-y="320"
		data-speed="600"
		data-start="2200"
		data-easing="Power4.easeOut"
		data-endspeed="600"
		data-endeasing="Power0.easeIn"
		style="z-index: 3"><strong>made with love</strong> by Little Neko

	</div>
-->
</li>

</ul>
</div>
</div>

</section>
<!-- slider -->

	<!-- services -->
	<section id="services">
		<div class="col-md-12 text-center pt30 pb30">
			<h1>What's in store for you?</h1>
			<p>We are doing a couple of things you might be interested in</p>
		</div>
		<div class="container pb30 pt30 ">

			<div class="row">
				<div class="col-md-6">
					<div class="boxIconServices posLeft clearfix">
						<i class="icon-edit iconBig iconRounded"></i>
						<div class="boxContent">
							<h2>Build Your Admission Profile</h2>
							<p>Submit your essays, test scores, recommendation<br/>letters and scholarship details for future students' reference</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="boxIconServices clearfix">
						<i class="icon-docs iconBig iconRounded"></i>
						<div class="boxContent">
							<h2>View Admission Profiles of Top University Graduates</h2>
							<p>View admission profiles of students admitted to top universities all around the world</p>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="boxIconServices posLeft clearfix">
						<i class="icon-globe iconBig iconRounded"></i>
						<div class="boxContent">
							<h2>Connect With University Graduates</h2>
							<p>Connect with admitted students and university <br>graduates in any country</p>
						</div> 
					</div>
				</div>

				<div class="col-md-6">
					<div class="boxIconServices clearfix">
						<i class="icon-cog iconBig iconRounded"></i>
						<div class="boxContent">
							<h2>Get Your Admission Profile and Essays Evaluated</h2>
							<p>Get your essays reviewed by graduates from top universities</p>
						</div>
					</div>
				</div>

			</div>

		</div>
	</section>
	<!-- services -->
<!-- services -->
			<section id="services">
				<div class="container pt40 pb40">

					<div class="row">
						<div class="span12 text-center mb40">
							<h1>Our Top Profiles</h1>
							<h2 class="subTitle">Connect with students and graduates all around the world</h2>
						</div>
					</div>


					<div class="row">
<?php
include "database.php";
$stm="SELECT * from LoginDetails where active=1 ORDER BY rand()  limit 3";
$exec=mysqli_query($conn,$stm);
while($ele= mysqli_fetch_assoc($exec)){
$usrid=$ele['user_id'];
$name=$ele['name'];
$user_pic=$ele['user_pic'];
if(!$user_pic)
$user_pic="/images/avtar.png";
$sql1="SELECT * FROM UserProfile where user_id=$usrid";
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
								<a href="/user-profile.php?id=<?php echo $usrid; ?>">
									<div class="imgBorder">
										<img class="img-circle img-responsive" src="<?php echo $user_pic; ?>" alt="" />
									</div>
									<h2><?php echo $name;?></h2>
									<p><?php if($list_degree_type && $major && $univ_name)
echo $list_degree_type.' in '.$major.' from '.$univ_name;
elseif($univ_name && !$list_degree_type && !$major)
echo $univ_name;
elseif($list_degree_type && $major && !$univ_name)
echo $list_degree_type.' in '.$major;
elseif($list_degree_type && !$major && !$univ_name)
echo $list_degree_type;
else
echo 'Details not available';
   ?></p>
								</a>
							</article>
                                                 </div>

<?php
}

?>					


					</div>
				</div>
			</section>
<div class="container">
<div class="row">
					<div class="col-md-12 mb40 mt40">
						<hr class="lineLines">
					</div>
				</div>
</div>
			<!-- services -->
<section id="page">
			<section id="content" class="mt30 pb30" style="margin-top:0px;">
				<div class="container" >
					<div class="row">


						
						<div class="col-md-6 col-md-offset-3 boxFocus" style="margin-bottom:0px;background:white;text-align:center;z-index:3">
<h1 style="color:gray;font-weight:bold">Ivystudentsprofile</h1><h3 style="color:lightgray;font-family:serif;font-weight:bold">Connecting admitted and prospective university students</h3>
						
<div class="col-md-6"  id="col-1">

<a class="btn btn-md btn-info icon icon-twitter-squared" style="min-width:190px;"  href="twitter/redirect.php"  id = "loginTwitter">Continue With Twitter</a>
<!--<a href="twitter/redirect.php"><input type = "button" id = "loginTwitter" class = "btn btn-primary"  value = "Login | Twitter "/></a>
-->
<br><br>

<a class="btn btn-md  icon icon-facebook-squared"   onclick="checkLoginState();"   style="background-color:#507cc0;color:white"   title="Signup with facebook"  >
Continue With Facebook
  </a>
<br><br>
<!--<a class='btn-md  icon icon-gplus-squared' onclick="onSignIn();"  style='min-width:190px;background:#A20202;color:white' >
 
Sign Up With Google  </a>
-->
<!--<div class="btn-md  icon icon-gplus-squared"   data-onsuccess="onSignIn"></div>
-->
<div id="gSignInWrapper">
    <div id="customBtn" class="customGPlusSignIn">
      <span class="icon"></span>
      <span class="buttonText icon icon-gplus-squared" style="padding-top:8px;">Continue With Google</span>
    </div>
  </div>
 <script>startApp();</script>
<br><br>
<a  class="pull-left" style="color:gray;font-weight:bold" id="link1">Sign Up With Email.</a><p style="text-align:justify">&nbsp;&nbsp;By signing up you agree that you have read and agree to the <a href="about/tos.php" style="color:gray;">Terms of Service</a>.</p>










</div>
<div class="col-md-6" style="background:white;display:none;" id="col-2">

<h2 class="subTitle pull-left" style="font-weight:bold;" >SIGNUP</h2>
<form method="post"   id="contactfrm1" role="form" class="mb15 pb40" >

										<div class="form-group" >
<label >Full Name</label>
											<input type="name" class="form-control" style="display:inline" name="name" id="name" title="Please enter your full name" placeholder="Name" required/>
										</div>
<label >Email</label>

<div class="form-group">
<input type="text" class="form-control" style="display:inline"       name="email" id="email1" placeholder="Email Address"  title="Please enter a valid email address"/ required>
										</div>
<label >Password</label>

<div class="form-group">
											<input type="password"  style="display:inline"  class="form-control" name="password" id="password1" placeholder="Password"   title="Please enter your password (at least 6 characters long)" required/>
										</div>
										

										
<p style="text-align:justify">By clicking "Sign Up" you indicate that you have read and agree to the <a href="about/tos.php" style="color:gray;">Terms of Service</a>.	</p>
<a class="btn btn-sm btn-primary pull-right"   id="submit1">Signup</a>

<a  style="color:gray;" class="pull-left" id="cancel">Cancel</a>



									</form>















</div>

<hr id="horizontal" style="border-color:lightgray;border-width:1px;" >
<div class="col-md-6" style="margin-bottom:0px;background:white;text-align:center;border-left:1px solid lightgray;">
<h2 class="subTitle" style="font-weight:bold;float:left;">LOGIN</h2>
<form method="post" onsubmit="return proceed();"  id="contactfrm" role="form" class="pb40" >

										<div class="form-group">
											<input type="email" style="display:inline"  class="form-control"   name="email" id="email" placeholder="Email" title="Please enter a valid email address"/>
										</div>
<div class="form-group">
											<input type="password" class="form-control"  name="password" id="password" placeholder="Password"  title="Please enter your password" required/>
										</div>

										
<a href="forgot-password.php" class="pull-left" style="color:gray">Forgot password?</a>
										<button name="submit" type="submit" class="btn btn-sm btn-primary pull-right" id="submit">Login</button>

									</form>
</div>













						
						</div>

					</div>


</div>








</section>



<!-- footer -->
					<div id="footerWrapper" class="footer4">
<section id="mainFooter">
</section>
						<section  id="footerRights">
							<div class="container">
								<div class="row">


									<div class="col-md-6">
<ul class="social-network">
   <li><a href="https://www.facebook.com/ivystudentsprofile?ref=hl" target="_blank"  class="tips" title="Like us on Facebook" data-original-title="Like us on Facebook"><i class="icon-facebook-1

iconRounded modify"></i></a></li>
                                                <li><a href="http://twitter.com/ivyprofiles" class="tips" target="_blank" title="Follow us on Twitter" data-original-title="Follow us on Twitter"><i class="icon-twitter-bird

iconRounded modify"></i></a></li>
        <!--                                    <li><a href="#" class="tips" title="" data-original-title="follow me on Google+"><i class="icon-gplus-1

iconRounded"></i></a></li>-->
                                                <li><a href="https://www.linkedin.com/company/ivystudentsprofile?trk=prof-following-company-logo"  target="_blank" class="tips" title="Follow us on Linkedin" data-original-title="Follow us on Linkedin"><i class="icon-linkedin-1

iconRounded modify"></i></a></li>

                                            <li><a href="https://in.pinterest.com/ivyprofiles/" class="tips" target="_blank" title="Follow us on Pinterest" data-original-title="Follow us on Pinterest"><i class="icon-pinterest-circled

iconRounded modify"></i></a></li>
                                        </ul>


</div>
  <div class="col-md-6">
                                                                                <ul class="quickMenu" style="text-transform:uppercase">
                                                                                        <li><a href="about/policy.php" class="linkLeft">Privacy Policy</a></li>
                                                                                        <li><a href="about/tos.php">Terms of Service</a></li>
                                                                                        <li><a href="/sitemap/">Sitemap</a></li>
                                                                                </ul>
<p class="quickMenu">Copyright  &#9400; 2015-2016 <a href="http://www.ivystudentsprofile.com/" target="blank" style="color:#999">Ivystudentsprofile</a> / All rights reserved.</p>
                                                                        </div>




								</div>
							</div>
						</section>
					</div>
					<!-- End footer -->




			</section></div>
<!-- End Document 
	================================================== -->
 <script type="text/javascript" src="js-plugin/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="js-plugin/respond/respond.min.js"></script>
	<script type="text/javascript" src="js-plugin/jquery-ui/jquery-ui-1.8.23.custom.min.js"></script>
	<!-- third party plugins  -->
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js-plugin/easing/jquery.easing.1.3.js"></script>
	<!-- carousel -->
	<script type="text/javascript" src="js-plugin/owl.carousel/owl-carousel/owl.carousel.min.js"></script>
	<!-- pop up -->
	<script type="text/javascript" src="js-plugin/magnific-popup/jquery.magnific-popup.min.js"></script>
	<!-- isotope -->
	<script type="text/javascript" src="js-plugin/isotope/jquery.isotope.min.js"></script>
	<!-- form -->
	<script type="text/javascript" src="js-plugin/neko-contact-ajax-plugin/js/jquery.form.js"></script>
	<script type="text/javascript" src="js-plugin/neko-contact-ajax-plugin/js/jquery.validate.min.js"></script>
	<!-- parallax -->
	<script type="text/javascript" src="js-plugin/parallax/js/jquery.stellar.min.js"></script>
	
	<!-- appear -->
	<script type="text/javascript" src="js-plugin/appear/jquery.appear.js"></script>
<!-- Revolution slider -->
	<script type="text/javascript" src="js-plugin/revolution-slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
	<script type="text/javascript" src="js-plugin/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<!-- Custom  -->
	<script type="text/javascript" src="js/custom.js"></script>
 <script src="js/jquery.fadeshow-0.1.1.min.js"></script>
<script type="text/javascript" src="/js/jquery.noty.packaged.js"></script>
<script>

$(window).on('hashchange', function(e){
    history.replaceState ("", document.title, e.originalEvent.oldURL);
});

//?value=login#page
function scrollToElement(ele) {
    $(window).scrollTop(ele.offset().top).scrollLeft(ele.offset().left);
}
var value=$("#value").val();
if(value=="login")
scrollToElement($('#page'));


$(window).scroll(function() {
//var w=$(this).width();
//alert(w);
if ($(this).scrollTop() > 1 && $(this).width()>1024){
    $('#bbr').attr('style','margin-top:15px');
  }
//else if($(this).width()>1023 && $(this).width()<=1024){
// $('#bbr').attr('style','margin-top:15px');
//}


else
 $('#bbr').attr('style','margin-top:30px');
});

$("#link1").click(function(){

$("#col-1").hide();
$("#col-2").show();
});
$("#cancel").click(function(){

$("#col-2").hide();
$("#col-1").show();
});



/*var cnt=0, bg;
var $body = $('body');
var arr = ['login1.jpg','login2.jpg','login3.jpg'];
//var arr = [1, 2];

var bgrotater = setInterval(function() {
    if (cnt==3) cnt=0;
    bg = 'url("images/' + arr[cnt] + '")';
//    bg = 'url("images/login' + arr[cnt] + '")';
    cnt++;
    $body.css({'background': bg +' repeat-y center fixed', 'background-size':'cover', 'background-transition': '2.0s'});
}, 5000);
*/
/*$(function(){
$(".background").fadeShow({
 

	// the aspect fill will be intact even when resizing the window

	//only handy for full width / height slideshows, otherwise slows your page down

	correctRatio: true,

	 

	// the slides will be shuffled before shown, get a unique slider each refresh

	shuffle: true,

	 

	// milliseconds per slide

	speed: 10000,

	 

	// images (urls) to create the slideshow with, array of strings

	images: ['/images/login1.jpg', '/images/login2.jpg','/images/login3.jpg']

	 

	});

});*/
/*function validate(){
    var emailVal = $('#email1').val(); // assuming this is a input text field
var name=$('#name').val();
var password=$("#password1").val();
    $.post('Loginvalidate/signup.php', {'email' : emailVal,'password':password,'name':name}, function(data) {
        if(data=='exist') {
alert("Email address already exists. Please choose a different email address");
//return false;
}
        else 
{
 checkemail();
}
    });
}
*/
/*function checkemail()
{
 var emailVal = $('#email1').val(); // assuming this is a input text field
var name=$('#name').val();
var password=$("#password1").val();

 $.post('Loginvalidate/checkemail.php', {'email' : emailVal,'password':password,'name':name}, function(data) {
        if(data=='success') {
window.location.href="http://www.ivystudentsprofile.com";
}
    });


}
*/
function generateAll() {
        generate('top');
}

 function generate(layout) {
        var n = noty({
            text        : "Your Confirmation link Has Been Sent To Your Email Address. Please confirm your email-address to verify your account.",//layout,
            type        : 'alert',
            dismissQueue: true,
            layout      : layout,
            theme       : 'relax'
        });
        console.log('html: ' + n.options.id);
var nn=document.getElementById('noty_top_layout_container');
$('header').prepend(nn);
    }
$('#submit1').click(function() {
 var emailVal = $('#email1').val(); // assuming this is a input text field
var name=$('#name').val();
var password=$("#password1").val();
 $.post('Loginvalidate/validate.php',{'email' : emailVal,'password':password,'name':name}, function(data) {

if(data=="success")
//window.location.href="http://www.ivystudentsprofile.com";
{
//alert("Your Confirmation link Has Been Sent To Your Email Address.");
generateAll()
}
else
//validate();
//checkemail();
alert(data);
});
});
function proceed(){

 var emailVal = $('#email').val();
var password=$("#password").val();
$.post('Loginvalidate/login.php',{'email' : emailVal,'password':password}, function(data) {
if(data=="matched")
{
var redirect_link=$("#redirect").val();
if(redirect_link)
window.location.href="http://www.ivystudentsprofile.com"+redirect_link;
else

window.location.href="http://www.ivystudentsprofile.com/user.php";
}

else
{
//alert("The password and email id do not match. Please try again.");
alert (data);
return false;
}
});
}
</script>
<?php include 'analyticstracking.php'; ?>
</body>
</html>
