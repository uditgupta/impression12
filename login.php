<script type="text/javascript">if(sessionStorage.getItem('key')){window.location.replace('index.php')}</script>
<?php 
	session_start();
	if($_SESSION['connected'] == 'user'){
		header('Location:home.php');
	}
	else if($_SESSION['connected'] == 'editor'){
		header('Location:eventform.php');
	}
	else if($_SESSION['connected'] == 'admin' || $_SESSION['connected'] == 'newuser'){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '206972639316618', // App ID
      channelUrl : '//localhost/impression12/', // Channel File
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
		window.location.replace('http://localhost/impression12/home.php');
	  } else if (response.status === 'not_authorized') {
		//window.location.replace('http://localhost/impression12/login.php');
	  } else {
		  window.location.replace('http://localhost/impression12/index.php');
		  // the user isn't even logged in to Facebook.
	  }
   });

    // Additional initialization code here
};

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
   
   
</script>



<fb:registration 
  fields="[
 {'name':'name'},
 {'name':'email'},
 {'name':'phone',      'description':'Phone Number',             'type':'text'},
 {'name':'institution','description':'Institution Name',		 'type':'text'}
]" 
  redirect-uri="http://localhost/impression12/sessional.php?ref=imu"
  width="530">
</fb:registration>

</body>
</html>
<?php
	}
?>