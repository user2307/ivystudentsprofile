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
	<title>Notifications - Ivystudentsprofile</title>
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
include '../header1.php';

?>
<section id="page">


<section id="content"  class="tabsDetails"  data-nekoanim="fadeInUp" data-nekodelay="100" style="margin-top:70px;">
				<div class="container">
					
					<div class="row">
<!-- Navigation Buttons -->
						<div class="col-md-3">
							<ul class="nav nav-pills nav-stacked">
								<li class="active">
									<a href="#responsive" data-toggle="tab"><i class="icon-star"></i>Essay Reviewer</a>
								</li>
								<li>
									<a href="#profile" data-toggle="tab"><i class="icon-star"></i>Prospective Student</a>
								</li>
							</ul>
						</div>
						<!--content -->
						<div class="col-md-9">
							<div class="tab-content">

								<div class="tab-pane fade in active" id="responsive">
									<div class="row">















				<div class="container">
					<div class="bs-docs-section">

						<h2 id="tabs-examples">Essay Review Requests</h2>
						<div class="bs-example bs-example-tabs mb30">
							<ul id="myTab" class="nav nav-tabs">
								<li class="active"><a href="#all" data-toggle="tab">All</a></li>
								<li ><a href="#accepted" data-toggle="tab">Accepted</a></li>
 <li ><a href="#pending" data-toggle="tab">Pending</a></li>								
</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div class="tab-pane active" id="all">
<table class="table"><tbody>
<?php
$sql = "SELECT * FROM RequestsRecords WHERE reviewer_id =".$id;
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)){
$sender_id=$row['sender_id'];
$accepted=$row['accepted'];
$sql1= "SELECT name from LoginDetails where user_id=".$sender_id;
$query1=mysqli_query($conn,$sql1);
$row1= mysqli_fetch_assoc($query1);
$sendername=$row1['name'];
$request_received=$row['request_received'];
$request_accepted=$row['request_accepted'];
if($accepted==0)
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'><a href='../user-profile.php?id=$sender_id'>".$sendername."</a> has sent you a request to review their essay.<p style='margin-top:12px;margin-bottom:0px;'>Received: ".date("j-M-Y",strtotime($request_received))."</p></td><td  style='border-top:none;border-bottom:1px solid lightgray'><a class='btn btn-sm btn-primary'  id='accept".$sender_id."'>Accept Request</a></td></tr>";
else
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'><a href='../user-profile.php?id=$sender_id'>".$sendername."</a> has sent you a request to review their essay.<p style='margin-top:12px;margin-bottom:0px;'>Received: ".date("j-M-Y",strtotime($request_received))."</p><p>Accepted: ".date("j-M-Y",strtotime($request_accepted))."</p></td><td  style='border-top:none;border-bottom:1px solid lightgray'><a class='btn btn-sm btn-primary' disabled>Request Accepted</a></td></tr>";
}
?>								
</tbody></table>


</div>
								<div class="tab-pane fade" id="accepted">
								
<table class="table"><tbody>
<?php
$sql = "SELECT * FROM RequestsRecords WHERE reviewer_id =".$id." and accepted=1";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)){
$sender_id=$row['sender_id'];
$accepted=$row['accepted'];
$sql1= "SELECT name from LoginDetails where user_id=".$sender_id;
$query1=mysqli_query($conn,$sql1);
$row1= mysqli_fetch_assoc($query1);
$sendername=$row1['name'];
$request_received=$row['request_received'];
$request_accepted=$row['request_accepted'];
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'><a href='../user-profile.php?id=$sender_id'>".$sendername."</a> has sent you a request to review their essay.<p style='margin-top:12px;margin-bottom:0px;'>Received: ".date("j-M-Y",strtotime($request_received))."</p><p>Accepted: ".date("j-M-Y",strtotime($request_accepted))."</p></td><td  style='border-top:none;border-bottom:1px solid lightgray'><a class='btn btn-sm btn-primary' disabled>Request Accepted</a></td></tr>";
}
?>
</tbody></table>


</div>
								<div class="tab-pane fade" id="pending">
								
<table class="table"><tbody>
<?php
$sql = "SELECT * FROM RequestsRecords WHERE reviewer_id =".$id." and accepted=0";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)){
$sender_id=$row['sender_id'];
$accepted=$row['accepted'];
$sql1= "SELECT name from LoginDetails where user_id=".$sender_id;
$query1=mysqli_query($conn,$sql1);
$row1= mysqli_fetch_assoc($query1);
$sendername=$row1['name'];
$request_received=$row['request_received'];
$request_accepted=$row['request_accepted'];
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'><a href='../user-profile.php?id=$sender_id'>".$sendername."</a> has sent you a request to review their essay.<p style='margin-top:12px;margin-bottom:0px;'>Received: ".date("j-M-Y",strtotime($request_received))."</p></td><td  style='border-top:none;border-bottom:1px solid lightgray'><a class='btn btn-sm btn-primary'  id='pending".$sender_id."'>Accept Request</a></td></tr>";

}
?>
</tbody></table>



</div>
							</div>
						</div><!-- /example -->
</div></div>





</div></div>
<div class="tab-pane fade" id="profile">
									<div class="row">




    <div class="container">
                                        <div class="bs-docs-section">

                                                <h2 id="tabs-examples">Essay Review Requests</h2>
                                                <div class="bs-example bs-example-tabs mb30">
                                                        <ul id="myTab" class="nav nav-tabs">
                                                                <li class="active"><a href="#sent" data-toggle="tab">Requests Sent</a></li>
                                                                <li ><a href="#ok" data-toggle="tab">Requests Accepted</a></li>
</li>
                                                        </ul>
                                                        <div id="myTabContent" class="tab-content">
                                                                <div class="tab-pane active" id="sent">


<table class="table"><tbody>


</tbody></table>
</div>
  <div class="tab-pane fade" id="ok">
<table class="table"><tbody>


</tbody></table>

</div>
</div></div></div></div>




</div></div>
</div></div>
</div></div></section>











</section>	
<?php include '../footer.php'; ?>	
							</div>
			<!-- global wrapper -->
<?php
include '../js/commonjs.php';?>
<script>
$('a[id^="accept"]').on('click',function(){
var ind=$(this).attr('id').substring(6);
 $.post('accept_request.php', {'senderid' : ind}, function(data) {
if(data=="success"){
$("#accept"+ind).text("Request Accepted");
$("#accept"+ind).attr('disabled',true);
$("#pending"+ind).text("Request Accepted");
$("#pending"+ind).attr('disabled',true);
}
else
{
alert(data);
}
});

});
$('a[id^="pending"]').on('click',function(){
var ind=$(this).attr('id').substring(7);
 $.post('accept_request.php', {'senderid' : ind}, function(data) {
if(data=="success"){
$("#accept"+ind).text("Request Accepted");
$("#accept"+ind).attr('disabled',true);
$("#pending"+ind).text("Request Accepted");
$("#pending"+ind).attr('disabled',true);
}
else{
alert(data);
}
});

});
</script>
<?php 
include 'analyticstracking.php'; ?>
</body>
</html>

