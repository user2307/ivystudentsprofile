<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$crurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$id=$_SESSION['id'];
$bid=$_GET['bid'];
include "../database.php";
$check= "SELECT * FROM Blogs WHERE id=$bid";
$see= mysqli_query($conn, $check);
if (!(mysqli_num_rows($see) > 0) ) {
echo "<script>alert('You are trying to access an invalid link');window.location.href='http://www.ivystudentsprofile.com/';</script>";
}

$sql = "SELECT * FROM Blogs WHERE id=$bid";
 $select = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($select)){

    $title = $row['title'];
$content=$row['content'];
$date=$row['date'];
}
$sq="SELECT id from Blogs order by id desc limit 1";
$qw= mysqli_query($conn, $sq);
$last=mysqli_fetch_assoc($qw);
$lbid=$last['id'];
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
	<title><?php  echo $title; ?></title>
	<meta name="description" content="Read stories about exceptional people all around the world, acquire knowledge and stay informed">
<meta property="og:url"           content="<?php echo $crurl; ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?php echo $title; ?>"/>
    <meta property="og:description"   content="<?php echo $content; ?>" />
 <!--   <meta property="og:image"         content="http://www.ivystudentsprofile.com/images/logo3.png" />-->
<meta property="fb:app_id" content="1483905305244715" />
<?php include "../css/includecsshead.php" ?>
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
.justify{
text-align:justify;
font-family:verdana;
}
i.iconRounded.icon-coffee:hover{
background:none !important;
color:#d34932;
border: 1px dashed #d34932;
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
							<h1>Blog post</h1>
							<p>Stay informed</p>
						</div>
						<div class="col-sm-6 hidden-xs">
							<ul id="navTrail">
								<li><a href="http://www.ivystudentsprofile.com">Home</a></li>
						<!--		<li><a href="http://www.ivystudentsprofile.com/blogs/">Blog</a></li>-->
								<li id="navTrailLast">Blog post</li>
							</ul>
						</div>
					</div>
				</div>
			</header>
			<section id="content" class="pt30 mb30">
				<div class="container">
					<div class="row">
						<div class="col-md-8">

							<article class="post clearfix">
				<!--				<div class="postPic">
									<div class="imgBorder mb15">
										<a href="blog-post.html"><img src="images/blog/blog-pic2.jpg" alt="" class="img-responsive"/></a>
									</div>
								</div>-->
								<div class="row">
									<div class="postMeta col-sm-1 col-xs-2">
										<i class="iconRounded icon-coffee"></i>
									</div>

									<section class="col-sm-11 col-xs-10">
										<h2><a href="blog-post.html"><?php echo htmlspecialchars_decode($title); ?></a></h2>
										<ul class="entry-meta">
											<li class="entry-date"><i class="icon-pin"></i>&nbsp;<?php echo  date("j-M-Y",strtotime($date)); ?></li>
										<!--	<li class="entry-category"><a href="#"><i class="icon-th-list"></i>&nbsp;category</a></li>
											<li class="entry-author"><a href="#"><i class="icon-male"></i>&nbsp;Admin</a></li>
											<li class="entry-comments"><a href="#"><i class="icon-comment-1"></i>&nbsp;12 comments</a></li>
										--></ul>
<p class="justify">
<?php echo nl2br(htmlspecialchars_decode($content)); ?>
</p>
									</section>
								</div>
							</article>

							<hr>
							<ul class="pager">
<?php if($bid>1) echo'
								<li><a href="http://www.ivystudentsprofile.com/blogs/?bid='.($bid-1).'"><i class="icon-left-open-mini"></i>&nbsp;Previous</a></li>';

?>
<?php if($lbid != $bid) echo'
								<li><a href="http://www.ivystudentsprofile.com/blogs/?bid='.($bid+1).'">Next&nbsp;<i class="icon-right-open-mini"></i></a></li>
				';
?>
			</ul>

					</div>

					<!-- Sidebar -->
					<aside class="col-md-4">
						<section>
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
<br><br>
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
						</section>

					</aside>
				</div><!-- row -->
<div class="row">
<div class="col-md-8 col-md-offset-0">
<div align="center">
<table><tbody><tr><td valign="top" style="vertical-align:top !important;padding: 0;margin: 0">
<div class="fb-share-button" data-href="<?php echo $crurl; ?>" data-layout="button_count" ></div>
</td><td style="padding-left:20px;"><a href="https://twitter.com/share" class="twitter-share-button" data-via="ivyprofiles" data-hashtags="ivystudentsprofile">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</td><td style="padding-left:20px;">
<a href="//gb.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-color="red"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a>
<!-- Please call pinit.js only once per page -->
<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
</td></tr></tbody></table>
</div></div>
</div>
			</div><!-- container -->
		</section>
	<!-- content -->
											<?php include '../footer.php'; ?>	
							</div>

<?php 
include '../js/commonjs.php'; 
include '../analyticstracking.php'; ?>
</body>
</html>

