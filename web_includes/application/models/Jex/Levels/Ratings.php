<?php

class Application_Model_Jex_Levels_Ratings extends Zend_Db_Table_Abstract{

	
	protected $_name = 'jex_levels_ratings';	

    
	public function publish($rating, $user, $level)
	{
		$arr = array(
			    'rating'      	=> $rating,
				'user'      	=> strtolower(trim($user)),
				'level_id'  	=> $level,
				'time_created'	=> time()
		);
		return $this->insert($arr);
	}
		
	/**
	 *
	 * @param string $username
	 * @return bool
	 */
	public function exists($user, $levelId){
		$row = $this->fetchRow(
				$this->select()
				->where('user = ?', strtolower(trim($user)))
				->where('level_id = ?', $levelId)
		);
		if($row !== null){
			return true;
		}
		return false;
	}
	
}