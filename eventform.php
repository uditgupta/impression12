
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="includes/javascripts/jquery-1.6.js"></script>
<title>Impression12 - Event Form</title>
</head>

<body>

<form action="postedEventForm.php" id="myform" style="display:none" method="post" >
<table>
	 <tr>
		<td><label>Event-name</label></td><td><input name="name" type="text" maxlength="40" placeholder="eg. JRodies"/></td>
     </tr>
     <tr>
	    <td><label>Event-details</label></td><td><textarea name="details" placeholder="eg. You dare to prove there is something in you. Show here.." style="width:300px; height:70px; resize:none" wrap="soft" maxlength="1500"></textarea></td>
     </tr>
     <tr>
	    <td><label>Event-rules</label></td><td><textarea name="rules" placeholder="eg. 1. Only 2 players are allowed." style="width:300px; height:70px; resize:none" wrap="soft" maxlength="1500"></textarea></td>
     </tr>
     <tr>
	    <td><label>Event-venue</label></td><td><input name="venue" type="text" placeholder="eg. CL-2" maxlength="4"/></td>
     </tr>
     <tr>
    	<td><label>Event-time</label></td><td><input name="time" type="text" maxlength="19" placeholder="eg. 11:00 AM - 01:00 PM"/></td>
     </tr>
     <tr>
    	<td><label>Event-category</label></td><td><select name="category"><option>Technical</option><option>Cultural</option><option>Literary</option><option>Creative</option><option>Management</option></select></td>
     </tr>
     <tr>
	    <td><label>Event-type</label></td><td><select name="type"><option>Single</option><option>Group</option></select></td>
     </tr>
	<tr>
		<input type = "hidden" id="hidid" name = "uid" value=""/>
	</tr>	
     <tr>
	    <td><input type="submit" value="submit"/></td>
    </tr>
</table>
</form>

<div id="fb-root"></div>
<script>
$(document).ready(function(){
 document.getElementById("facebook-footer").style.display = "none";
}); 
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '206972639316618', // App ID
      channelUrl : 'http://www.impressions12.com/', // Channel File
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
			if(response['response'] == 'ime'){
				document.getElementById("hidid").value = response['user_id'];
                      	 	document.getElementById("facebook-footer").style.display = "none";
				//window.location.replace('sessional.php?ref='+response['response']);
			}
			else{
				document.write('You are not authorized to view this page.');
			}
		},"json");
	  } else if (response.status === 'not_authorized') {

	    	window.location.replace('login.php');
	  } else {
	
		//window.location.replace('signin.php');
                document.getElementById("facebook-footer").style.display = "block";
		$("#myform").remove();
	
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
  var js, fjs = d.getElementsByTagName(s)[1];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=206972639316618";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div align="right"><p><a href="home.php">VISIT SITE</a></p></div>
<?php include_once('./Views/register.php'); ?>
</body>
<script>
</script>

</html>
 
