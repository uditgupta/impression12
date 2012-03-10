<?php

require_once('loader.php');

$load = new loader();
$db = new db();
$conn = $db->connect();
$query = new query($conn);
$query->run_query('select', 'SELECT * FROM impressions_personal_detail WHERE id = 1');
print_r($query->result[0]['email_id']);
$db->close();

?>