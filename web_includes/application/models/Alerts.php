<?php

class Application_Model_Alerts extends Zend_Db_Table_Abstract{

	
	protected $_name = 'alerts';	
 
	public function getAll()
	{
		$rows = $this->fetchAll(
				$this->select()
		);
		return $rows;
	}
	
	
	public function create()
	{
		$arr = array(
				'time'	=> time()
		);
		return $this->insert($arr);
	}
	
// 	/**
// 	 * get the user's data row
// 	 * @param string $user
// 	 */
// 	public function getUser($email){
// 		$row = $this->fetchRow(
// 				$this->select()
// 				->where('email = ?', strtolower($email))
// 		);
// 		return $row;
// 	}
	
}