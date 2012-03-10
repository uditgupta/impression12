<?php
/**
*	\class loader
*	\brief Includes the class files upon instantiating the class.
*/
class loader{
	/**
	*	\fn __construct()
	*	\brief Constructor for the Loader class. Runs loadme member function to include the class files. Error logs are stored in autoload_error.log.
	*	\return Nothing
	*/
	public function __construct(){
		$autoload = spl_autoload_register(array($this , 'loadme'));
		if(!$autoload){
			$fi = fopen('autoload_error.log','a+');
			fwrite($fi,'Unable to load classes		'.date('d-m-Y H:i:s',time()+19800));
			fclose($fi);
			echo 'Unable to load classes		'.date('d-m-Y H:i:s',time()+19800);
		}
	}
	/**
	*	\fn loadme()
	*	\brief	Includes the class file.
	*	\return Nothing
	*/
	public function loadme($className){
		require_once($className.'.php');
	}
}

?>