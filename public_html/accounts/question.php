<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);


include "../database.php";
$id=$_SESSION['id'];
$question=$_POST['question'];
//if($question!=""){
$sql = "INSERT INTO ProblemDetails (user_id,problem_details) VALUES ($id,'$question')";
$conn->query($sql);
/*}
else
echo "Please insert some text to proceed.";
*/

?>
