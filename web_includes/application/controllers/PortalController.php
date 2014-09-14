<?php

class PortalController extends Zend_Controller_Action
{


	public function init()
	{
		$this->_helper->layout()->setLayout("home");
		$authNamespace = new Zend_Session_Namespace('Zend_Auth');
		$this->view->user = $authNamespace;
	}
	
	public function indexAction()
	{
	}
	
	public function respondAction(){
		$request = $this->getRequest();
		
		$id = $request->getParam("id", 0);
		
		$alerts = new Application_Model_Alerts();
		$alerts->markRead($id);
	}
    
	public function respondingAction(){
    	$act = new Application_Model_Actionables();
    	$arr = array(
    			'status'		=> 1,
    			'actionable' 	=> "Help",
    			'icon'			=> 'ok',
    			'message'		=> "Help is on the way!"
    	);
    	$act->create(json_encode($arr));
	}
	
	public function dischargedAction(){
		$request = $this->getRequest();
			
		/**
		 * a post action has occured, validate data
		*/
		if($request->isPost())
		{
				
			$act = new Application_Model_Actionables();
				
			for($i = 0; $i < 10; $i++)
			{
			if(isset($_POST['medication_'.$i]))
			{
			$arr = array(
			'status'		=> 1,
			'actionable' 	=> "Medication",
					'icon'			=> 'pill',
					'message'		=> 'Time to take your '.$_POST['medication_'.$i]."!"
			);
					$act->create(json_encode($arr));
			}
			}
				
			$arr = array(
			'status'		=> 1,
			'actionable' 	=> "Activity",
					'icon'			=> 'exercise',
					'message'		=> $_POST['activity']
			);
			$act->create(json_encode($arr));
				
		}
	}
	
	public function dischargeAction()
	{
		
	}
    
}