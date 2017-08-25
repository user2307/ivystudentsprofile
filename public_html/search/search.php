<?php
include "../database.php";
$search=$_POST['term'];
$sql = "SELECT * FROM LoginDetails WHERE name LIKE '%".$search."%' and active!=2 ORDER BY user_id desc LIMIT 10";
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
