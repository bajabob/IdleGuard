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
    
	
	public function dischargeAction()
	{
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
						'actionable' 	=> "Medication",
						'icon'			=> 'pill',
						'message'		=> 'Time to take your '.$_POST['medication_'.$i]."!"
					);
					$act->create(json_encode($arr));
				}
			}
			
			$arr = array(
				'actionable' 	=> "Activity",
				'icon'			=> 'exercise',
				'message'		=> $_POST['activity']
			);
			$act->create(json_encode($arr));
			
			Zend_Debug::dump($_POST);die;
		}
	}
    
}