<?php
include "../database.php";
$key=$_GET['key'];
$sql = "SELECT password_reset_key FROM LoginDetails WHERE password_reset_key = '$key'";
$select = mysqli_query($conn, $sql);
if (!(mysqli_num_rows($select) > 0)) {
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
        <title>Reset Password: Ivystudentsprofile</title>
        <meta name="description" content="Reset your password for Ivystudentsprofile or Login to Ivystudentsprofile to submit your essays or view profiles of students admitted to Stanford, yale, columbia, harvard, duke, Upenn, princeton, brown, cornell and other universities in US, Europe, Asia and Australia."
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
<link rel="shortcut icon" href="../images/favicon.ico">
        <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../images/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../images/apple-touch-icon-144x144.pnpt">
  <link type="text/css" rel="stylesheet" href="../css/layout.css">
       <link type="text/css" id="colors" rel="stylesheet" href="../css/red.css">
        <link type="text/css" rel="stylesheet" href="../css/custom.css">
<!-- icon fonts -->
	<link type="text/css" rel="stylesheet" href="../font-icons/custom-icons/css/custom-icons.css">
	<link type="text/css" rel="stylesheet" href="../font-icons/custom-icons/css/custom-icons-ie7.css">
	<!-- Custom css -->
<style>
.alert-red{
color:#b94a5c;
background-color:#f2dede;
border-color:#eed3d7;
padding:11px 12px 9px;
border-radius:4px;
margin-bottom:10px;
border:solid 1px;

}
.alert-blue{


color:#170CA5;
background-color:#E6E6F1;
padding:11px 12px 9px;
border-radius:4px;
margin-bottom:10px;
border:solid 1px;


}

/* .btn-primary:active, .btn-primary[disabled]{

background:#d34932;
border:1px solid #d34932;
}
*/
</style>
</head>
<body>

 <header class="navbar-fixed-top">
                        <div id="mainHeader" role="banner">
                                <div class="container">
                                        <nav class="navbar navbar-default scrollMenu" role="navigation">
                                                <div class="navbar-header">
                                                        <a class="navbar-brand" href="http://www.ivystudentsprofile.com" ><img src="../images/logo3.png"  alt="Ivystudentprofiles" /></a>
                                                </div>
</nav></div></div></header>

<div class='container'>

<div class='row'>
<div class="col-md-8 col-md-offset-2">
<p id='text1' class="alert-blue" style="display:none;text-align:center">Your password has been changed. <a href="http://www.ivystudentsprofile.com/?value=login">Login to continue</a></p>
</div>
<div class='col-md-6 col-md-offset-3'>
<div align='center'><h2 class='subTitle' style='font-weight:bold;color:#333'>Reset Password</h2> 
<p style='display:inline'>Enter your new password (at least 6 characters long)</p><br><br>
<p id='text' class="alert-red" style="display:none;text-align:justify"></p>
<div class="row">
<div class="col-md-4">
<h4 style="font-weight:bold" >New Password</h4>
</div>
<div class="col-md-8">
<input type='password' id='password'  name='password'  class='form-control'  />
</div></div>
<br><div class="row">
<div class="col-md-4">
<h4 style="font-weight:bold" >Confirm Password</h4>
</div>
<div class="col-md-8">
<input type='password' id='password1'  name='password'  class='form-control'   />
</div></div>
<br><br>
<input type="hidden" id="key" value="<?php echo $key; ?>"  >
<a class='btn btn-primary btn-md' id='twit_mail'>Update Password</a></div></div></div>";

<script type='text/javascript' src='../js-plugin/jquery/1.8.3/jquery.min.js'></script>
<script type='text/javascript' src='../bootstrap/js/bootstrap.js'></script>
  <script>

$('#twit_mail').click(function() {
 var password = $('#password').val(); // assuming this is a input text field
var password1=$("#password1").val();
var key=$("#key").val();
 $.post('verify.php',{'password' : password,'password1':password1,'key':key}, function(data) {
if(data)
{
$("#text1").hide();
$('#text').text(data);
$('#text').show();


}
else
{
$('#text').hide();
$("#text1").show();
$("#password").prop('disabled', true);
$("#password1").prop('disabled', true);
$("#twit_mail").hide();
}
});
});






</script>

</body></html>
