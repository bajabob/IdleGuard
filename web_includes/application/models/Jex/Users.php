<?php

class Application_Model_Jex_Users extends Zend_Db_Table_Abstract{

	
	protected $_name = 'jex_users';	
 
	/**
	*
	* @param string $username
	* @return bool
	*/
	public function exists($user){
		$row = $this->fetchRow(
		$this->select()
			->where('user = ?', strtolower(trim($user)))
		);
		if($row !== null){
			return true;
		}
		return false;
	}
	
}