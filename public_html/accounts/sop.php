<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);


include "../database.php";
if ($_POST['unv']) {
    $values = implode("@@#", $_POST['unv']);
}
$t=0;
if ($_POST['ctype']) {
    $values1 = implode("@@#", $_POST['ctype']);
}
if ($_POST['term']) {
    $values2 = implode("@@#", $_POST['term']);
}
$id=$_SESSION['id'];
if (!file_exists('../uploads/'.$id.'/sop')) {
mkdir("../uploads/".$id."/sop",0777,true);
}
$path=[];


$sql = "SELECT sop_essay FROM UserDetails WHERE user_id =".$id;
$query = mysqli_query($conn, $sql);
while($row1 = mysqli_fetch_assoc($query)){
$essay= $row1['sop_essay'];
}
$arr=explode("@@#", $essay);

//Loop through each file
for($i=0; $i<count($_FILES['sopessays']['name']); $i++) {
  //Get the temp file path
  $tmpFilePath = $_FILES['sopessays']['tmp_name'][$i];
  //Make sure we have a filepath
  if ($tmpFilePath != ""){
if($_FILES['sopessays']['size'][$i]>512000)
{
echo "File size must be less than 500 KB";
exit();
}elseif($_FILES['sopessays']['size'][$i]<=0)
{
echo "Your file is empty. Please upload a proper file";
 exit();
}   //Setup our new file path
elseif($_FILES['sopessays']['type'][$i]!="text/plain" && $_FILES['sopessays']['type'][$i]!="application/pdf" && $_FILES['sopessays']['type'][$i]!="application/octet-stream"){
echo "You can upload files with .txt, .rtf, .doc, .docx and .pdf extensions only.";
//echo "<script>window.location.href='http://www.ivystudentsprofile.com/user-profile.php?id=".$id."&err=3&file=".$i."';</script>";
exit();
}
/*else{
$dirname = uniqid();
if (!file_exists('../uploads/'.$id.'/sop/'.$dirname)) {
mkdir("../uploads/".$id."/sop/".$dirname,0777,true);
}
$filename=trim($_FILES['sopessays']['name'][$i]);    
$filename = str_replace(' ', '_', $filename);
$newFilePath = "../uploads/".$id."/sop/".$dirname."/" . $filename;//$_FILES['sopessays']['name'][$i];

    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
$storepath="/uploads/".$id."/sop/".$dirname."/" . $filename;//$_FILES['sopessays']['name'][$i];
$path[$i]=$storepath;//newFilePath;
      //Handle other code here
}
    }*/
//else
//echo "You can upload files with .txt, .rtf, .doc, .docx and .pdf extensions only.";
  }
}
for($i=0; $i<count($_FILES['sopessays']['name']); $i++) {

$tmpFilePath = $_FILES['sopessays']['tmp_name'][$i];
  //Make sure we have a filepath
  //if ($tmpFilePath != ""){

if($arr[$i]=="" && $tmpFilePath != ""){
$dirname = uniqid();
if (!file_exists('../uploads/'.$id.'/sop/'.$dirname)) {
mkdir("../uploads/".$id."/sop/".$dirname,0777,true);
}
$filename=trim($_FILES['sopessays']['name'][$i]);
$filename = str_replace(' ', '_', $filename);
$newFilePath = "../uploads/".$id."/sop/".$dirname."/" . $filename;//$_FILES['sopessays']['name'][$i];

    //Upload the file into the temp dir
if(move_uploaded_file($tmpFilePath, $newFilePath)) {
$storepath="/uploads/".$id."/sop/".$dirname."/" . $filename;//$_FILES['sopessays']['name'][$i];
$path[$i]=$storepath;

}

else
{$storepath="";
$path[$i]=$storepath;
}

}
else
{

$path[$i]=$arr[$i];
}
}
/*
if(!$path)
{
$path=$arr;
}*/
$file_path=implode("@@#",$path);

$sql = "SELECT * FROM UserDetails WHERE user_id = ".$id;
$select = mysqli_query($conn, $sql);

if (!(mysqli_num_rows($select) > 0)) {

$sql = "INSERT INTO UserDetails (user_id,admit_univ, course_type, term,sop_essay) VALUES ($id,'$values','$values1','$values2','$file_path'  )";
$conn->query($sql);
}
else
{
$sql = "UPDATE UserDetails set admit_univ='$values', course_type='$values1', term='$values2', sop_essay='$file_path'  WHERE user_id=".$id;
$conn->query($sql);
}
echo "<script>window.location.href='http://www.ivystudentsprofile.com/user-profile.php?id=$id';</script>";
?>
