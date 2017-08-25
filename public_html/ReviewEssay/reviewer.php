<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$id=$_SESSION['id'];
include "../database.php";
$details="SELECT * FROM ReviewEssays WHERE user_id=$id";
 $find = mysqli_query($conn, $details);
$is_approved=2;
while($row2 = mysqli_fetch_assoc($find)){
$days=$row2['days'];
$price=$row2['price'];
$notes=$row2['notes'];
$is_approved=$row2['is_approved'];//0 pending, 1 approved, 2 neutral, 3 unapproved
$disapproval_reason=$row2['disapproval_reason'];
$date=$row2['date'];
$payment_email=$row2['payment_email'];
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
	<meta charset="utf-8">
	<title>Review Essays - Ivystudentsprofile</title>
	<meta name="description" content="Review essays of future students on Ivystudentsprofile and get paid.">
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

.alert-blue{


color:#170CA5;
background-color:#E6E6F1;
padding:11px 12px 9px;
border-radius:4px;
margin-bottom:10px;
border:solid 1px;


}
.justify{
font-family: verdana;text-align:justify;
}
span.icon-edit.iconBig.iconRounded:hover,span.icon-doc-text.iconBig.iconRounded:hover,span.icon-ok-circled.iconBig.iconRounded:hover{
background:none;
color:#d34932;
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
							<div class="span12 text-center mb40">
								<h1>Review Essays</h1>
								<h2 class="subTitle">Review college application essays of future students and get paid </h2>
							</div>
</div></div></section>
<section id="content" class="pb30">
					<div class="container">
<div class='row'>
<div class="col-md-12">
<div id="text1" style="display:none;">
<p  class="alert-blue" style="text-align:justify">Your application has been submitted and is pending review. On an average, it will take us four business days to review your application.</p>
<p> If you would like to make any modification to your existing application form, please drop us a note at <a href="mailto:ivyprofiles@ivystudentsprofile.com">ivyprofiles@ivystudentsprofile.com</a></p>
</div>
<?php if($is_approved==1) echo '
<div class="row"><div class="col-md-12">
<a class="btn btn-link pull-right" data-target="#payment" data-toggle="modal">Payment Details</a></div></div>
<div class="alert alert-success">Your application review has been completed and it is approved.</div>
<p> If you would like to make any modification to your existing application form, please drop us a note at <a href="mailto:ivyprofiles@ivystudentsprofile.com">ivyprofiles@ivystudentsprofile.com</a></p>
';
elseif($is_approved==3) echo '
<div class="alert alert-danger">Your application has not been approved. Please check below for more details.</div>
';


?>
</div></div>
						<div class="row">
							<div class="col-md-12 boxFocus pt30 mb30">



<h2>Become an essay reviewer</h2>
<p class="justify">Please read the following guidelines carefully before you submit your application to become an essay reviewer on Ivystudentsprofile:</p>
<div class="row mb15">
									<div class="col-sm-12">
										<ul  class="justify">
<li>
 You must be currently enrolled at a university or at least have Bachelor's degree from an elite institution.
</li>
<li>
Ensure that your <a href="../user-profile.php?id=<?php echo $id; ?>" >public profile</a> on Ivystudentsprofile is complete.
</li>
</ul></div></div>		
<h2>How the process works?</h2>
<div class="row mb15">
                                                                        <div class="col-sm-12">
<div align="center"><h3>Three Easy Steps</h3></div>
<table width="100%"> <tbody>
<tr><td  style="text-align:center" width="(100/3)%"><span class="badge">1</span><h5 style="display:inline-block;margin-left:5px;">Submit Application</h5></td><td  style="text-align:center" width="(100/3)%"><span class="badge">2</span><h5  style="display:inline-block;margin-left:5px;">Review Essays</h5></td ><td width="(100/3)%" style="text-align:center"><span class="badge">3</span><h5 style="display:inline-block;margin-left:5px;">Get Paid</h5></td></tr>
<tr><td  style="text-align:center" width="(100/3)%">
<span class="icon-edit iconBig iconRounded"  style="display:inline-block;"></span>
</td><td  style="text-align:center"   width="(100/3)%"><span class="icon-doc-text iconBig iconRounded" style="display:inline-block;" ></span></td><td  style="text-align:center" width="(100/3)%"><span class="icon-ok-circled iconBig iconRounded"  style="display:inline-block;"></span>
</td></tr>
</tbody></table>
</div></div>
<h2>What happens after you submit the application?</h2>	
<div class="row mb15">
                                                                        <div class="col-sm-12">
<ul  class="justify"><li>After you submit your application on Ivystudentsprofile, we will review your application based on the information you provide in the submission form and your public profile.
On an average, it will take us four business days to review your application.</li><li> Once approved, you will be listed as a reviewer on our website. 
Prospective students can then search for you and send you requests to review their college application essays.   
</li></ul>
</div></div>
<h2>How much can you earn?</h2>
<div class="row mb15">
                                                                        <div class="col-sm-12">

<ul  class="justify"><li>
The pricing begins at 10$ per essay. We follow "Name-Your-Own-Price" model where reviewers quote a certain price and then they wait until a potential student sends them a request. 
</li>
<li>All successful transactions will result in 25% processing fee. We currently process payments via PayPal only.</li>

</ul>
</div></div>
</div></div></div></section>
<section  class="pb30" id="not_loggedin" style="display:none;">
                                        <div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div align="center"><a class="btn btn-lg btn-primary btn-block" href="http://www.ivystudentsprofile.com/">Start Your Application</a></div>


</div></div></div></section>
<section  class="pb30" id="application">
                                        <div class="container">
<div class="row">
<div class="col-md-12">
<?php
if($is_approved==3) echo '
<div class="alert alert-danger">'.$disapproval_reason.'</div>
<p>If you\'ve got a question regarding your application, please feel free to contact us at <a href="mailto:ivyprofiles@ivystudentsprofile.com">ivyprofiles@ivystudentsprofile.com</a></p>
';
?>

</div></div>
                                                <div class="row">
                                                        <div class="col-md-12 ">



<h2>Submit Your Application</h2>
<p class="justify">
									Fill the following application form if you are interested in becoming an essay reviewer on Ivystudentsprofile. Before submitting your application, please ensure that your  <a href="../user-profile.php?id=<?php echo $id; ?>" >profile</a> is complete.
								</p>
<form method="post" action="submit-reviewer-form.php" id="contactfrm" role="form" novalidate="novalidate">
<div class="form-group">
                                                                                <h4>How much time would you need to review an essay?</h4>

<select  rel='popover' name="days"  data-placement='right' data-trigger='focus' data-content="Students prefer reviewers who can deliver reviewed essays in less time. You are more likely to get review requests if you can deliver the content within a day or two." <?php if($is_approved==0 || $is_approved==1) echo "disabled"; ?>>
  <option value="1" <?php if($days==1) echo "selected";?>>1 Day</option>
  <option value="2"  <?php if($days==2) echo "selected";?>>2 Days</option>
  <option value="3"  <?php if($days==3) echo "selected";?> >3 Days</option>
<option value="4"  <?php if($days==4) echo "selected";?> >4 Days</option>
</select>
</div>
<div class="form-group">
										<h4 for="price">Quote your price</h4>
									<input type="text" class="form-control required digits" style="width:10%" value="<?php if($price) echo $price; ?>" name="price" data-content="It is recommended you quote a decent price. Low price will help you fetch more review requests. All prices are entered in USD ($)." rel='popover' data-placement='right' data-trigger='focus' id="price"  <?php if($is_approved==0 || $is_approved==1) echo "disabled"; ?>>
									</div>
<div class="form-group">
										<h4 for="notes">Mention briefly about your reviewing techniques. Include all the details that you think might be useful for the students.</h4>
										<textarea name="notes"  minlength="50"   title="Please describe your reviewing techniques (at least 50 characters)" class="form-control" id="notes" cols="3" rows="5" required <?php if($is_approved==0 || $is_approved==1) echo "disabled"; ?> ><?php if($notes) echo $notes; ?></textarea>
									</div>
<p style="float:right;"><?php if($is_approved!=2) echo "Submitted on: ".date("j-M-Y",strtotime($date)); ?>
</p>
<br>

<div class="result"></div>
									<button name="submit" type="submit" onclick="return reviewer(); "  class="btn btn-primary" id="submit"> Submit</button>
</form>
</div></div></div></section>
<section  class="pb30" id="application">
                                        <div class="container">
<div class="row">
<div class="col-md-12">
<h2>FAQ</h2>






					<div class="row">
						<div class="col-md-12">
							<div class="panel-group" id="accordion">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												<i class="icon-direction"></i>Why do I need to fill my public profile to become an essay reviewer? 
											</a>
										</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse in" >
										<div class="panel-body">
<p class="justify">A completely filled profile establishes your credibility in the market. It allows prospective students to learn about your academic background before they send you request to review their essays.</p>										
</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
								  <i class="icon-direction"></i>How much time would I be provided to review an essay?</a>
										</h4>
									</div>
									<div id="collapseThree" class="panel-collapse collapse">
										<div class="panel-body">
<p class="justify">We expect you to respond with revised essay within the time period you specified in your application form. However, if you are not able able to respond within specified time frame, you'll be penalized. You'll be paid 10% less than the expected earning for every extra day. But if you fail to respond within four days for a particular applicant, the essay review form provided for the particular applicant will be cancelled.</p>
										</div>
									</div>
								</div>
<div class="panel panel-default">
                                                                        <div class="panel-heading">
                                                                                <h4 class="panel-title">
                                                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                                                  <i class="icon-direction"></i>Is one time feedback enough for the student?</a>
                                                                                </h4>
                                                                        </div>
                                                                        <div id="collapseFive" class="panel-collapse collapse">
                                                                                <div class="panel-body">
<p class="justify">No, one time feedback can never be considered enough. We are providing a platform to students to help them carve perfect essays. Therefore, after receiving the revised essay from reviewer, student must work on the points as mentioned in reviewer's feedback and respond to reviewer for second revision and further clarification. This process will continue unless the student marks the process as "completed".</p>
                                                                                </div>
                                                                        </div>
                                                                </div>
<div class="panel panel-default">
                                                                        <div class="panel-heading">
                                                                                <h4 class="panel-title">
                                                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                                                                  <i class="icon-direction"></i>I reviewed the essay and sent the revised essay to student along with my feedback. But neither the student has responded nor marked the process as 'completed'. What should I do next?</a>
                                                                                </h4>
                                                                        </div>
                                                                        <div id="collapseSix" class="panel-collapse collapse">
                                                                                <div class="panel-body">
<p class="justify">We generally wait for three days after receiving reviewer's response. If the student does not respond within three days nor marks the process as 'completed', we will mark the process as 'completed' and the required amount will be credited to reviewer's account.</p>
                                                                                </div>
                                                                        </div>
                                                                </div>

<div class="panel panel-default">
                                                                        <div class="panel-heading">
                                                                                <h4 class="panel-title">
                                                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                                                  <i class="icon-direction"></i>How do I cancel my application if I no longer want to review essays?</a>
                                                                                </h4>
                                                                        </div>
                                                                        <div id="collapseFour" class="panel-collapse collapse">
                                                                                <div class="panel-body">
<p class="justify">Please write to us at <a href="mailto:contact@ivystudentsprofile.com">contact@ivystudentsprofile.com</a></p>
                                                                                </div>
                                                                        </div>
                                                                </div>
							</div>
						</div>
					</div>


		</section>






<!--video-->
<section id="videoHome" >	
<h2>Watch The Demo</h2>	
					
					<div class="videoWrapper">
						<iframe src="https://www.youtube.com/embed/SqEjtv-J2qI?cc_load_policy=1&autoplay=1" width="500" height="281" frameborder="0"  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>	
				</section>
<!--video-->





</div></div></div></section>
</section>
<!--modal-->
<div id="payment" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Payment Details</h4>
      </div>
<?php if(!$payment_email) echo '
<form method="post"  action="payment-details.php" id="contactfrm1" role="form">
      <div class="modal-body">
<p class="text-info text-center">Please make sure you enter correct payment details. Once submitted, you will not be able to modify the details.</p>
<p>Please enter your PayPal Account (Email) to receive payments:</p>
<div id="error"></div>
<input type="email" class="form-control" name="email" id="email" placeholder="Enter PayPal Email" title="Please enter a valid email address" />  
</div>
   <div class="modal-footer">
        <button class="btn btn-sm btn-primary" >Submit</button>
  </div>
</form>';
else
echo " <div class='modal-body'><p>Your payments will be made to the following email address.<br><b>".$payment_email."</b></p><p class='text-muted'>If you'd like to update your payment information, please <a href='/contact.php'>Contact Us</a> or write to us at <a href='mailto:ivyprofiles@ivystudentsprofile.com'>ivyprofiles@ivystudentsprofile.com</a></p>
</div>
";?>
    </div>

  </div>
</div>

<!--end modal-->	
											<?php include '../footer.php'; ?>	
							</div>
			<!-- global wrapper -->
<?php
include '../js/commonjs.php'; 
if($is_approved==0)
{
echo "<script>$('#submit').remove();$('#text1').show();</script>";

}
if($is_approved==1)
echo "<script>$('#submit').remove();</script>";
if(!$id)
echo "<script>$('#application').remove();$('#not_loggedin').show();</script>";
?>
<script>
jQuery(document).ready(function() {
        jQuery('[rel=popover]').popover();
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
$(document).ready(function () {

    $('#contactfrm1').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                email: true
            }
        },
errorPlacement: function(error, element) {
$("#error").append(error);
}
    });

});
</script>
<?php 
$sql = "UPDATE ReviewEssays set is_read=0  WHERE user_id=".$id;
$conn->query($sql);

include '../analyticstracking.php'; ?>
</body>
</html>

