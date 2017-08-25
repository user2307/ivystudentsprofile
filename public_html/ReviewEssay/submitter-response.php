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
$response=trim($_POST['response']);
if(trim(strip_tags($check_essay))=='')
$data="Please paste the revised essay before proceeding.";
elseif($response=='')
$data="Please enter your comments/query on the existing essay.";
else
{
$sql = "INSERT INTO EssayThread(user_id,e_id,essay,comments) VALUES ($id,'$e_id','$essay','$response' )";
$conn->query($sql);
$data="success";

$sql = "SELECT * from EssaysForReview where e_id='$e_id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$reviewer_id=$row['reviewer_id'];

$sql = "SELECT * FROM LoginDetails WHERE user_id =$reviewer_id";
$query = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($query);
$rname= $row1['name'];
$email=$row1['email'];
$sql = "SELECT * FROM LoginDetails WHERE user_id =$id";
$query = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($query);
$sname= $row1['name'];
$message="Hi $rname,<br><br>$sname has posted a response to the essay you recently reviewed. Please see the following link to check applicant's response.<br><a href='http://www.ivystudentsprofile.com/ReviewEssay/process.php?eid=$e_id'>http://www.ivystudentsprofile.com/ReviewEssay/process.php?eid=$e_id</a><br><br>Please look into student's query and respond accordingly. Based on student's response, you might be required to revise the essay again and provide updated essay to the student. <br><br>Thanks,<br>Ivystudentsprofile";
$headers = "" .
      //         "Reply-To:" . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Ivystudentsprofile<ivyprofiles@ivystudentsprofile.com>'. "\r\n";
$headers .= "Bcc: ivyprofiles@ivystudentsprofile.com\r\n";
mail($email,"Student's Response Regarding Essay Review", $message, $headers,'-fivyprofiles@ivystudentsprofile.com');
//notification
$sql = "INSERT INTO RequestsRecords(e_id,sender_id,reviewer_id,submitter_response,feedback) VALUES ('$e_id',$id,$reviewer_id,1,2)";
$conn->query($sql);
}
echo $data;
?>
