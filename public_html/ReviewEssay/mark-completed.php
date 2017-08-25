<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
include '../database.php';
$id=$_SESSION['id'];
$eid=$_POST['eid'];
$improvise=$_POST['improvise'];
$sql = "UPDATE EssaysForReview set  completed=1  WHERE e_id='$eid'";
$conn->query($sql);
$sql = "SELECT reviewer_id FROM EssaysForReview WHERE e_id='$eid'";
$select = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($select);
$reviewer=$row['reviewer_id'];
$sql = "SELECT * FROM LoginDetails WHERE user_id=$reviewer";
$select = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($select);
$rname=$row['name'];
$remail=$row['email'];

$sql = "SELECT * FROM LoginDetails WHERE user_id=$id";
$select = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($select);
$sname=$row['name'];
$semail=$row['email'];

$message="Hi $rname,<br><br>$sname has marked the essay review process as <a href='http://www.ivystudentsprofile.com/ReviewEssay/process.php?eid=$eid'>completed</a>. We would like to inform you that we will transfer the amount to your account in the next 24 hours. You will receive a confirmation email on the same. Please ensure that your <a href='http://www.ivystudentsprofile.com/ReviewEssays/reviewer.php'>payment details</a> have been updated on the website.<br><br>We would like to thank you for your contribution towards Ivystudentsprofile and for helping students with college admission and application essays.<br><br>Please feel free to respond to this email in case you have any query.<br><br>Thanks,<br>Ivystudentsprofile";
$headers = "" .
      //         "Reply-To:" . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Ivystudentsprofile<ivyprofiles@ivystudentsprofile.com>'. "\r\n";
$headers .= "Bcc: ivyprofiles@ivystudentsprofile.com\r\n";
mail($remail,"Essay Review Process Completed", $message, $headers,'-fivyprofiles@ivystudentsprofile.com');


$message="Hi $sname,<br><br>Your essay review process has been marked <a href='http://www.ivystudentsprofile.com/ReviewEssay/process.php?eid=$eid'>completed</a>. We would like to thank you for using Ivystudentsprofile as a platform to review your college admission essay and we wish you all the best with your college application.<br><br>Thanks,<br>Ivystudentsprofile";
$headers = "" .
      //         "Reply-To:" . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Ivystudentsprofile<ivyprofiles@ivystudentsprofile.com>'. "\r\n";
$headers .= "Bcc: ivyprofiles@ivystudentsprofile.com\r\n";
mail($semail,"Essay Review Process Completed", $message, $headers,'-fivyprofiles@ivystudentsprofile.com');
$sql = "INSERT INTO RequestsRecords (sender_id,reviewer_id,e_id,feedback,submitter_response) VALUES ($id,$reviewer,'$eid',3,1 )";
$conn->query($sql);
if($improvise)
{

$sql = "INSERT INTO ReviewerFeedback (submitter,reviewer,e_id,feedback) VALUES ($id,$reviewer,'$eid','$improvise' )";
$conn->query($sql);


}
echo "success";


?>
