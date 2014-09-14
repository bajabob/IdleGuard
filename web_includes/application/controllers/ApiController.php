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
    	echo json_encode(array(	"status"	=> "1",
    							"actionable" => "Hydrate", 
    							"icon" => "water", 
    							"message" => "Hi eleni!.",
    							"show_timestamp" => "1410590293",
    							"show_time"	=> date("F j, Y, g:i a", "1410590293")));
    	die;
    }
    
    
}