<?php session_start(); if($_SESSION['connected'] == 'editor' || $_SESSION['connected'] == 'admin'){ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Impression12 - Event Form</title>
</head>

<body>

<form action="" method="post">
<table>
	 <tr>
		<td><label>Event-name</label></td><td><input type="text" maxlength="40" placeholder="eg. JRodies"/></td>
     </tr>
     <tr>
	    <td><label>Event-details</label></td><td><textarea placeholder="eg. You dare to prove there is something in you. Show here.." style="width:300px; height:70px; resize:none" wrap="soft" maxlength="10"></textarea></td>
     </tr>
     <tr>
	    <td><label>Event-venue</label></td><td><input type="text" placeholder="eg. CL-2" maxlength="4"/></td>
     </tr>
     <tr>
    	<td><label>Event-time</label></td><td><input type="text" maxlength="19" placeholder="eg. 11:00 AM - 01:00 PM"/></td>
     </tr>
     <tr>
    	<td><label>Event-category</label></td><td><select><option>Technical</option><option>Cultural</option><option>Literary</option><option>Creative</option><option>Management</option></select></td>
     </tr>
     <tr>
	    <td><label>Event-type</label></td><td><select><option>Single</option><option>Group</option></select></td>
     </tr>
     <tr>
	    <td><label>Event-editor-id</label></td><td><input type="text" value="1000001" readonly="readonly"/></td><?php //event editor id id readable only. or name ?>
    </tr>
</table>
</form>
<div align="right"><p><a href="home.php">VISIT SITE</a></p></div>

</body>
</html>
<?php }
else if(isset($_SESSION)){
	header('Location:home.php');
}
else{
	header('Location:index.php');
}
 ?>