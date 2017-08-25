<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
$id=$_SESSION['id'];
include "database.php";
$sql = "SELECT * FROM LoginDetails WHERE user_id=". $_SESSION['id'];
 $select = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($select)){

    $name = $row['name'];
$com_code=$row['com_code'];
$email=$row['email'];
$user_pic=$row['user_pic'];
$array = explode(' ', $name, 2);
$name=$array[0];
}

$query="SELECT * from TextMessages where receiver_id=$id and is_read=0";
$execute= mysqli_query($conn, $query);
 $rowcount=mysqli_num_rows($execute);//messages
$query1="SELECT * from RequestsRecords where (reviewer_id=$id and is_read_reviewer=1)or( sender_id=$id and is_read_sender=1) or(reviewer_id=$id and read_request_reviewer=1) or ( sender_id=$id and read_request_sender=1) or (sender_id=$id and reviewer_response=1) or (reviewer_id=$id and submitter_response=1)";
$execute1= mysqli_query($conn, $query1);
 $essaycount=mysqli_num_rows($execute1);//received/sent essay review request or received/sent essay to review
$query="SELECT * from ReviewEssays where user_id=$id and is_read=1";
$execute= mysqli_query($conn, $query);
 $count=mysqli_num_rows($execute);//approved to be a reviewer
$total=$count+$essaycount;
echo '<style>
.img-circle{
height:40px;
width: 40px;
}
.ui-state-hover,  .ui-state-hover, .ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus {
    background:#d34932;
 color:white;
}
 .ui-widget-content{
 border: 1px solid lightgray;
 box-shadow: -1px 1px 2px 2px lightgray;
}
</style> 
 <header class="navbar-fixed-top">
                        <div id="mainHeader" role="banner">
                                <div class="container">
                                        <nav class="navbar navbar-default scrollMenu" role="navigation">
                                                <div class="navbar-header">
                                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                                                <span class="sr-only">Toggle navigation</span>
                                                                <span class="icon-bar"></span>
                                                                <span class="icon-bar"></span>
                                                                <span class="icon-bar"></span>
                                                        </button>
                                                        <a class="navbar-brand" href="http://www.ivystudentsprofile.com" ><img src="/images/logo3.png"  alt="Ivystudentsprofile" /></a>
                                                </div>
<div class="collapse navbar-collapse" id="mainMenu">
  <ul class="nav navbar-nav pull-right">

<li class="primary">
                                                                        <a href="/user.php?id='.$id.'" class="firstLevel"><i class="icon-home" style="display:inline;float:none;"></i>Home</a>
</li>

<li class="sep"></li>

                                                <li class="primary">';
 if($essaycount>0 || $count>0) echo '
<a style="cursor:pointer;" class="firstLevel hasSubMenu"><sup><span class="badge" style="background-color:#d34932">'. $total .'</span></sup>&nbsp;<i class="icon-book"  style="float:none;display:inline;"></i>Review Essays</a>';
else echo '<a style="cursor:pointer;" class="firstLevel hasSubMenu">&nbsp;<i class="icon-book"  style="float:none;display:inline;"></i>Review Essays</a>';
echo '

<ul class="subMenu">';
 if($essaycount>0) echo '
<li><a href="/ReviewEssay/notification.php" >Notifications<span class="badge pull-right" >'.$essaycount.'</span></a></li>';
else echo 
'<li><a href="/ReviewEssay/notification.php" >Notifications</a></li>';
echo '
<li><a href="/ReviewEssay/view-reviewers.php" >Reviewers List</a></li>
<li><a href="/ReviewEssay/review-essay.php" >Submit Essay for Review</a></li>';
if($count>0)
echo'
<li><a href="/ReviewEssay/reviewer.php">Become a Reviewer<span class="badge pull-right" >'.$count.'</span></a></li>';
else echo '<li><a href="/ReviewEssay/reviewer.php">Become a Reviewer</a></li>';
echo '
</ul>




</li>

<li class="sep"></li>
<li class="primary">';
if($rowcount>0) echo
'
 <a style="cursor:pointer;" class="firstLevel hasSubMenu" ><sup><span class="badge" style="background-color:#d34932">'. $rowcount .'</span></sup>&nbsp;Hi, '.$name.'&nbsp;';
else
echo '<a style="cursor:pointer;" class="firstLevel hasSubMenu" >Hi, '.$name.'&nbsp;&nbsp;';
if($user_pic)echo '
<img src="'.$user_pic.'" class="img-circle">';
else
echo '<img src="/images/avtar.png" class="img-circle">';
echo '
</a>
<ul class="subMenu">
<li><a href="/user-profile.php?id='.$id.'" >Build Your Profile</a></li>';
if($rowcount>0) echo
'
 <li><a href="/accounts/messages.php">Messages<span class="badge pull-right" >'.$rowcount.'</span></a></li>';
else
echo ' <li><a href="/accounts/messages.php">Messages</a></li>';
echo '

                                                                                <li><a href="/logout.php">Log Out</a></li>
</ul>
</li>
</ul>

<form class="nav navbar-nav" role="form"  style="float:none;" action="/search/search-results.php" >
                                                                   <div   class="input-group input-group-sm" >
                                                  <input type="text" name="search"  id="search" class="form-control" placeholder="Search by name">
    <span class="input-group-btn">
                                                                                        <button type="submit" class="btn btn-sm"><i class="icon-search"></i></button>
                                                                                </span>
                                                                </div>
</div>
</form>

</nav>



</div></div></header>
';
?>
