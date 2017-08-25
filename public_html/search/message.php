<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);

$id=$_SESSION['id'];
 
include "../database.php";
$search=$_POST['term'];
$sql = "SELECT * FROM LoginDetails WHERE name LIKE '%".$search."%' and active!=2 and user_id!=$id ORDER BY user_id desc LIMIT 5";
 $select = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($select)){

    $name = $row['name'];
$userid=$row['user_id'];
$user_pic=$row['user_pic'];
$myarray[] = array("id"=> $userid, "name" => $name, "pic"=>$user_pic);

}
echo json_encode($myarray);
//echo $search;
?>
