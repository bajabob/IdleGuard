<?php

class IndexController extends Zend_Controller_Action
{

	
    public function init()
    {
    	$this->_helper->layout()->setLayout("home");
    }

    
    public function indexAction(){
    	
    	$request = $this->getRequest();
    	
    	$fields = array("email" => $request->getParam('email', ""));
    	
    	if($request->isPost())
    	{
    	
	    	$sha = new Application_Model_NanoSha256();
	    	$pass=  $sha->getSaltedHash("admin@idleguard.com", "wonka");
	    	echo $pass;
    	}
    }
    
    
}