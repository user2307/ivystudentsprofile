<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
$id=$_SESSION['id'];
include "../database.php";
$sender_id=$_POST['senderid'];
$sql = "SELECT * FROM RequestsRecords WHERE sender_id=".$sender_id." and reviewer_id=".$id;
$query = mysqli_query($conn, $sql);
$row5 = mysqli_fetch_assoc($query);
$accepted= $row5['accepted'];
$eid=uniqid();
if($accepted==0){


$sql = "UPDATE RequestsRecords set accepted=1,request_accepted=now(),read_request_sender=1,e_id='$eid'  WHERE sender_id=$sender_id and reviewer_id=$id";
$conn->query($sql);

$sql = "SELECT * FROM LoginDetails WHERE user_id =$sender_id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$sendtoname= $row['name'];
$sendtoemail=$row['email'];
$sql = "SELECT * FROM LoginDetails WHERE user_id =".$id;
$query = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($query);
$reviewername= $row1['name'];

$message="Hi $sendtoname,<br><br>$reviewername has accepted your request to review your college application essay. Please see the following link to submit your essay for review:<br><a href='http://www.ivystudentsprofile.com/ReviewEssay/process.php?eid=$eid'>Submit Essay For Review</a><br><br>Thanks,<br>Ivystudentsprofile";
$headers = "" .
      //         "Reply-To:" . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Ivystudentsprofile<ivyprofiles@ivystudentsprofile.com>'. "\r\n";
$headers .= "Bcc: ivyprofiles@ivystudentsprofile.com\r\n";
mail($sendtoemail,"Essay Review Request Accepted", $message, $headers,'-fivyprofiles@ivystudentsprofile.com');

$sql = "INSERT INTO EssaysForReview (e_id,submitter_id,reviewer_id,completed) VALUES ('$eid',$sender_id,$id,0 )";
$conn->query($sql);

$err= "success";
}
else
$err="You've already accepted the request";
echo $err;
?>
