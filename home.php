<?php session_start(); echo $_SESSION['connected'] ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="impression12"/>
    <meta property="og:type" content="university"/>
    <meta property="og:url" content="http://localhost/impresssion12/home.php"/>
    <meta property="og:image" content="http://localhost/imagefiles/adobe.jpg"/>
    <meta property="og:site_name" content="impression12"/>
    <meta property="og:description" content="Testing FB api."/>
<title>Untitled Document</title>
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=206972639316618";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<fb:send href="http://localhost/impression12/home.php" font="lucida grande"></fb:send>

<?php
define('FACEBOOK_APP_ID', '206972639316618');
define('FACEBOOK_SECRET', '775549428b43c88e12663b513cd89293');

function parse_signed_request($signed_request, $secret) {
  list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

  // decode the data
  $sig = base64_url_decode($encoded_sig);
  $data = json_decode(base64_url_decode($payload), true);

  if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
    error_log('Unknown algorithm. Expected HMAC-SHA256');
    return null;
  }

  // check sig
  $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
  if ($sig !== $expected_sig) {
    error_log('Bad Signed JSON signature!');
    return null;
  }

  return $data;
}

function base64_url_decode($input) {
    return base64_decode(strtr($input, '-_', '+/'));
}

if ($_REQUEST) {
  echo '<p>signed_request contents:</p>';
  $response = parse_signed_request($_REQUEST['signed_request'], FACEBOOK_SECRET);
  echo '<pre>';
  print_r($response);
  echo '</pre>';
} else {
  echo '$_REQUEST is empty';
}

$auth = $response['oauth_token'];
$uid = $response['user_id'];
echo $auth.'           '.$uid;
$con = mysql_connect('localhost','root','');
mysql_select_db('impression12',$con);
$response = $response['registration'];

$query = "INSERT INTO impressions_personal_detail(impressions_id, email_id, full_name, contact_number, institution_name) VALUES(".$uid.",'".$response['email']."','".$response['name']."','".$response['phone']."','".$response['institution']."')";
echo $query;
mysql_query($query,$con);
?>
</body>
</html>