<?php
include "../database.php";
function generateHash($password) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        return crypt($password, $salt);
    }
}

$password=$_POST['password'];
$password1=$_POST['password1'];
$key=$_POST['key'];
if($password=='')
echo "Please enter your password (at least 6 characters long)";
elseif(strlen($password)<6)
echo "Password must contain at least 6 characters";
elseif($password!=$password1)
echo "The passwords do not match.";
else
{
$password=generateHash($password);
$sql = "UPDATE LoginDetails SET password='$password' WHERE  password_reset_key='$key'";
if ($conn->query($sql) === TRUE)
{
$query="UPDATE LoginDetails SET password_reset_key=NULL WHERE  password_reset_key='$key'";
$conn->query($query);

}
}
?>
