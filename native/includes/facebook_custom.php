<?php

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
 'appId'  => '108895412556348',
  'secret' => 'df2445d45f29da6e5fdb898b3e19f1d7',
  'cookie' => true,
));

// We may or may not have this data based on a $_GET or $_COOKIE based session.
//
// If we get a session here, it means we found a correctly signed session using
// the Application Secret only Facebook and the Application know. We dont know
// if it is still valid until we make an API call using the session. A session
// can become invalid if it has already expired (should not be getting the
// session back in this case) or if the user logged out of Facebook.
$session = $facebook->getSession();
$me = null;
/*
if ($session) 
{
  try {
   $uid = $facebook->getUser();
   $me = $facebook->api('/me');
  } 
  catch (FacebookApiException $e) {
    error_log($e);
  }
}*/
if ($me) {
$logoutUrl = $facebook->getLogoutUrl();

} else {
  $loginUrl = $facebook->getLoginUrl();
}
// Session based API call.
/*if ($session) {
  try {
    $uid = $facebook->getUser();
    $me = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
  }
}
*/
// login or logout url will be needed depending on current user state.
/*if ($me) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl();
}*/

// This call will always work since we are fetching public data.




?>