<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);


include "../database.php";
$id=$_SESSION['id'];
$file=$_POST['file'];
$new=explode("/",$file);
$n=$new[4];
$lol=[];
system("rm -r ../uploads/".$id."/lor/".$n);
$sql = "SELECT * FROM UserDetails WHERE user_id=". $id;
 $select = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($select)){

    $sop_path = $row['lor_path'];
}
$arr=explode("@@#",$sop_path);
$j=0;
for($i=0;$i<count($arr);$i++)
{
if($file!=$arr[$i])
{
$lol[$j]=$arr[$i];
$j++;
}


}
$final=implode("@@#",$lol);
//$trimmed=str_replace($file,"",$sop_path);
$sql = "UPDATE UserDetails set lor_path='$final' WHERE user_id=".$id;
$conn->query($sql);

echo "Letter is deleted.";
?>
