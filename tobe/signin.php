<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="includes/javascripts/jquery-1.6.js"></script>
<title>Impression12 - Event Form</title>
</head>
<body>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '206972639316618', // App ID
      channelUrl : 'http://impressions12.com/', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });
	 FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
    // the user is logged in and connected to your
    // app, and response.authResponse supplies
    // the user's ID, a valid access token, a signed
    // request, and the time the access token 
    // and signed request each expire
    var uid = response.authResponse.userID;
    var accessToken = response.authResponse.accessToken;
	$.post('userstatus.php',{"uid" : uid}, function(response){
			if(response['response'] != 'undefined'){
				window.location.replace('eventform.php');
			}
		},"json");
  } else if (response.status === 'not_authorized') {
    	if(sessionStorage.length == 1){sessionStorage.removeItem('key')}
  } else {
	  sessionStorage.setItem('key','value');
	  // the user isn't even logged in to Facebook.
  }
 });

    // Additional initialization code here
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[1];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
   
</script>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=206972639316618";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--div id="status"></div>
<div style="width:auto; float:left"><fb:like href="http://localhost/impression12/" send="false" layout="button_count" width="150" show_faces="false" font="lucida grande"></fb:like></div>
<div id="facebook_button" style="width:auto; float:left"><fb:login-button registration-url="http://localhost/impression12/index.php" /></div -->
<?php 
include_once('./Views/register.php');
?>

</body>
