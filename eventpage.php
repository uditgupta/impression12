
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="includes/javascripts/jquery-1.6.js"></script>
<title>Impression12 - Event Form</title>
</head>

<body>
<?php 
include_once('Controllers/eventclass.php');

 $event = new event();
 $event->getEventData($_GET['event_id']);
 $data = $event->event_data;

 include('Views/event.php');



?>
</body>
</html>
