<?php
session_start();
// remove all session variables
session_unset(); 

// destroy the session 
if(session_destroy()) 
header ("Location:http://www.ivystudentsprofile.com");
?>

