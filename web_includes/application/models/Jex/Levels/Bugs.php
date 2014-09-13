<?php

class Application_Model_Jex_Levels_Bugs extends Zend_Db_Table_Abstract{

	
	protected $_name = 'jex_levels_bugs';	

    
	public function publish($comment, $user, $level)
	{
		$arr = array(
			    'comment'      	=> $comment,
				'user'      	=> strtolower(trim($user)),
				'level_id'  	=> $level,
				'time_created'	=> time()
		);
		return $this->insert($arr);
	}
		
}