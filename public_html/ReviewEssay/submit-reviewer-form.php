<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
include "../database.php";
$id=$_SESSION['id'];
$days=$_POST['days'];
$price=$_POST['price'];
$notes=$_POST['notes'];
$notes=$conn->real_escape_string($notes);
$sql = "SELECT * FROM ReviewEssays WHERE user_id =".$id;
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
$sql = "UPDATE ReviewEssays set price=$price, days=$days, notes='$notes', is_approved=0, date=now()  WHERE user_id=".$id;
$conn->query($sql);

}
else{

$sql = "INSERT INTO ReviewEssays (user_id,days, price, notes) VALUES ($id,$days,$price,'$notes'  )";
$conn->query($sql);
}

//$notes=str_replace ('<br>' , '\r\n', $_POST['notes']);
$notes=$_POST['notes'];
$message="<b>User Id:</b> ".$id."<br><b>Days: </b>".$days."<br><b>Price: </b>".$price."<br><br><b>Notes: </b>".nl2br($notes);
$headers = "" .
      //         "Reply-To:" . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//$headers .= 'From: ' . $email . "\r\n";
mail("ivyprofiles@ivystudentsprofile.com","User Essay Review Application Form", $message, $headers,'-fivyprofiles@ivystudentsprofile.com');

echo "<script>window.location.href='http://www.ivystudentsprofile.com/ReviewEssay/reviewer.php';</script>";

?>
