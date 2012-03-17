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
function login(){
	$(document).ready(function(){
	}); 
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '206972639316618', // App ID
	      channelUrl : 'http://localhost/impression12/', // Channel File
	      status     : true, // check login status
	      cookie     : true, // enable cookies to allow the server to access the session
	      xfbml      : true  // parse XFBML
	    });
	    FB.getLoginStatus(function(response) {
		if (response.status === 'connected') {
			$("#myform").fadeIn("fast");
		    // the user is logged in and connected to your
		    // app, and response.authResponse supplies
		    // the user's ID, a valid access token, a signed
		    // request, and the time the access token 
		    // and signed request each expire
		    var uid = response.authResponse.userID;
		    var accessToken = response.authResponse.accessToken;
		    $.post('userstatus.php',{"uid" : uid}, function(response){
				if(response['response'] != 'undefined'){
					document.getElementById("test").value = response['user_id'];
					hidediv();
					//window.location.replace('sessional.php?ref='+response['response']);
				}
				
			},"json");
		  } else if (response.status === 'not_authorized') {

			window.location.replace('login.php');
		  } else {
		
			//window.location.replace('signin.php');
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
	 
	  (function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[1];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=206972639316618";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
}

function creatediv(){
	document.getElementById('fbdiv').style.display = 'block';
}
function hidediv(){
	document.getElementById('fbdiv').style.display = 'none';
	login();
}
</script>
<input type="button" onclick="creatediv();login();" />

<div id="fbdiv" style="width:300px; height:300px; margin-left:auto; margin-right:auto; background-color:red; display:none; z-index:100"><fb:login-button registration-url="http://impressions12.com/login.php" on-login="hidediv()">Log In to Register</fb:login-button></div>
<input type="text" id="test" />
<?php
 include_once('Controllers/eventclass.php');

 $event = new event();
 $event->getEventData($_GET['event_id']);
 $data = $event->event_data;

 include('Views/event.php');



?>
</body>
</html>
