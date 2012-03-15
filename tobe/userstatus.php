<?php
if($_REQUEST){
	include_once('Controllers/user.php');
	
	$user = new user();
	$user->getUserdetails($_REQUEST['uid']);
        $privilege = $user->user_data['privilege'];
	$user_id = $user->user_data['id'];
	if($privilege == '1'){
		echo json_encode(array('response'=>'imu'));
	}	
	else if( $privilege == '2'){
		echo json_encode(array('response'=>'ime','user_id'=>$user_id));	
	}
	else if($privilege == '3'){
		echo json_encode(array('response'=>'ima'));
	}
}
?>
