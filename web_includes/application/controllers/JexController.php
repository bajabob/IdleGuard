<?php

class JexController extends Zend_Controller_Action
{

	
    public function init()
    {
    	$this->_helper->layout()->setLayout("blank");
    }

    
    public function indexAction()
    {
    	
    }
    
    public function publishAction()
    {
    	$request = $this->getRequest();

    	if($request->isPost())
    	{
    		$jexlevels = new Application_Model_Jex_Levels_Incoming();
    		
    		$users = new Application_Model_Jex_Users();
    		
    		$data = $request->getPost('data', "");
    		
    		$user = $request->getPost('user', "");
    		
    		if($users->exists($user))
    		{
    			$jexlevels->publish($data, $user);
    			echo json_encode(array("response" => "1"));
    			die;
    		}
    	}
    	echo json_encode(array("response" => "0"));
    	die;
    }
    
    
    public function authuserAction()
    {
    	$request = $this->getRequest();
    	 
    	if($request->isPost())
    	{
    		$users = new Application_Model_Jex_Users();
    		
    		$user = $request->getPost('user', "");
    		
    		if($users->exists($user))
    		{
    			echo json_encode(array("response" => "1"));
    			die;
    		}
    	}
    	echo json_encode(array("response" => "0"));
    	die;
    }
    
    
    
    public function getrandlevelAction()
    {
    	$request = $this->getRequest();
    	
    	if($request->isPost())
    	{
    		$users = new Application_Model_Jex_Users();
    	
    		$user = $request->getPost('user', "");
    	
    		if($users->exists($user))
    		{
    			$jexlevels = new Application_Model_Jex_Levels_Incoming();
    			$rsp = $jexlevels->getRandomLevelUR($user);
    			
    			if($rsp == null)
    				$rsp = $jexlevels->getRandomLevel(); // if our user runs out of levels to test
    			
    			if($rsp == null) // still nothing found from in database
    			{
    				echo json_encode(array("response" => "2"));
    				die;
    			}
    			
    			echo json_encode(array(
    						"response" 	=> "1",
    						'id'		=> $rsp['id'],
    						'data'		=> $rsp['data']
    			));
    			die;
    		}
    	}
    	echo json_encode(array("response" => "0"));
    	die;
    }
        
    
	public function sendbugAction()
    {
    	$request = $this->getRequest();
    	 
    	if($request->isPost())
    	{
    		$users = new Application_Model_Jex_Users();
    		 
    		$user = $request->getPost('user', "");
    		
    		$comment = $request->getPost('comment', "");
    		
    		$level = $request->getPost('level', "");
    		 
    		if($users->exists($user))
    		{
    			$bugs = new Application_Model_Jex_Levels_Bugs();
    			$bugs->publish($comment, $user, $level);
    			 
    			echo json_encode(array("response" => "1"));
    			die;
    		}
    	}
    	echo json_encode(array("response" => "0"));
    	die;
    }
    
    public function ratelevelAction()
    {
    	$request = $this->getRequest();
    	 
    	if($request->isPost())
    	{
    		$users = new Application_Model_Jex_Users();
    		 
    		$user = $request->getPost('user', "");
    		
    		$rating = $request->getPost('rating', "");
    		
    		$level = $request->getPost('level', "");
    		 
    		if($users->exists($user))
    		{
    			$ratings = new Application_Model_Jex_Levels_Ratings();
    			
    			/**
    			 * only allow user to rate a level once
    			 */
    			if( !$ratings->exists($user, $level))
    			{
    				$ratings->publish($rating, $user, $level);
    			}
    			echo json_encode(array("response" => "1"));
    			die;
    		}
    	}
    	echo json_encode(array("response" => "0"));
    	die;
    }
    
   
    
}