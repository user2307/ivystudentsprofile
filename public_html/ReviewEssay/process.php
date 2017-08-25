<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$id=$_SESSION['id'];
$eid=$_GET['eid'];
if(!$id)
header("Location:http://www.ivystudentsprofile.com");
include "../database.php";
$sql="SELECT e_id  FROM EssaysForReview  WHERE submitter_id =$id or reviewer_id=$id";
$query = mysqli_query($conn, $sql);
$unique=[];
while($row = mysqli_fetch_assoc($query)){
$unique[]= $row['e_id'];
}
if(!in_array($eid,$unique))
{
echo "<script>alert('You are trying to access an invalid link.');window.location.href='http://www.ivystudentsprofile.com/ReviewEssay/notification.php';</script>";
}
//$reviewer=$_GET['reviewer'];
$sql = "SELECT * FROM EssaysForReview where e_id='$eid'";//reviewer_id=$reviewer and submitter_id=$id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$essay=$row['essay'];
$comments=$row['comments'];
$university_details=$row['university_details'];
$reviewer=$row['reviewer_id'];
$submitter_id=$row['submitter_id'];
$completed=$row['completed'];
$_SESSION['reviewer']=$reviewer;

$sql = "SELECT * FROM LoginDetails WHERE user_id =$reviewer";
$query = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($query);
$rname= $row1['name'];
$ruser_pic=$row1['user_pic'];
if(!$ruser_pic)
$ruser_pic='../images/avtar.png';


$sql = "SELECT * FROM ReviewEssays where user_id=$reviewer";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$rate=$row['price'];

