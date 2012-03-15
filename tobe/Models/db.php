<?php
/**	
*	\class db
*	\brief Defines the database connectivity to MySQL. It also has a log function for creating logs. db error logs are stored in db_error.log.
*/

class db{
	/**	\private Name of the database. */
	private $db;
	/**	\private Name of the host. */	
	private $host;
	/**	\private Name of the user. */
	private $user;
	/**	\private Password. */
	private $pass;
	/** \private Connection variable.*/
	private $conn;
	/**
	*	\fn __construct()
	*	\brief Constructor for db class.
	*	\return Nothing
	*/
	public function __construct(){
		$this->db = 'impression12';
		$this->host = 'localhost';
		$this->user = 'root';
		$this->pass = 'shonen';
	}
	/**
	*	\fn connect()
	*	\brief Connects to database, specified in class db.
	*	\return Returns connection variable on success else false.
	*/	
	public function connect(){
		$this->conn = mysql_connect($this->host,$this->user,$this->pass);
		if(!$this->conn){
			$this->errlog('db_error.log', "Error: Failed to connect to database 	".mysql_errno()." ".date('d-M-Y H:i:s',time()+19800)."\n\n");
			echo '<b>Error: </b>Failed to connect to database	'.mysql_errno()." ".date('d-M-Y H:i:s',time()+19800)."\n";
			return false;
		}
		else{
			$selected = mysql_select_db($this->db,$this->conn);
			if(!$selected){
				$this->errlog('db_error.log', "Error: Failed to select database 	".$this->db." ".mysql_errno()." ".date('d-M-Y H:i:s',time()+19800)."\n\n");
				echo "<b>Error: </b>Failed to select database 	".$this->db."	".date('d-M-Y H:i:s',time()+19800)."\n";
				return false;
			}
			return $this->conn;
		}
	}
	/**
	*	\fn close()
	*	\brief Closes and logs the connection error. Showing error is not important here.
	*	\return Returns Nothing.
	*/
	public function close(){
		$closed = mysql_close($this->conn);
		if(!$closed){
			$this->errlog('db_error.log', "db connection closing error 	".mysql_errno()."		".date('d-M-Y H:i:s',time()+19800)."\n\n");
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
	*/
	private function errlog($filename, $log){
		$fi = fopen($filename,'a+');
		fwrite($fi,$log);
		fclose($fi);
	}

}

$d = new db();
$d->connect();
?>
