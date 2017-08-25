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
.btn-success:hover{
background-color:#47A447;
border-color:#398439;
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

<section id="content"   style="margin-top:70px;">
				<div class="container">
					
					<div class="row">
<!-- Navigation Buttons -->


<div class="span12 text-left mb40">
<h2>
Notifications

</h2>
</div>



<table class="table"><tbody>
<?php
/*$sql="SELECT DISTINCT e_id  FROM RequestsRecords  WHERE reviewer_id =$id or sender_id=$id";
$query = mysqli_query($conn, $sql);
$unique=[];
while($row = mysqli_fetch_assoc($query)){
$unique[]= $row['e_id'];
}
$request=[];
for($i=0;$i<count($unique);$i++)
{
$sql="SELECT request_id  FROM RequestsRecords where e_id='".$unique[$i]."' order by request_received desc limit 2";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query))
$request[]= $row['request_id'];
}
*/
$sql = "SELECT * FROM RequestsRecords WHERE reviewer_id =$id or sender_id=$id order by request_id desc";
$query = mysqli_query($conn, $sql);
$rows=mysqli_num_rows($query);
if($rows>0){
while($row = mysqli_fetch_assoc($query)){
$sender_id=$row['sender_id'];
$reviewer_id=$row['reviewer_id'];
$accepted=$row['accepted'];
$essay_received=$row['essay_received'];
$feedback=$row['feedback'];
$request_received=$row['request_received'];
$request_accepted=$row['request_accepted'];
$eid=$row['e_id'];
//$request_id=$row['request_id'];
$sql1= "SELECT name from LoginDetails where user_id=".$sender_id;
$query1=mysqli_query($conn,$sql1);
$row1= mysqli_fetch_assoc($query1);
$sendername=$row1['name'];
$sql1= "SELECT name from LoginDetails where user_id=".$reviewer_id;
$query1=mysqli_query($conn,$sql1);
$row2= mysqli_fetch_assoc($query1);
$reviewer_name=$row2['name'];

//if(in_array($request_id,$request)){
if($accepted==0 && $reviewer_id==$id)
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'><a href='../user-profile.php?id=$sender_id'>".$sendername."</a> has sent you a request to review their essay.<p style='margin-top:12px;margin-bottom:0px;'>Received: ".date("j-M-Y",strtotime($request_received))."</p></td><td  style='border-top:none;border-bottom:1px solid lightgray'><a class='btn btn-sm btn-primary'  id='accept".$sender_id."'>Accept Request</a></td></tr>";
elseif($accepted==1 && $reviewer_id==$id)
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'><a href='../user-profile.php?id=$sender_id'>".$sendername."</a> has sent you a request to review their essay.<p style='margin-top:12px;margin-bottom:0px;'>Received: ".date("j-M-Y",strtotime($request_received))."</p><p>Accepted: ".date("j-M-Y",strtotime($request_accepted))."</p></td><td  style='border-top:none;border-bottom:1px solid lightgray'><a class='btn btn-sm btn-primary' disabled>Request Accepted</a></td></tr>";

elseif($accepted==0 && $sender_id==$id)
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'>You sent a request to <a href='../user-profile.php?id=$reviewer_id'>".$reviewer_name."</a> to review your essay.<p style='margin-top:12px;margin-bottom:0px;'>Sent: ".date("j-M-Y",strtotime($request_received))."</p></td><td style='border-top:none;border-bottom:1px solid lightgray'></td></tr>";
elseif($accepted==1 && $sender_id==$id)
{
$job = "SELECT * FROM PaymentDetails WHERE e_id='$eid'";
$pay = mysqli_query($conn,$job);
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'><a href='../user-profile.php?id=$reviewer_id'>".$reviewer_name."</a> accepted your request to review your essay.<p style='margin-top:12px;margin-bottom:0px;'>Sent: ".date("j-M-Y",strtotime($request_received))."</p><p>Accepted: ".date("j-M-Y",strtotime($request_accepted))."</p></td><td style='border-top:none;border-bottom:1px solid lightgray'>
";
if(!mysqli_num_rows($pay)>0) echo "
<a class='btn btn-sm btn-primary' href='process.php?eid=$eid'>Submit Essay for Review</a>";
echo "</td></tr>";
}
elseif($essay_received==1 && $sender_id==$id)
{
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'>Your essay has been submitted to <a href='../user-profile.php?id=$reviewer_id'>".$reviewer_name."</a> for review.<p style='margin-top:12px;margin-bottom:0px;'>Submitted: ".date("j-M-Y",strtotime($request_received))."</p></td><td style='border-top:none;border-bottom:1px solid lightgray'><a class='btn btn-sm btn-primary' href='process.php?eid=$eid'>In Progress</a></td></tr>";

}
elseif($essay_received==1 && $reviewer_id==$id){
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'><a href='../user-profile.php?id=$sender_id'>".$sendername."</a> submitted their essay for review.<p style='margin-top:12px;margin-bottom:0px;'>Submitted: ".date("j-M-Y",strtotime($request_received))."</p></td><td style='border-top:none;border-bottom:1px solid lightgray'><a class='btn btn-sm btn-primary' href='process.php?eid=$eid'>Start Review</a></td></tr>";
}
elseif($feedback==2 && $reviewer_id==$id)
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'><a href='../user-profile.php?id=$sender_id'>".$sendername."</a> has responded to the essay you reviewed recently.<p style='margin-top:12px;margin-bottom:0px;'>Submitted: ".date("j-M-Y",strtotime($request_received))."</p></td><td style='border-top:none;border-bottom:1px solid lightgray'><a class='btn btn-sm btn-primary' href='process.php?eid=$eid'>Read Comments</a></td></tr>";
elseif($feedback==1 && $sender_id==$id)
{
$sql1="SELECT completed  FROM EssaysForReview where e_id='$eid'";
$query1 = mysqli_query($conn, $sql1);
$rowz = mysqli_fetch_assoc($query1);
$complete=$rowz['completed'];

echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'><a href='../user-profile.php?id=$reviewer_id'>".$reviewer_name."</a> has finished reviewing your essay.<p style='margin-top:12px;margin-bottom:0px;'>Submitted: ".date("j-M-Y",strtotime($request_received))."</p></td><td style='border-top:none;border-bottom:1px solid lightgray'>
";
if($complete==0)
echo "<a class='btn btn-sm btn-primary' href='process.php?eid=$eid'>View Revised Essay</a></td></tr>";

else
echo "<a class='btn btn-sm btn-success' href='process.php?eid=$eid'>Completed</a></td></tr>";
}
elseif($feedback==3 && $reviewer_id==$id)
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'>The essay review process has been marked completed by <a href='../user-profile.php?id=$sender_id'>".$sendername."</a><p style='margin-top:12px;margin-bottom:0px;'>Completed: ".date("j-M-Y",strtotime($request_received))."</p></td><td style='border-top:none;border-bottom:1px solid lightgray'><a class='btn btn-sm btn-success' href='process.php?eid=$eid'>Completed</a></td></tr>";
//}


//else{
/*if($accepted==0 && $reviewer_id==$id)
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'><a href='../user-profile.php?id=$sender_id'>".$sendername."</a> has sent you a request to review their essay.<p style='margin-top:12px;margin-bottom:0px;'>Received: ".date("j-M-Y",strtotime($request_received))."</p></td><td  style='border-top:none;border-bottom:1px solid lightgray'><a class='btn btn-sm btn-primary'  id='accept".$sender_id."'>Accept Request</a></td></tr>";
elseif($accepted==1 && $reviewer_id==$id)
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'><a href='../user-profile.php?id=$sender_id'>".$sendername."</a> has sent you a request to review their essay.<p style='margin-top:12px;margin-bottom:0px;'>Received: ".date("j-M-Y",strtotime($request_received))."</p><p>Accepted: ".date("j-M-Y",strtotime($request_accepted))."</p></td><td  style='border-top:none;border-bottom:1px solid lightgray'><a class='btn btn-sm btn-primary' disabled>Request Accepted</a></td></tr>";

elseif($accepted==0 && $sender_id==$id)
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'>You sent a request to <a href='../user-profile.php?id=$reviewer_id'>".$reviewer_name."</a> to review your essay.<p style='margin-top:12px;margin-bottom:0px;'>Sent: ".date("j-M-Y",strtotime($request_received))."</p></td><td style='border-top:none;border-bottom:1px solid lightgray'></td></tr>";
elseif($accepted==1 && $sender_id==$id)
{
$job = "SELECT * FROM PaymentDetails WHERE e_id='$eid'";
$pay = mysqli_query($conn,$job);
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'><a href='../user-profile.php?id=$reviewer_id'>".$reviewer_name."</a> accepted your request to review your essay.<p style='margin-top:12px;margin-bottom:0px;'>Sent: ".date("j-M-Y",strtotime($request_received))."</p><p>Accepted: ".date("j-M-Y",strtotime($request_accepted))."</p></td><td style='border-top:none;border-bottom:1px solid lightgray'></td></tr>";
}
elseif($essay_received==1 && $sender_id==$id)
{
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'>Your essay has been submitted to <a href='../user-profile.php?id=$reviewer_id'>".$reviewer_name."</a> for review.<p style='margin-top:12px;margin-bottom:0px;'>Submitted: ".date("j-M-Y",strtotime($request_received))."</p></td><td style='border-top:none;border-bottom:1px solid lightgray'></td></tr>";

}
elseif($essay_received==1 && $reviewer_id==$id){
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'><a href='../user-profile.php?id=$sender_id'>".$sendername."</a> submitted their essay for review.<p style='margin-top:12px;margin-bottom:0px;'>Submitted: ".date("j-M-Y",strtotime($request_received))."</p></td><td style='border-top:none;border-bottom:1px solid lightgray'></td></tr>";
}
elseif($feedback==2 && $reviewer_id==$id)
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'><a href='../user-profile.php?id=$sender_id'>".$sendername."</a> has responded to the essay you reviewed recently.<p style='margin-top:12px;margin-bottom:0px;'>Submitted: ".date("j-M-Y",strtotime($request_received))."</p></td><td style='border-top:none;border-bottom:1px solid lightgray'></td></tr>";
elseif($feedback==1 && $sender_id==$id)
{
echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'><a href='../user-profile.php?id=$reviewer_id'>".$reviewer_name."</a> has finished reviewing your essay.<p style='margin-top:12px;margin-bottom:0px;'>Submitted: ".date("j-M-Y",strtotime($request_received))."</p></td><td style='border-top:none;border-bottom:1px solid lightgray'></td></tr>";

}
//elseif($feedback==3 && $reviewer_id==$id)
//echo "<tr><td style='border-top:none;border-bottom:1px solid lightgray'>The essay review process has been marked completed by <a href='../user-profile.php?id=$sender_id'>".$sendername."</a><p style='margin-top:12px;margin-bottom:0px;'>Completed: ".date("j-M-Y",strtotime($request_received))."</p></td><td style='border-top:none;border-bottom:1px solid lightgray'></td></tr>";


}
//button hide
*/
}
}
else
echo "<p>No notification available.</p>";
?>								
</tbody></table>


</div></div></section>










</secton>
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
//$("#pending"+ind).text("Request Accepted");
//$("#pending"+ind).attr('disabled',true);
}
else
{
alert(data);
}
});

});
/*$('a[id^="pending"]').on('click',function(){
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

});*/
</script>
<?php 
$sql = "SELECT * FROM RequestsRecords WHERE reviewer_id=$id" ;
$select = mysqli_query($conn, $sql);

if (mysqli_num_rows($select) > 0) {
$sql = "UPDATE RequestsRecords set read_request_reviewer=0,is_read_reviewer=0,submitter_response=0  WHERE reviewer_id=$id";
$conn->query($sql);


}
$sql = "SELECT * FROM RequestsRecords WHERE sender_id=$id" ;
$select = mysqli_query($conn, $sql);

if (mysqli_num_rows($select) > 0) {
$sql = "UPDATE RequestsRecords set read_request_sender=0,is_read_sender=0,reviewer_response=0  WHERE sender_id=$id";
$conn->query($sql);


}

include '../analyticstracking.php'; ?>
</body>
</html>

