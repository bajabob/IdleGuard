<?php

class ApiController extends Zend_Controller_Action
{

    public function init()
    {
    	$this->_helper->layout()->setLayout("blank");
    }
    
    public function indexAction(){
    	die("API");
    }
    
    public function getactionablesAction()
    {
    	$data = array();
    	
    	array_push($data, array("actionable" => "Hydrate", 
    							"icon" => "water", 
    							"message" => "Jim, you need to make sure you drink some water.",
    							"show_timestamp" => "1410590293",
    							"show_time"	=> date("F j, Y, g:i a", "1410590293") 
    		)
    	);
    	
    	array_push($data, array("actionable" => "Take Medication",
						    	"icon" => "pill",
						    	"message" => "Jim, you need to take your medicine.",
						    	"show_timestamp" => "1410601279",
						    	"show_time"	=> date("F j, Y, g:i a", "1410601279")
    		)
    	);
    	
    	echo json_encode($data);
    	die;
    }
    
    
}