$sql = "SELECT * FROM LoginDetails WHERE user_id =$submitter_id";
$query = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($query);
$sname= $row1['name'];
//$suser_pic=$row1['user_pic'];
//if(!$suser_pic)
//$suser_pic='../images/avtar.png';
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
	<title>Submit Essays for Review - Ivystudentsprofile</title>
	<meta name="description" content="Submit your college application essays for proofreading, grammar checks, spelling errors and to build a more compelling and relevant essay to get admission from college of your choice.">
	<meta name="author" content="Ivystudentsprofile">
 <link type="text/css" rel="stylesheet" href="../font-icons/custom-icons/css/animation.css">


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
body{
background:rgba(63, 81, 181, 0.05) ;
}
.landscape{
background:white;
padding-top:20px;
//border:1px solid lightgray;
padding-bottom:15px;
box-shadow: 1px 1px 3px #888888;
//border-left:2px solid maroon;
}
.break{
//background:rgba(63, 81, 181, 0.05);
height:30px;
}
h2
{font-weight:bold;
margin-top:30px;
}
.justify{
text-align:justify;
}
.justify1{
text-align:justify;
font-family:verdana;

}
.complete{
display:none;
float:left;
border-radius:20px;margin-bottom:10px;
}
#report-issue{
float:right;color:#9E9E9E;
margin-top:10px;
}
.btn-success:hover{
background-color:#47A447;
border-color:#398439;
}
.btn-info:hover{

background-color:#39B3D7;
border-color:#269ABC;
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
<section  class="mt15">
                                       <div class="container">
<div class="row">
<div class='col-md-12' >
<?php if($completed==0) echo ' 
<a class="btn btn-link" data-target="#report" data-toggle="modal"  id="report-issue">Report Issue</a>
<a class="btn btn-success btn-sm complete" data-target="#compify" id="mark" data-toggle="modal">Mark Completed</a>';
elseif($completed==1) echo '
<div class="alert alert-success" style="padding:8px;">
<img src="/images/ok.svg" />
<p style="display:inline;color:green">This essay review has been completed.</p>
</div>';
?>
</div></div>
<?php
$sql = "SELECT * FROM PaymentDetails where e_id='$eid'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$payment_status=$row['payment_status'];
if($payment_status=="Completed")
{
if($id==$submitter_id){
$sql="SELECT user_id FROM EssayThread where e_id='$eid' ORDER BY a_id DESC LIMIT 1";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$check_id=$row['user_id'];
if($check_id==$reviewer and $completed==0)
{
echo " 
<div class='row landscape'>
<div class='col-md-10 col-md-offset-1' >

<p style='text-align:justify;font-family:verdana'>If you made any changes to the essay, please paste the revised essay below:</p>
<div id='quill'></div>
<script>
$.post('../quill/examples/advanced.html', function(data){
    $('#quill').html(data).fadeIn();


});
</script>





<p style='text-align:justify;font-family:verdana'>Please mention your comments below.</p>
<textarea class='form-control' id='response'  cols='45' rows='6' ></textarea><br>
<a class='btn btn-lg btn-primary' style='float:right;margin-bottom:20px;' onclick='submitter_response();'>Send</a>
</div></div>
<div class='break'></div>
";


}

$sql = "SELECT * FROM EssayThread where e_id='$eid' order by date desc";
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query)>0)
echo "<script>$('#mark').show();</script>";
while($row = mysqli_fetch_assoc($query)){
$response=$row['essay'];
$improve=$row['comments'];
$user_id=$row['user_id'];
echo "<div class='row landscape'><div class='col-md-10 col-md-offset-1 justify' >
";
if($user_id==$reviewer)
{echo"
<div style='height:30px;'>
<h6 style='float:right;'>Reviewed By: <a href='../user-profile.php?id=$reviewer'>$rname</a></h6>
</div>";
}
elseif($user_id==$submitter_id){
echo "
<div style='height:30px;'>
<h6 style='float:right;'><a href='../user-profile.php?id=$submitter_id'>$sname</a> Responded</h6>
</div>";
}
echo "
<h2>Essay</h2>".htmlspecialchars_decode($response)."<h2>Comments</h2>".
 nl2br($improve)."</div></div><div class='break'></div>";

}

echo " <div class='row landscape'>
<div class='col-md-10 col-md-offset-1 justify' >
<div style='height:30px;'>
<h6 style='float:right;'>Submitted To: <a href='../user-profile.php?id=$reviewer'>$rname</a></h6>
</div>
<h2>Essay</h2>".htmlspecialchars_decode($essay);
echo "<h2>Additional comments/instructions provided by the applicant</h2><p>".nl2br($comments)."</p>";
echo "<h2>Universities for which the essay is applicable</h2><p>".nl2br($university_details)."</p>
</div></div>";
}
elseif($id==$reviewer){
//echo " <div class='row landscape'>
//<div class='col-md-10 col-md-offset-1' >";
$sql="SELECT user_id FROM EssayThread where e_id='$eid' ORDER BY a_id DESC LIMIT 1";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$check_id=$row['user_id'];
if(($check_id==$submitter_id || mysqli_num_rows($query)==0) and $completed==0)
{
echo " <div class='row landscape'>
<div class='col-md-10 col-md-offset-1' >

<p style='text-align:justify;font-family:verdana'>Paste the revised essay below:</p>
<div id='quill'></div>

<script>
$.post('../quill/examples/advanced.html', function(data){
    $('#quill').html(data).fadeIn();


});
</script>





<p style='text-align:justify;font-family:verdana'>Provide your detailed feedback on the essay.</p>
<textarea class='form-control' id='feedback'  cols='45' rows='6' ></textarea><br>
<a class='btn btn-lg btn-primary' style='float:right;margin-bottom:20px;' onclick='reviewed_response();'>Send</a>
</div></div>
<div class='break'></div>
";


}
$sql = "SELECT * FROM EssayThread where e_id='$eid' order by date desc";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)){
$response=$row['essay'];
$improve=$row['comments'];
$user_id=$row['user_id'];
echo "<div class='row landscape'><div class='col-md-10 col-md-offset-1 justify' >
";
if($user_id==$reviewer)
{echo"
<div style='height:30px;'>
<h6 style='float:right;'>Reviewed By: <a href='../user-profile.php?id=$reviewer'>$rname</a></h6>
</div>";
}
elseif($user_id==$submitter_id){
echo "
<div style='height:30px;'>
<h6 style='float:right;'><a href='../user-profile.php?id=$submitter_id'>$sname</a> Responded</h6>
</div>";
}

echo "
<h2>Essay</h2>".htmlspecialchars_decode($response)."<h2>Comments</h2>".
nl2br( $improve)."</div></div><div class='break'></div>";


}
echo "
<div class='row landscape'>
<div class='col-md-10 col-md-offset-1'>
<div style='height:30px;'>
<h6 style='float:right;'>Submitted By: <a href='../user-profile.php?id=$submitter_id'>$sname</a></h6>
</div>

