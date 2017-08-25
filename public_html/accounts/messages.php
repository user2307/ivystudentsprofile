
<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$id=$_SESSION['id'];
if (!($id)) {
echo "<script>window.location.href='http://www.ivystudentsprofile.com';</script>";
}
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
<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Messages: Ivystudentsprofile</title>
	<meta name="description" content="Messages: Ivystudentsprofile">
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
.btn-primary[disabled]
{

background-color:#e36a57;
border-color:#e36a57;
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
#find{
height:30px;
width:50%;
display:inline-block;
padding:5px;
}
</style>

</head>
<body class="activateAppearAnimation" >
<!-- Primary Page Layout 
	================================================== -->
	<!-- globalWrapper -->
	<div id="globalWrapper">
<section id="page">
<section id="content" class="mt30 pb30">
<div class="container">
<div class="row">
<div id="first"  class="col-md-3" style="max-height:500px;height:500px; overflow-y:scroll">
<h3 style="display:inline-block;"><b>Messages</b></h3>
<a class="btn btn-sm btn-primary" style="float:right;" data-toggle="modal" data-target="#myModal1" id="compose">Compose</a>
<?php 
include '../header.php';
$sql = "SELECT * FROM TextMessages WHERE sender_id = $id or receiver_id= $id";
$select = mysqli_query($conn, $sql);
$others1=[];
$others2=[];
$i=0;$j=0;
while($row = mysqli_fetch_assoc($select)){
$message= $row['message'];
$sender_id=$row['sender_id'];
$receiver_id=$row['receiver_id'];
$others1[$i++]=$receiver_id;
$others2[$j++]=$sender_id;

/*$query="select name from LoginDetails where user_id=$sender_id or user_id=$receiver_id";
$exec= mysqli_query($conn, $query);
$row2 = mysqli_fetch_assoc($exec);
$chat_name=$row2['name'];
*/
}
$final=[];$f=0;
for($r=0;$r<count($others1);$r++){
if($others1[$r]!=$id)
$final[$f++]=$others1[$r];

}
for($t=0;$t<count($others2);$t++){
if($others2[$t]!=$id)
$final[$f++]=$others2[$t];


}
$final= array_unique($final);
$final=implode("/",$final);
$final=explode("/",$final);

$new=[];$p=0;
for($g=0;$g<count($final);$g++){
if($final[$g]!="")
$new[$p++]=$final[$g];

}
rsort($new);
if( count($new)>0)
{echo '<table class="table table-hover"><tbody>';
for($y=0;$y<count($new);$y++){
echo "<tr id='".$new[$y]."'><td><a style='color:black' href='/accounts/messages.php?thread=".$new[$y]."'>";
$sql = "SELECT name,user_pic FROM LoginDetails where user_id=$new[$y]";
$select = mysqli_query($conn, $sql);
$row5 = mysqli_fetch_assoc($select);
$other_name= $row5['name'];
$other_pic=$row5['user_pic'];
if(!$other_pic)
$other_pic="../images/avtar.png";
echo "<div class='col-md-3'><img class='img-circle' src='".$other_pic."'></div>";
echo "<div class='col-md-9' style='padding-right:0px;'><b>".$other_name."</b>";
$try="select message,timestamp from TextMessages where (sender_id=$id and receiver_id=$new[$y])or (receiver_id=$id and sender_id=$new[$y])  ORDER BY chat_id DESC LIMIT 1";
$check= mysqli_query($conn, $try);
$row6= mysqli_fetch_assoc($check);
$message=$row6['message'];
$timestamp=$row6['timestamp'];
echo "<h6 style='margin-bottom:5px;'>".date("j-M-Y",strtotime($timestamp))."</h6>";
echo "<p style='text-align:justify'>".substr($message,0,50)."...</p></div>";

echo "</a></td></tr>";


}
echo "</tbody></table>";
}?>
<?php if(count($new)==0){ echo '
<hr style="margin-top:0px;">
<div align="center"style="margin-top:10%" >
<h5>There are no messages available at this time. Your inbox is empty.</h5>
</div>';
}
?>	
</div>
<div class="col-md-7"  style="height:500px;">
<div class="col-md-12" style="height:350px; overflow-y:scroll">
<?php if(count($new)==0){ echo '
<div align="center"style="margin-top:10%" >
<h5>Messages Available</h5>
<h1 style="color:maroon;font-size:80px"><b>0</b></h1>
</div>';
echo '<script>document.getElementById("first").style.height="350px"; </script>';
}
else
{
$thread_id=$_GET['thread'];
if (in_array($thread_id, $new))
{
$details= "SELECT name ,user_pic FROM LoginDetails where user_id=$thread_id";
$ch = mysqli_query($conn, $details);
$row8 = mysqli_fetch_assoc($ch);
$chat_name= $row8['name'];
echo "<h3><b><a style='color:black' href='../user-profile.php/?id=".$thread_id."'>".$chat_name."</a></b></h3>";
$try1="select message,sender_id,timestamp from TextMessages where (sender_id=$id and receiver_id=$thread_id)or (receiver_id=$id and sender_id=$thread_id)  ORDER BY chat_id ASC";
$check1= mysqli_query($conn, $try1);
echo '<table class="table"><tbody>';
while($row7= mysqli_fetch_assoc($check1)){
$show_message=$row7['message'];
$s_id=$row7['sender_id'];
$show_time=$row7['timestamp'];
$get = "SELECT name,user_pic FROM LoginDetails where user_id=$s_id";
$sel = mysqli_query($conn, $get);
$row9 = mysqli_fetch_assoc($sel);
$show_name= $row9['name'];
$show_pic=$row9['user_pic'];
if(!$show_pic)
$show_pic="../images/avtar.png";
echo '<tr><td><div class="row"><div class="col-md-2"><a href="../user-profile.php?id='.$s_id.'"><img class="img-circle" src="'.$show_pic.'"></a></div><div class="col-md-10"><h3 style="display:inline-block"><b><a style="color:black" href="../user-profile.php?id='.$s_id.'">'.$show_name.'</a></b></h3><p style="float:right">'.date("j-M-Y",strtotime($show_time)).'</p><p style="text-align:justify">'.nl2br($show_message).'</p></div></div></td></tr>';


}
echo '</tbody></table>';
}
else
{
echo "No message selected";
echo '<script>document.getElementById("first").style.height="350px"; </script>';
}
}
?>
</div>
<?php
if(!$user_pic)
$user_pic="/images/avtar.png";
if (in_array($thread_id, $new))
{
echo '
<div class="col-md-12" style="overflow-y:scroll;background:#f6f6f6;height:150px">
<br>
<div class="col-md-2">
<img src="'. $user_pic.'" class="img-circle"></div><div class="col-md-10">
<textarea  placeholder="Write your message here..." style="resize:none;border:1px solid #d34932"  class="form-control" id="getmessage"  cols="2" rows="2" autofocus ></textarea>
<br>   <button class="btn btn-sm btn-primary"   id="send_message" style="float:right;"  disabled>Send Message</button>

</div>
</div>
';
}
?>
</div>
</div><!-- end row-->

