<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);


include "../database.php";
$id=$_SESSION['id'];
$file=$_POST['file'];
$new=explode("/",$file);
$n=$new[4];
system("rm -r ../uploads/".$id."/sop/".$n);
$sql = "SELECT * FROM UserDetails WHERE user_id=". $id;
 $select = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($select)){

    $sop_path = $row['sop_essay'];
}
$trimmed=str_replace($file,"",$sop_path);
$sql = "UPDATE UserDetails set sop_essay='$trimmed' WHERE user_id=".$id;
$conn->query($sql);

echo "Essay is deleted.";
?>
