<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
include "../database.php";
$id=$_SESSION['id'];
$resume=$_POST['resume'];
$resume=htmlspecialchars($resume, ENT_QUOTES);
$sql = "SELECT * FROM UserDetails WHERE user_id = ".$id;
$select = mysqli_query($conn, $sql);

if (!(mysqli_num_rows($select) > 0)) {

$sql = "INSERT INTO UserDetails (user_id,resume_path) VALUES ($id,'$resume')";
$conn->query($sql);
}
else
{
$sql = "UPDATE UserDetails set resume_path='$resume'  WHERE user_id=".$id;
$conn->query($sql);
}
echo "done";

/*if (!file_exists('../uploads/'.$id.'/resume')) {
mkdir("../uploads/".$id."/resume",0777,true);
}
  $tmpFilePath = $_FILES['putresume']['tmp_name'];
  if ($tmpFilePath != ""){
if($_FILES['putresume']['size']>=512000)
{
echo "File size must be less than 500 KB";
exit();
}elseif($_FILES['putresume']['size']<=0)
{echo "Your file is empty. Please upload a proper file";
exit();
}
elseif($_FILES['putresume']['type']=="text/plain" || $_FILES['putresume']['type']=="application/pdf" || $_FILES['putresume']['type']=="application/octet-stream"){
 $filename=trim($_FILES['putresume']['name']);
$filename = str_replace(' ', '_', $filename);   
$newFilePath = "../uploads/".$id."/resume/".$filename;
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
$file_path="/uploads/".$id."/resume/".$filename;
    }
  }
else
{echo "You can upload files with .txt, .rtf, .doc, .docx and .pdf extensions only.";
exit();
}
}
//$file_path=$newFilePath;
$sql = "SELECT * FROM UserDetails WHERE user_id = ".$id;
$select = mysqli_query($conn, $sql);

if (!(mysqli_num_rows($select) > 0)) {

$sql = "INSERT INTO UserDetails (user_id,resume_path) VALUES ($id,'$file_path')";
$conn->query($sql);
}
else
{
$sql = "UPDATE UserDetails set resume_path='$file_path'  WHERE user_id=".$id;
$conn->query($sql);
}

echo "<script>window.location.href='http://www.ivystudentsprofile.com/user-profile.php?id=$id';</script>";
*/

?>
