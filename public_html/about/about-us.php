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
	<title>About Us: Ivystudentsprofile</title>

	<meta name="description" content="Connecting admitted and prospective university students, helping prospective students in their essay review process by reaching out to admitted university students and graduates.">
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
p, li{
text-align:justify;
}
//h2:after{
//border:none;
//}
h2,h5,h6{
//font-weight:bold;
}
h6{
display:inline;
}
.justify{
text-align:justify;
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
<section id="content" class="mt30 pb30">
<section id="aboutUs" class="pt30 pb3">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<h2>Our mission:</h2>
								<h3 class="justify">
To bridge the gap between admitted and prospective students while building innovative software to  consistently solve education related problems

								</h3>
<p>
At Ivystudentsprofile, we are building effective and advanced networking tools  to empower the prospective university students to connect with university graduates.
</p>
								<p>
Lets say, you are applying to Harvard for higher education and you've spent nerve-wracking amount of time composing polished essays while meticulously showcasing your achievements.  Even after crafting a nearly perfect essay, you still wish if there was someone available to review your essay and figure out the loopholes. What do you do? You go ahead ransacking for English professors or you approach educational consultancies that would charge sky-high price to review your essays and application.
</p><p>Now imagine, how good it would have been if you had someone from Harvard at your disposal who's willing to review your essay and overall profile at throwaway price without having to run places? Yes, that's exactly the problem we are trying to solve. Our goal in the coming years is to:

								</p>
								<div class="row mb15">
									<div class="col-sm-6">
										<ul class="iconList list-unstyled borderList">
											<li>Reduce dependency on overseas educational consultancies</li>
											<li>Enable the prospective students to directly connect with university graduates</li>
										</ul>
									</div>
									<div class="col-sm-6">
										<ul class="iconList list-unstyled borderList">
											<li>Seek help and advice directly from college alumni</li>
											<li>Allow future students to peek into profiles of admitted students</li>
										</ul>
									</div>	
								</div>	
							</div>

						</div>
					</div>
				</section>

			
<!-- team 2 -->
				<section id="team2" class="mt15">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h2>Our Team</h2>
							</div> 
						</div>
						<div class="row mb30">
							<div class="col-xs-2">
								<img src="/images/vandana.png" class="img-responsive imgBorder" alt="Vandana Arora" title="Vandana Arora">
							</div>
							<div class="col-xs-10">
								<h3>Vandana Arora &mdash; Founder</h3>
								<p>Ivystudentsprofile was started in 2015 by Vandana Arora with a vision to connect the admitted and prospective university students and to sort out the problems faced by prospective students with regards to their college admission process.<br><br>Vandana has a bachelors in electrical engineering and over three years of work experience in the software industry. She is a programmer, web developer, former systems engineer and an internet entrepreneur. In the past, she has served as a vocational trainee at NTPC and has worked for Infosys and Fixoncloud LLC.    
								</p>
								<a href="mailto:vandana@ivystudentsprofile.com">vandana@ivystudentsprofile.com</a>
								<ul class="socialNetwork mt15">
									<li><a href="https://www.facebook.com/Vandana.arora23" class="tips" target="_blank" title="" data-original-title="Follow me on Facebook"><i class="icon-facebook-1 iconRounded iconSmall"></i></a></li>
									<li><a href="https://twitter.com/Vandana_arora3" target="_blank"  class="tips" title="" data-original-title="Follow me on Twitter"><i class="icon-twitter-bird iconRounded iconSmall"></i></a></li>
									<li><a target="_blank" href="https://www.linkedin.com/in/vandana-arora-60981839" class="tips" title="" data-original-title="Follow me on Linkedin"><i class="icon-linkedin-1 iconRounded iconSmall"></i></a></li>
								</ul>
							</div>
						</div>


<div class="col-md-6">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ivy3 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7323560447153823"
     data-ad-slot="3287894598"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>





					</div>
				</section>



</section>

	</section>


<!-- footer -->
<!--<footer id="footerWrapper" class="footer2">
-->
<footer id="footerWrapper" class="footer2">
        <section id="mainFooter">
                <div class="container">
                        <div class="row">
                                <div class="col-md-6 col-sm-6">
                                        <div class="footerWidget">
                                                <img src="/images/logo3.png" alt="Ivystudentsprofile logo" id="footerLogo">
                                                <p style="text-align:justify"><a href="http://www.ivystudentsprofile.com" title="Ivystudentsprofile">Ivystudentsprofile</a> allows students to upload their college application essays, recommendation letters, resume and scholarship details

on the website and make them available for public viewing. This site aims at enabling prospective graduate students to gain an insight into the profiles of students

who've already been admitted to reputed universities. The prospective students can compare their profiles with the profiles of the admitted students to figure out

their chances of admittance to a particular university.   </p>
<!--<table class="table"><tbody><tr><td><p><em>Help us improve the website</em></p></td><td>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="2288QMXDJ5RTA">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
<input type="hidden" name="return" value="http://www.ivystudentsprofile.com">
</form>






</td></tr></tbody></table>-->
                                        </div>
                                </div>






  <div class="col-md-3 col-sm-6">
                                        <div class="footerWidget">
 <h3>Follow us, we are social</h3>
           <ul class="socialNetwork">
                                                <li><a href="https://www.facebook.com/ivystudentsprofile?ref=hl" target="_blank"  class="tips" title="Like us on Facebook" data-original-title="Like us on Facebook"><i class="icon-facebook-1

iconRounded"></i></a></li>
                                                <li><a href="http://twitter.com/ivyprofiles" class="tips" target="_blank" title="Follow us on Twitter" data-original-title="Follow us on Twitter"><i class="icon-twitter-bird

iconRounded"></i></a></li>
        <!--                                    <li><a href="#" class="tips" title="" data-original-title="follow me on Google+"><i class="icon-gplus-1

iconRounded"></i></a></li>-->
                                                <li><a href="https://www.linkedin.com/company/ivystudentsprofile?trk=prof-following-company-logo"  target="_blank" class="tips" title="Follow us on Linkedin" data-original-title="Follow us on Linkedin"><i class="icon-linkedin-1

iconRounded"></i></a></li>

                                            <li><a href="https://in.pinterest.com/ivyprofiles/" class="tips" target="_blank" title="Follow us on Pinterest" data-original-title="Follow us on Pinterest"><i class="icon-pinterest-circled

iconRounded"></i></a></li>
                                        </ul>
<br>
<h3>Reach out to us</h3>
<address>
										<p>
											<i class="icon-mail-alt"></i>&nbsp;<a href="mailto:contact@ivystudentsprofile.com">contact@ivystudentsprofile.com</a>
										</p>
									</address>                                
</div>
                                </div>

  <div class="col-md-3 col-sm-6">
                                        <div class="footerWidget">
<a height="150" class="twitter-timeline" href="https://twitter.com/ivyprofiles" data-widget-id="641645262323105792">Tweets by @ivyprofiles</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
                                </div>


                        </div>
                </div>
        </section>

	<section id="footerRights">
		<div class="container">
			<div class="row">



				<div class="col-md-12" style="text-align:center">
<a href="about-us.php" style="font-weight:bold;margin-right:30px;">ABOUT US</a>
<a href="policy.php" style="font-weight:bold;margin-right:30px;">PRIVACY POLICY</a>
<a href="tos.php" style="font-weight:bold;margin-right:30px;">TERMS OF SERVICE</a>
<a href="/contact.php" style="font-weight:bold;margin-right:30px;">CONTACT US</a>
<a href="/sitemap/" style="font-weight:bold;margin-right:30px;">SITEMAP</a>
					<p style="text-align:center">Copyright  &#9400; 2015-2016 <a href="http://www.ivystudentsprofile.com/" target="blank">Ivystudentsprofile</a> / All rights 

reserved.</p>
				</div>

			</div>
		</div>
	</section>
</footer>
<!-- End footer -->
												
							</div>
			<!-- global wrapper -->
<!-- End Document 
	================================================== -->
	<script type="text/javascript" src="../js-plugin/respond/respond.min.js"></script>
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
<script type="text/javascript" src="../search/search.js"></script>

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
</script>
<?php include '../analyticstracking.php'; ?>
</body>
</html>

