<?php

class Application_Model_Users extends Zend_Db_Table_Abstract{

	
	protected $_name = 'users';	
 
	/**
	*
	* @param string $username
	* @return bool
	*/
	public function exists($user){
		$row = $this->fetchRow(
		$this->select()
			->where('email = ?', strtolower(trim($user)))
		);
		if($row !== null){
			return true;
		}
		return false;
	}
	
	
	/**
	 * get the user's data row
	 * @param string $user
	 */
	public function getUser($email){
		$row = $this->fetchRow(
				$this->select()
				->where('email = ?', strtolower($email))
		);
		return $row;
	}
	
}