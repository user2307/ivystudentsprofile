<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);


include "../database.php";
$id=$_SESSION['id'];
if (!file_exists('../uploads/'.$id.'/lor')) {
mkdir("../uploads/".$id."/lor",0777,true);
}
$path=[];
$sql = "SELECT lor_path FROM UserDetails WHERE user_id =".$id;
$query = mysqli_query($conn, $sql);
while($row1 = mysqli_fetch_assoc($query)){
$lor= $row1['lor_path'];
}
//$arr=explode("@@#", $lor);

//Loop through each file
for($i=0; $i<count($_FILES['insres']['name']); $i++) {
  //Get the temp file path
  $tmpFilePath = $_FILES['insres']['tmp_name'][$i];
  //Make sure we have a filepath
if ($tmpFilePath != ""){
if($_FILES['insres']['size'][$i]>=512000)
{
echo "File size must be less than 500 KB";
exit();
}elseif($_FILES['insres']['size'][$i]<=0)
{echo "Your file is empty. Please upload a proper file";
 exit();
}   //Setup our new file path
elseif($_FILES['insres']['type'][$i]!="text/plain" && $_FILES['insres']['type'][$i]!="application/pdf" && $_FILES['insres']['type'][$i]!="application/octet-stream"){

echo "You can upload files with .txt, .rtf, .doc, .docx and .pdf extensions only.";
//echo "<script>window.location.href='http://www.ivystudentsprofile.com/user-profile.php?id=".$id."&err=3&file=".$i."';</script>";
exit();
}


/*$dirname = uniqid();
if (!file_exists('../uploads/'.$id.'/'.$dirname)) {
mkdir("../uploads/".$id."/lor/".$dirname,0777,true);
}
    
$newFilePath = "../uploads/".$id."/lor/".$dirname."/" . $_FILES['insres']['name'][$i];

    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
$path[$i]=$newFilePath;
      //Handle other code here
}
else
{$newFilePath="";
$path[$i]=$newFilePath;
}

    }*/
  }
}
for($i=0; $i<count($_FILES['insres']['name']); $i++) {
  //Get the temp file path
  $tmpFilePath = $_FILES['insres']['tmp_name'][$i];

if($tmpFilePath != ""){
$dirname = uniqid();
if (!file_exists('../uploads/'.$id.'/'.$dirname)) {
mkdir("../uploads/".$id."/lor/".$dirname,0777,true);
}
$filename=trim($_FILES['insres']['name'][$i]);
$filename = str_replace(' ', '_', $filename);

$newFilePath = "../uploads/".$id."/lor/".$dirname."/" . $filename;

    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
$path[$i]="/uploads/".$id."/lor/".$dirname."/" . $filename;//$newFilePath;
}
}



}
$file_path=implode("@@# ",$path);
if($lor && $file_path)
$file_path=$lor."@@#".$file_path;
elseif($lor && !$file_path)
$file_path=$lor;

$sql = "SELECT * FROM UserDetails WHERE user_id = ".$id;
$select = mysqli_query($conn, $sql);

if (!(mysqli_num_rows($select) > 0)) {

$sql = "INSERT INTO UserDetails (user_id,lor_path) VALUES ($id,'$file_path')";
$conn->query($sql);
}
else
{
$sql = "UPDATE UserDetails set lor_path='$file_path'  WHERE user_id=".$id;
$conn->query($sql);
}
echo "<script>window.location.href='http://www.ivystudentsprofile.com/user-profile.php?id=$id';</script>";
?>
