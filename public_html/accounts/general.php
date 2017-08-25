<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
include "../database.php";
$id=$_SESSION['id'];
$univname=$_POST['name'];
$degree="NULL";
 if (isset($_POST['optradio'])){
        $degree = $_POST['optradio'];
}
$degtype=$_POST['degtype'];
$subject=$_POST['subject'];
$sat=$_POST['sats'];
$toefl=$_POST['toefls'];
$ielts=$_POST['ielt'];
$gre=$_POST['gres'];
$analyticalscore="NULL"; 
 $selectgresub ="NULL";
if (isset($_POST['ana']))
$analyticalscore=$_POST['ana'];
$gresub="NULL";
 if (isset($_POST['optradio1'])){  //to check if person appeared in gre subject test
        $gresub = $_POST['optradio1'];
}
if ($gresub=="1")// if yes,
{
$subscr=$_POST['subscr'];//sub score


if (isset($_POST['gresub'])){  //subject gre name
        $selectgresub = $_POST['gresub'];
}


}
if ($_POST['dynfields']) {
    $values = implode("@@#", $_POST['dynfields']);
}
if ($_POST['scorefields']) {
    $values1 = implode("@@#", $_POST['scorefields']);
}
$sql = "SELECT * FROM UserProfile WHERE user_id = ".$id;
$select = mysqli_query($conn, $sql);


if (!(mysqli_num_rows($select) > 0)) {
$sql = "INSERT INTO UserProfile (user_id,univ_name,degree_type, list_degree_type, major, sat, gre, gre_analytical, appear_gre_subject, gre_subject, gre_subject_score, toefl, ielts, other_test_name, other_test_score)VALUES ($id,'$univname',$degree, '$degtype', '$subject','$sat','$gre',$analyticalscore,'$gresub','$selectgresub','$subscr','$toefl','$ielts','$values','$values1'  )";
if ($conn->query($sql) === TRUE) {
}
}
else
{
$sql = "UPDATE UserProfile set univ_name='$univname', degree_type=$degree,  list_degree_type='$degtype', major='$subject', sat='$sat', gre='$gre', gre_analytical=$analyticalscore, appear_gre_subject='$gresub', gre_subject='$selectgresub', gre_subject_score='$subscr', toefl='$toefl', ielts='$ielts', other_test_name='$values', other_test_score='$values1' WHERE user_id=".$id;
$conn->query($sql);
 
}

echo "<script>window.location.href='http://www.ivystudentsprofile.com/user-profile.php?id=$id';</script>";
?>

