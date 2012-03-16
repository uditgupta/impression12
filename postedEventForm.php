<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="includes/javascripts/jquery-1.6.js"></script>
<title>Impression12 - Event Form</title>
</head>

<body>
 
	
</body>
<?php
	include_once('Controllers/eventclass.php');
	
	$event=new event();
	
	$event->checkUserNumberOfEvents($_POST['uid']);
	if($event->num_of_events < 2)
	{	
		$event->postEventData(addslashes($_POST['name']),addslashes($_POST['details']),addslashes($_POST['rules']),addslashes($_POST['requirements']),addslashes($_POST['contacts']),addslashes($_POST['venue']),addslashes($_POST['time']),addslashes($_POST['category']),addslashes($_POST['type']),$_POST['uid']);
		echo "<p>Your event has been registered. You can edit it on the website directly</p><a href=\"eventform.php\">Click here to register another event</a>";
	}
	else
	{
		echo "You are not allowed to register more than two events";
	}

?>
