<?php

$lifetime=1 * 365 * 24 * 60 * 60;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
$id=$_SESSION['id'];
include "../database.php";
$string=$_POST['string'];
$data=preg_replace('#^data:image/[^;]+;base64,#', '', $string);
$data = str_replace(' ', '+', $data);
$imgdata = base64_decode($data);
$f = finfo_open();

$mime_type = finfo_buffer($f, $imgdata, FILEINFO_MIME_TYPE);
$temp=0;
$size=strlen($imgdata);
$size=$size/(1024*1024);
if($mime_type!="image/png" && $mime_type!="image/jpeg" &&  $mime_type!="image/gif" && $mime_type!="image/bmp" && $mime_type!="image/tiff" )
$temp=1;

elseif($size>2)
$temp=2;
if($temp==0){
if (!file_exists('../images/userpics/'.$id)) {
mkdir("../images/userpics/".$id,0777,true);
}
file_put_contents('../images/userpics/'.$id.'/img.png',$imgdata);
$val='/images/userpics/'.$id.'/img.png';
$sql = "UPDATE LoginDetails set user_pic='$val' WHERE user_id=".$id;
$conn->query($sql);

}
echo $temp;
?>