<h2>Essay</h2>
</div>
<div class='col-md-10 col-md-offset-1 justify'>".htmlspecialchars_decode($essay);
echo "<h2>Additional comments/instructions provided by the applicant</h2><p>".nl2br($comments)."</p>";
echo "<h2>Universities for which the essay is applicable</h2><p>".nl2br($university_details)."</p>";
echo "</div></div>";

}
}
else
{
?>
 <div class="row landscape">
<div class="col-md-2">
<a href="../user-profile.php?id=<?php echo $reviewer; ?>">
<img class="img-rounded" style="width:30px;height:30px;"  src="<?php echo $ruser_pic; ?>"></a>
<a href="../user-profile.php?id=<?php echo $reviewer; ?>">
<h6 style="display:inline;margin-left:5px;"><?php echo $rname; ?><h6>
</a>
</div>
<div class="col-md-8">
<p class="justify1">Paste your essay below:</p>
<div id="quill"></div>
<script>
$.post("../quill/examples/advanced.html", function(data){

    $('#quill').html(data).fadeIn();

});
    
</script>
<br>
<p class="justify1">Provide any additional comments that you'd like to specify:</p>
<textarea class="form-control" id="comments"  cols="45" rows="6" ><?php  if($comments)echo ($comments); ?></textarea><br>
<br>
<p class="justify1" >Mention the university name, course type and degree to which this essay applies. If you're planning to use the same essay for more than one university, separate the name of the universities with line break:</p>
<textarea class="form-control" id="university" cols="45" rows="3" placeholder="e.g. MS in Computer Science from MIT"><?php if($university_details)echo ($university_details);  ?></textarea>
<br>
<div>
<table class="table"><tbody><tr><td style="border-top:none;height:50px;">
<a class="btn btn-sm btn-warning" onclick="save_data();" style="float:left">Save Draft</a>
<span id="spin"></span>
<p id="draft" style="display:none;colr:gray;margin-top:5px;margin-left:20%;">Draft Saved</p>
</td>
<td style="border-top:none;">

<a style="float:right"  onclick="proceed()"  class="btn btn-sm btn-primary">Proceed</a>
</td></tr></tbody></table>


</div>
</div>
<?php
echo "<script>
var abs='".htmlspecialchars_decode($essay)."';
$.post('../quill/examples/advanced.html', function(data){
setTimeout(function(){
$('#ql-editor-2').html(abs);},200);
});

</script>";

}
?>
</div></section>
<br><br>

<div id="modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
<div align="center" style="margin-top:30px;margin-bottom:-40px;">
<form action="https://www.paypal.com/cgi-bin/webscr?amount=<?php echo $rate;   ?>" method="post" target="_top">
<input type="hidden" name="item_name" value="Essay Review by <?php echo $rname; ?>">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="VB2QFC3BX7MBJ">
<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
<input type="hidden" name="custom"  value="<?php echo $eid; ?>" >
</form>
<!--
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr?amount=<?php echo $rate;   ?>" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="item_name" value="Essay Review by <?php echo $rname; ?>">
<input type="hidden" name="hosted_button_id" value="QZVDAEFKMQMQE">
<input type="image" src="https://www.sandbox.paypal.com/en_GB/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
<input type="hidden" name="custom"  value="<?php echo $eid; ?>" >
</form>
-->
<p style="margin-top:40px;font-size:12px;"><b>Note:</b> Due to RBI restrictions, we cannot currently process payments from Indian bank account holders via PayPal. If you are an Indian bank account holder, please drop us a note at <a href="mailto:contact@ivystudentsprofile.com">contact@ivystudentsprofile.com</a></p>
</div>
      </div>
   <div class="modal-footer">
        <button class="btn btn-link"  data-dismiss="modal"  >Cancel</button>
  </div>
  
    </div>

  </div>
</div>
<!--modal end-->
<!--report modal-->
<div id="report" class="modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Report Issue</h4>
      </div>
      <div class="modal-body">
