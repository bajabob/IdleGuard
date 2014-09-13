<?php

class Application_Model_Jex_Levels_Incoming extends Zend_Db_Table_Abstract{

	
	protected $_name = 'jex_levels_incoming';	

    
	/**
	* start the register process for a new user account
	* 
	* @param $user string - username
	* @param $email string - email address
	* @param $startupCost - the startup cost
	* @param $monthlyFee - clients monthly fee
	*/
	public function publish($data, $user)
	{
	
		$arr = array(
			    'data'      	=> $data,
				'user'      	=> strtolower(trim($user)),
				'time_created'  => time()
		);
	
		return $this->insert($arr);
	}
	

	/**
	 * Get Random Level Un-Rated By User
	 * Get a random level not created by the user, and not already rated by the user
	 * @param String $user
	 * @return row
	 */	
	public function getRandomLevelUR($user)
	{
		return $this
	        ->getDefaultAdapter()
	        ->query("SELECT t1.user, t1.id, t1.data
						FROM jex_levels_incoming t1 LEFT JOIN jex_levels_ratings t2
						ON t1.id = t2.level_id
	        			WHERE t2.level_id IS NULL
	        			AND t1.user != ?
	        			ORDER BY RAND()
	        			LIMIT 1",
	            array($user)
	        )
        	->fetch();
	}
	
	
	/**
	 * Get Random Level
	 * Get a random level, any level in the system
	 * @param String $user
	 * @return row
	 */
	public function getRandomLevel()
	{
		return $this
		->getDefaultAdapter()
		->query("SELECT t1.user, t1.id, t1.data
						FROM jex_levels_incoming t1
	        			ORDER BY RAND()
	        			LIMIT 1",
				array()
		)
		->fetch();
	}
}