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
	<title>Essay Reviewers - Ivystudentsprofile</title>
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

</style>
</head>
<body class="activateAppearAnimation">
<!-- Primary Page Layout 
	================================================== -->
	<!-- globalWrapper -->
	<div id="globalWrapper">
<?php if($id)
include '../header.php';
?>
<section id="page">

<section  class="mt15">


					
					<div class="container">
						<div class="row"> 
							<div class="span12 text-center mb40">
								<h1>List of  Essay Reviewers</h1>
<p>We recommend that you send request to at least two reviewers for faster response. </p>
							</div>
</div></div></section>
<section id="content" class="pb30">
					<div class="container">
<div class='row'>
<div class="col-md-10 col-md-offset-1">
<table class="table"><tbody>
<?php
$i=0;
$result_array=[];
$sql="SELECT * from RequestsRecords where sender_id=$id";//find array of users/reviewers to whom i've sent request
$query=mysqli_query($conn,$sql);
while($ele= mysqli_fetch_assoc($query)){
$result_array[] = $ele['reviewer_id'];

}

$details="SELECT * FROM ReviewEssays WHERE is_approved=1";
 $find = mysqli_query($conn, $details);
$count=mysqli_num_rows($find);
if($count>0){
while($row2 = mysqli_fetch_assoc($find)){
$days=$row2['days'];
$price=$row2['price'];
$notes=$row2['notes'];
$userid=$row2['user_id'];
$sql="SELECT * from LoginDetails WHERE user_id=$userid";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($query);
$user_pic=$row['user_pic'];
if(!$user_pic)
$user_pic="http://www.ivystudentsprofile.com/images/avtar.png";
$name=$row['name'];
$sql1="SELECT * FROM UserProfile where user_id=$userid";
$select1=mysqli_query($conn, $sql1);
$univ_name="";
$list_degree_type="";
$major="";
$row10 = mysqli_fetch_assoc($select1);
$univ_name=$row10['univ_name'];
$list_degree_type=$row10['list_degree_type'];
$major=$row10['major'];
?>
<div>
<tr><td>
<a href="http://www.ivystudentsprofile.com/user-profile.php?id=<?php  echo $userid; ?>"><img class="img-circle" style="float:right" src="<?php echo $user_pic; ?>"></a>
</td><td>
<h4 style="display:inline-block"><a class="tips" title="View Profile" href="http://www.ivystudentsprofile.com/user-profile.php?id=<?php  echo $userid; ?>"><?php echo $name; ?></h4>
</a>
<?php
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
?>
<h6 style="margin-bottom:5px;">Approximate Review Time: <?php if($days==1) echo "1 day"; else echo $days." days"; ?></h6>
<h6 style="margin-bottom:10px;">Asked Price: <?php echo $price; ?>$ per essay </h6>
<a class="btn btn-sm btn-default" data-toggle="modal" data-target="#<?php echo $i; ?>">Reviewing Techniques</a>
</td><td>

<?php 
$s="SELECT completed FROM EssaysForReview WHERE (submitter_id=$id and reviewer_id=$userid and completed=0)";
 $c = mysqli_query($conn, $s);
$si=mysqli_num_rows($c);

if(in_array($userid,$result_array) && $userid!=$id && $si>0) echo '
<a class="btn btn-sm btn-primary"   disabled>Request Sent</a>
'; elseif( $userid!=$id) echo '
<a class="btn btn-sm btn-primary" id="request'.$userid.'">Send Request</a>
';
?>
<!--modal-->
<div id="<?php echo $i; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reviewing Techniques</h4>
      </div>
      <div class="modal-body">


<p style="text-align:justify"><?php echo nl2br(htmlentities($notes)); ?></p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary"  data-dismiss="modal"  >Ok</button>
  </div>
    </div>

  </div>
</div>
<!--modal end-->

</td></tr>
</div>
<?php
$i++;
}
}
else
{
?>
<tr><td style="border-top:none;">
<div align="center" >
<h5>Reviewers Available</h5>
<h1 style="color:#FF5722;font-size:80px"><b>0</b></h1>
<p>There are no reviewers available at this time. Sign up below to become a reviewer.</p>
<div class="col-md-6 col-md-offset-3">
<a href="reviewer.php" class="btn btn-lg btn-primary btn-block">Become a Reviewer</a>
</div></div>
</td></tr>
<?php
}
?>
</tbody></table>



</div></div></div></section>
</section>	
<!--<input type="hidden" id="get_111"  value="<?php echo $id; ?>">
--><?php include '../footer.php'; ?>	
							</div>
			<!-- global wrapper -->
<?php
include '../js/commonjs.php'; 
if($is_approved==0)
{
echo "<script>$('#submit').remove();$('#text1').show();</script>";

}
if(!$id)
echo "<script>$('#application').remove();$('#not_loggedin').show();</script>";
?>
<script>
jQuery(document).ready(function() {
        jQuery('[rel=popover]').popover();
//var t=$("#get_111").val();
//var y=document.getElementById("request"+t);
//if(y)
//$("#request"+t).remove();
    });
  function reviewer(){

var price=$("#price").val();
var notes=$("#notes").val();
if(!price)
{
alert("Please quote your price.");
return false;
} 
else if(!(/^\d+$/.test(price))){
alert("Please enter only numeric values for the price (without decimal, space or special character).");
return false;


}
else if(price<10){
alert("Pricing begins at 10$.");
$("#price").focus();
return false;
}
else if(!notes || notes.length<50)
{
alert("Please describe your reviewing techniques (at least 50 characters)");
return false;
}
return true;

}
$('a[id^="request"]').on('click',function(){
var ind=$(this).attr('id').substring(7);

 $.post('send_request.php', {'reviewerid' : ind}, function(data) {
if(data){
alert("Your request has been sent");
$("#request"+ind).text("Request Sent");
$("#request"+ind).attr('disabled',true);

}
});

});

</script>
<?php 
include '../analyticstracking.php'; ?>
</body>
</html>

