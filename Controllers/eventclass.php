<?php
define('__PARENT__','../');

include_once('Models/query.php');
include_once('Models/db.php');

class event{
	private $query_init;
	private $db_init;
	public $event_data;
	public $num_of_events;
	public $event_id;

	public function __construct()
	{
		$this->db_init = new db();
		$conn = $this->db_init->connect();
		$this->query_init = new query($conn);
	}

	public function postEventData($event_name,$event_details,$event_rules,$event_requirements,$event_contacts,$event_venue,$event_time,$event_category,$event_type,$event_editor_id)
	{
		$this->query_init->run_query('insert',"INSERT INTO impressions_event (event_name,event_details,event_rules,event_requirements,event_contacts,event_venue,event_time,event_category,event_type,event_editor_id) VALUES('".$event_name."','".$event_details."','".$event_rules."','".$event_requirements."','".$event_contacts."','".$event_venue."','".$event_time."','".$event_category."','".$event_type."',".$event_editor_id.")");
		$this->event_data = $this->query_init->result[0];
		$this->num_of_events = $this->query_init->result_count;
		
	}	

	public function checkUserNumberOfEvents($uid)
	{
		$this->query_init->run_query('select',"SELECT event_id FROM impressions_event WHERE event_editor_id=".$uid);

		$this->num_of_events = $this->query_init->result_count;

	}
	
	public function getEventsByCategory($category)
	{
		$this->query_init->run_query('select',"SELECT * FROM impressions_event WHERE event_category = '".$category."'");
		$this->event_data = array("events"=>$this->query_init->result);
		$this->num_of_events = $this->query_init->result_count;
	}
}
?>
