<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
include '../database.php';
$id=$_SESSION['id'];
$e_id=$_POST['e_id'];
$essay=$_POST['essay'];
$essay=htmlspecialchars($essay, ENT_QUOTES);
$check_essay=htmlspecialchars_decode($essay);
//$check_essay=strip_tags($essay);
$feedback=trim($_POST['feedback']);
if(trim(strip_tags($check_essay))=='')
$data="Please paste the revised essay before proceeding.";
elseif($feedback=='')
$data="You must provide detailed feedback on the essay";
elseif(strlen($feedback)<50)
$data="Please provide detailed feedback on the essay. Include all the points that will help improve the essay. A short feedback is not acceptable.";
else
{
$sql = "INSERT INTO EssayThread(user_id,e_id,essay,comments) VALUES ($id,'$e_id','$essay','$feedback' )";
$conn->query($sql);
$data="success";


$sql = "SELECT * from EssaysForReview where e_id='$e_id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$submitter_id=$row['submitter_id'];

$sql = "SELECT * FROM LoginDetails WHERE user_id =$submitter_id";
$query = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($query);
$sname= $row1['name'];
$email=$row1['email'];
$sql = "SELECT * FROM LoginDetails WHERE user_id =$id";
$query = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($query);
$rname= $row1['name'];
$message="Hi $sname,<br><br>$rname has completed reviewing your essay. Please see the following link to view revised essay and to read reviewer's feedback.<br><a href='http://www.ivystudentsprofile.com/ReviewEssay/process.php?eid=$e_id'>http://www.ivystudentsprofile.com/ReviewEssay/process.php?eid=$e_id</a><br><br>Thanks,<br>Ivystudentsprofile";
$headers = "" .
      //         "Reply-To:" . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Ivystudentsprofile<ivyprofiles@ivystudentsprofile.com>'. "\r\n";
$headers .= "Bcc: ivyprofiles@ivystudentsprofile.com\r\n";
mail($email,"Essay Review Completed", $message, $headers,'-fivyprofiles@ivystudentsprofile.com');
//notification
$sql = "INSERT INTO RequestsRecords (e_id,sender_id,reviewer_id,reviewer_response,feedback) VALUES ('$e_id',$submitter_id,$id,1,1 )";
$conn->query($sql);
}
echo $data;
?>
