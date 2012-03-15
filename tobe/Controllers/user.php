<?php

define('__PARENT__','../');

require_once('Models/query.php');
require_once('Models/db.php');

//include 'Models/query.php';
//include 'Controllers/db.php';

class user{
	public $query_init;
	public $db_init;
	public $user_data;
	public $no_of_users;
	public $user_id;	//to be used when user details needed to be entered.

	public function __construct(){ 
		$this->db_init = new db();
		$conn = $this->db_init->connect();
		$this->query_init = new query($conn);
	}
	
	public function getUserdetails($uid){
		$this->query_init->run_query('select', "SELECT * FROM impressions_personal_detail WHERE impressions_id = ".$uid);
		$this->user_data = $this->query_init->result[0];
		$this->no_of_users = $this->query_init->result_count;
		$this->db_init->close();
	}
	
	public function getAlluserdetails(){
		$this->query_init->run_query('select', 'SELECT * FROM impressions_personal_detail');
		$this->user_data = $this->query_init->result;
		$this->no_of_users = $this->query_init->result_count;
		$this->db_init->close();
	}
	
	public function __destruct(){
	}
	
}
?>
