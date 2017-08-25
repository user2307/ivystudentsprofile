<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
include '../database.php';
$id=$_SESSION['id'];
$essay=$_POST['essay'];
$essay=htmlspecialchars($essay, ENT_QUOTES);
$comments=$_POST['comments'];
$university=$_POST['university'];
//$reviewer=$_POST['reviewer'];
$eid=$_POST['eid'];
//$sql = "SELECT * FROM EssaysForReview WHERE e_id='$eid'";//submitter_id = $id and reviewer_id=$reviewer";
//$select = mysqli_query($conn, $sql);

//if (mysqli_num_rows($select) > 0) {
$sql = "UPDATE EssaysForReview set essay='$essay', comments='$comments', university_details='$university'  WHERE  e_id='$eid'";//submitter_id=$id and reviewer_id=$reviewer";
$conn->query($sql);

//}
/*else{

$sql = "INSERT INTO EssaysForReview (submitter_id,essay,comments,university_details,reviewer_id) VALUES ($id,'$essay','$comments','$university',$reviewer )";
$conn->query($sql);
}*/
echo "success";
?>
