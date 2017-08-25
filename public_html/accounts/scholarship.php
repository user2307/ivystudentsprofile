<?php
$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);

$id=$_SESSION['id'];

include "../database.php";
//$scholarship_received="NULL";
$sql = "SELECT scholarship_path FROM UserDetails WHERE user_id =".$id;
$query = mysqli_query($conn, $sql);
while($row1 = mysqli_fetch_assoc($query)){
$essay= $row1['scholarship_path'];
}
$arr=explode("@@#",$essay);

$path=[];
 if (isset($_POST['optradio2'])){  
        $scholarship_received = $_POST['optradio2'];
}
if ($scholarship_received=="1")// if yes,
{
if ($_POST['scholarshipname']) {
    $scholarshipname = implode("@@#", $_POST['scholarshipname']);
}
if ($_POST['scholarshipamt']) {
    $scholarshipamt = implode("@@#", $_POST['scholarshipamt']);
}
/*if (!file_exists('../uploads/'.$id.'/scholarship')) {
mkdir("../uploads/".$id."/scholarship",0777,true);
}*/
//Loop through each file
for($i=0; $i<count($_FILES['scholarshipessay']['name']); $i++) {
  //Get the temp file path
  $tmpFilePath = $_FILES['scholarshipessay']['tmp_name'][$i];
  //Make sure we have a filepath
  if ($tmpFilePath != ""){
if($_FILES['scholarshipessay']['size'][$i]>=512000){
echo "File size must be less than 500 KB";
exit();
}
elseif($_FILES['scholarshipessay']['size'][$i]<=0)
{echo "Your file is empty. Please upload a proper file";
 exit();
}   //Setup our new file path
elseif($_FILES['scholarshipessay']['type'][$i]!="text/plain"){

echo "You can upload files with .txt extension only.";
exit();

}

}
}




for($i=0; $i<count($_FILES['scholarshipessay']['name']); $i++) {
$tmpFilePath = $_FILES['scholarshipessay']['tmp_name'][$i];
  if ($arr[$i]=="" && $tmpFilePath != ""){

$dirname = uniqid();
if (!file_exists('../uploads/'.$id.'/scholarship/'.$dirname)) {
mkdir("../uploads/".$id."/scholarship/".$dirname,0777,true);
}
$filename=trim($_FILES['scholarshipessay']['name'][$i]);
$filename = str_replace(' ', '_', $filename);    
$newFilePath = "../uploads/".$id."/scholarship/".$dirname."/" . $filename;

    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
$storepath="/uploads/".$id."/scholarship/".$dirname."/" . $filename;
$path[$i]= $storepath;
      //Handle other code here
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
}
elseif($scholarship_received=="2"){
if (file_exists('../uploads/'.$id.'/scholarship/'))
system("rm -r ../uploads/".$id."/scholarship/");


}
$file_path=implode("@@#",$path);
$sql = "SELECT * FROM UserDetails WHERE user_id = ".$id;
$select = mysqli_query($conn, $sql);

if (!(mysqli_num_rows($select) > 0)) {

$sql = "INSERT INTO UserDetails (user_id,scholarship_received,scholarship_name,scholarship_amount,scholarship_path) VALUES ($id,'$scholarship_received','$scholarshipname','$scholarshipamt','$file_path'  )";
$conn->query($sql);
}
else
{
$sql = "UPDATE UserDetails set scholarship_received='$scholarship_received', scholarship_name='$scholarshipname', scholarship_amount='$scholarshipamt', scholarship_path='$file_path'  WHERE user_id=".$id;
$conn->query($sql);
}
echo "<script>window.location.href='http://www.ivystudentsprofile.com/user-profile.php?id=$id';</script>";
?>
