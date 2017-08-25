<?php
/* Start session and load library. */
  session_start();

require_once('../src/TwitterOAuth.php');
require_once('config.php');
/* Build TwitterOAuth object with client credentials. */
$connection = new TwitterOAuth(CBxNBcQyqlkekKe0uDAYeFxYQ, YrVu9TfSI9q5zyRTjoP9wCy9lCyILK7FnL2Yd5hnUQlCJU6mgQ);
 
/* Get temporary credentials. */
$request_token = $connection->oauth('oauth/request_token', array("oauth_callback" =>OAUTH_CALLBACK));
/* Save temporary credentials to session. */
$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
/* If last connection failed don't display authorization link. */


$url = $connection->url("oauth/authenticate", array("oauth_token" => $request_token['oauth_token']));


/*switch ($connection->http_code) {
  case 200:

    /* Build authorize URL and redirect user to Twitter. */
  //  $url = $connection->getAuthorizeURL($token);
    header('Location: ' . $url); 
   // break;
//  default:
    /* Show notification if something went wrong. */
  // echo 'Could not connect to Twitter. Refresh the page or try again later.'.$connection->http_code."is";
//}
?>