</div>
<input type="hidden" id="activeid" value="<?php echo $thread_id; ?>" >
<!--modal-->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Compose Message</h4>
      </div>
      <div class="modal-body">
<h5 style="display:inline;"><b>To: </b>&nbsp;</h5><input type="text" name="find"  id="find" class="form-control" placeholder="Find People">
<div class="form-group" style="margin-top:15px;">

<textarea  style="resize:none;"  class="form-control" id="getmessage1"  cols="3" rows="3" placeholder="Message"></textarea>
                                                                </div>


      </div>
      <div class="modal-footer">
        <button class="btn btn-primary"    id="send_message1"  disabled>Send</button>
  </div>
    </div>

  </div>
</div>

<!--end modal-->
</section>
</section>









									<?php include '../footer.php'; ?>	
							</div>
			<!-- global wrapper -->
<!-- End Document 
	================================================== -->
	<script type="text/javascript" src="../js-plugin/respond/respond.min.js"></script>
<script type="text/javascript" src="../sticky/sticky.min.js"></script>
<link rel="stylesheet" href="../sticky/sticky.min.css" type="text/css" />
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

<script>
$(document).ready(function(){

var getid=$("#activeid").val();
$("#"+getid).addClass("active");
});
$('#getmessage').on('keyup',function() {
    var textarea_value = $("#getmessage").val();
//    var text_value = $('input[name="textField"]').val();
    if(textarea_value.trim() != '') {
        $('#send_message').attr('disabled' , false);
    }else{
        $('#send_message').attr('disabled' , true);
    }
});
$("#send_message").on('click',function(){

 var textarea_value = $("#getmessage").val();
var uid=$("#activeid").val();
$.post('send_message.php',{'message' : textarea_value,'uid':uid}, function(data) {
if(data=="success")
{
 $.sticky('Your message has been sent.');
location.reload(true);
}
});
});

$('#getmessage1').on('keyup',function() {
    var textarea_value = $("#getmessage1").val();
//    var text_value = $('input[name="textField"]').val();
    if(textarea_value.trim() != '') {
        $('#send_message1').attr('disabled' , false);
    }else{
        $('#send_message1').attr('disabled' , true);
    }
});
$("#send_message1").on('click',function(){

 var textarea_value = $("#getmessage1").val();
var uid=$(".modal-body h5").attr("id");
if(!uid)
alert("Please select a person from dropdown to whom you want to send message.");
else
{
$.post('send_message.php',{'message' : textarea_value,'uid':uid}, function(data) {
if(data=="success")
{
 $.sticky('Your message has been sent.');
window.location.href="/accounts/messages.php?thread="+uid;
}

});
}
});


</script>
<?php
 if($id)
{
$sql = "UPDATE TextMessages set is_read=1  WHERE receiver_id=$id and is_read=0";
$conn->query($sql);
}
include '../analyticstracking.php'; 
?>
</body>
</html>

