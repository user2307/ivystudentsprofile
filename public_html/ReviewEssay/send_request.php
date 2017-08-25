<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
$id=$_SESSION['id'];

include "../database.php";
$reviewerid=$_POST['reviewerid'];
$sql = "SELECT * FROM LoginDetails WHERE user_id =$reviewerid";
$query = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($query);
$name= $row1['name'];
$email=$row1['email'];
$message="Hi $name,<br><br>You have received a new request to review college application essay. Please see the following link to accept the request:<br><a href='http://www.ivystudentsprofile.com/ReviewEssay/notification.php'>View Request</a><br><br>Thanks,<br>Ivystudentsprofile";
$headers = "" .
      //         "Reply-To:" . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Ivystudentsprofile<ivyprofiles@ivystudentsprofile.com>'. "\r\n";
$headers .= "Bcc: ivyprofiles@ivystudentsprofile.com\r\n";
mail($email,"New Essay Review Request Received", $message, $headers,'-fivyprofiles@ivystudentsprofile.com');
$sql = "INSERT INTO RequestsRecords (sender_id,reviewer_id,read_request_reviewer,accepted) VALUES ($id,$reviewerid,1,0 )";
$conn->query($sql);

echo "sent";
?>
