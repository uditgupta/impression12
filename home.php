<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="includes/javascripts/jquery-1.6.js"></script>
<title>Impression12 - I'm Shuffling</title>
</head>

<body>

<script type="text/javascript">
function changesrc(val){
	var src = document.getElementById('iframe').src;
	document.getElementById('iframe').src = src+val;
}
</script>

<div><input type="button" onclick="changesrc('1')" /></div>
<div><iframe id="iframe" src="eventpage.php?event_id=" height="300px;" frameborder=0></div>

<div align="right"><p><a href="index.php">VISIT SITE</a></p></div>
</body>
javascript:window.location.replace('home.php')
</html>
 