<p>Please report your query below:</p>
<p class="text-danger" id="show-error"></p>
<textarea class="form-control" id="issue" cols="20" rows="5" ></textarea>
  </div>
   <div class="modal-footer">
        <button class="btn btn-sm btn-info" style="border-radius:20px;" onclick="query();" >Submit</button>
  </div>
    </div>

  </div>
</div>
<!--end modal-->
<!--complete-->
<div id="compify" class="modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Essay Review Completed</h4>
      </div>
      <div class="modal-body">
<p class="text-primary">Please note that once you mark the process as completed, it cannot be reverted.</p> 
<p>Would you like to provide feedback on the reviewer and the entire review process?</p>
<textarea class="form-control" id="improvise" cols="20" rows="3" ></textarea>
  </div>
   <div class="modal-footer">
        <button class="btn btn-sm btn-info" style="border-radius:20px;"  data-dismiss="modal" id="completed" >Continue</button>
  </div>
    </div>

  </div>
</div>

<!--end modal complete-->
<input type="hidden" value=<?php echo $reviewer; ?>  id="reviewer">
<input type="hidden" value=<?php echo $eid; ?>  id="e_id">
</section>	
											<?php include '../footer.php'; ?>	
							</div>
			<!-- global wrapper -->
<?php
include '../js/commonjs.php'; ?>
<script>
function save_data(){
$("#spin").addClass('icon-spinner iconMedium animate-spin');
var span_val = $("#ql-editor-2").html();
var comments=$("#comments").val();
var university=$("#university").val();
//var reviewer=$("#reviewer").val();
var eid=$("#e_id").val();
$.post('store_essays.php',{'essay' : span_val,'comments':comments,'university':university,'eid':eid}, function(data) {
$("#spin").removeClass('icon-spinner iconMedium animate-spin');
$("#draft").fadeIn("slow");
 $( "#draft" ).fadeOut( 1600, "linear" );
});
}
function proceed(){
var span_val = $("#ql-editor-2").html();
var comments=$("#comments").val();
var university=$("#university").val();
//var reviewer=$("#reviewer").val();
var eid=$("#e_id").val();
$.post('store_essays_proceed.php',{'essay' : span_val,'comments':comments,'university':university,'eid':eid}, function(data) {
if(data=="1")
{
 jQuery.noConflict();
$("#modal").modal('show');
}
else if(data=="3")
{
if(comments.trim()=='')
$("#comments").focus();
else
if(university.trim()=='')
$("#university").focus();
alert("Please fill all the fields before proceeding.");
}
else if(data=="2")
alert("Please paste your essay before proceeding.")
});
}
function query(){
var issue=$("#issue").val();
var reviewer=$("#reviewer").val();
var e_id=$("#e_id").val();
if(!issue)
{
$("#show-error").text("You must mention your issue before submitting.");
}
else{
$.post('user-issue.php',{'issue':issue,'reviewer':reviewer,'e_id':e_id}, function(data) {
$("#report").modal('hide');
alert("Your query has been submitted. We will look into it and respond to you at the earliest.");
$("#issue").val('');
$("#show-error").text('');
});
}}
function reviewed_response()
{
var span_val = $("#ql-editor-2").html();
var feedback=$("#feedback").val();
var e_id=$("#e_id").val();
$.post('reviewer-response.php',{'essay':span_val,'feedback':feedback,'e_id':e_id}, function(data) {
if(data=="success")
{
location.reload(true);
}
else
alert(data);
});
}
function submitter_response()
{
var span_val = $("#ql-editor-2").html();
var response=$("#response").val();
var e_id=$("#e_id").val();
$.post('submitter-response.php',{'essay':span_val,'response':response,'e_id':e_id}, function(data) {
if(data=="success")
{
location.reload(true);
}
else
alert(data);
});
}

$("#completed").click(function(){
var improvise=$("#improvise").val();
var e_id=$("#e_id").val();
$.post('mark-completed.php',{'eid':e_id,'improvise':improvise}, function(data) {
if(data=="success")
{
location.reload(true);
}
else
alert(data);
});




});

</script>
<?php
/*echo "<script>
var abs='".htmlspecialchars_decode($essay)."';
$.post('../quill/examples/advanced.html', function(data){
setTimeout(function(){
$('#ql-editor-2').html(abs);},200);
});

</script>";
*/?>

<?php
include '../analyticstracking.php'; ?>
</body>
</html>

