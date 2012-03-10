<?php
/**
*	\class query
*	\brief Defines the query to be run on MySQL. Error logs are stored in query_error.log.
*/
class query{
	/**
	*	\private Connection variable from database.
	*/
	private $conn;
	/**
	*	\private Type of query <insert, delete, update, select>.
	*/
	private $query_type;
	/**
	*	\public Result \b array for the SELECT query.
	*/
	public $result;
	/**
	*	\public Resultant \b id of the last performed INSERT query.
	*/
	public $last_id;
	/**
	*	\public Number of rows returned or affected based on INSERT, UPDATE, DELETE.
	*/
	public $result_count;
	/**
	*	\fn __construct()
	*	\brief Constructor for the query class and run query.
	*	\param $query_type Type of query <'select', 'insert', 'delete', 'update'>.
	*	\param	$query Query to be run.
	*	\return Nothing.
	*/
	public function __construct($conn){
		$this->conn = $conn;
	}
	/**
	*	\fn run_query()
	*	\brief Runs query and assign value to member variables.
	*	\param $query Query to be run, passed in constructor.
	*	\return Nothing
	*/
	public function run_query($query_type, $query){
		if(strtolower($query_type) == 'select'){
			$this->query_type = strtolower($query_type);
			$rows = mysql_query($query);
			if(!$rows){
				$this->errlog('query_error.log', "Error: Query type: ".$this->query_type."	".mysql_errno()." ".mysql_error()."		".date('d-M-Y H:i:s',time()+19800)."\n\n");
				echo '<b>Error: </b>Query type: '.$this->query_type.'	'.mysql_errno().' '.mysql_error().'		'.date('d-M-Y H:i:s',time()+19800)."\n";
			}
			else{
				$this->result_count = mysql_num_rows($rows);
				$arr = array();
				while($row = mysql_fetch_array($rows)){
					array_push($arr,$row);
				}
				$this->result = $arr;
				$this->last_id = NULL;
			}
		}
		
		elseif(strtolower($query_type) == 'insert' || strtolower($query_type) == 'update' || strtolower($query_type) == 'delete'){
			$this->query_type = strtolower($query_type);
			$rows = mysql_query($query,$this->conn);
			if(!$rows){
				$this->errlog('query_error.log', "Error: Query type: ".$this->query_type."	".mysql_errno()." ".mysql_error()."		".date('d-M-Y H:i:s',time()+19800)."\n\n");
				echo '<b>Error: </b>Query type: '.$this->query_type.'	'.mysql_errno().' '.mysql_error().'		'.date('d-M-Y H:i:s',time()+19800)."\n";
			}
			else{
				if($this->query_type == 'insert')
					$this->last_id = mysql_insert_id();
				else
					$this->last_id = NULL;
				$this->result = NULL;
				$this->result_count = mysql_affected_rows();
			}
		}
	}
	/**
	*	\fn __destruct()
	*	\brief Destructs the object of the class when no longer in use.
	*	\returns Nothing
	*/
	public function __destruct(){
	}
	/**
	*	\fn errlog($filename, $log)
	*	\brief Writes logs to the file specified in $filename.
	*	\param $filename File to which log is to be written.
	*	\param $log Log which is to be written in file.
	*	\returns Nothing
	*/
	private function errlog($filename, $log){
		$fi = fopen($filename,'a+');
		fwrite($fi,$log);
		fclose($fi);
	}
}


?>