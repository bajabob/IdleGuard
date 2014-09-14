<?php

class Application_Model_Actionables extends Zend_Db_Table_Abstract{

	
	protected $_name = 'actionables';	
 
	/**
	*
	* @param string $username
	* @return bool
	*/
	public function getActionable(){
		$row = $this->fetchRow(
		$this->select()
			->where('is_read = ?', "0")
		);
		
		if($row != null)
		{
			$where = $this->getAdapter()->quoteInto('id = ?', $row->id);
			$this->update(array('is_read' => 1), $where);
			return $row;
		}
		return null;
	}
	
	
	public function create($json)
	{
		$arr = array(
				'name'  => $json
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