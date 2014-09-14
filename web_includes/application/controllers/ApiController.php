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
    
    
    public function sendalertAction()
    {
    	$act = new Application_Model_Actionables();
    	$arr = array(
    			'status'		=> 1,
    			'actionable' 	=> "Help",
    			'icon'			=> 'ok',
    			'message'		=> "Help is on the way!"
    	);
    	$act->create(json_encode($arr));
    	die;
    }
    
    public function getactionablesAction()
    {
    	$act = new Application_Model_Actionables();
    	$row = $act->getActionable();
    	if(isset($row))
    	{
    		echo $row->name;
    	} 
    	else 
    	{
    		echo json_encode(array(	"status" => "0"));
    	}
//     			json_encode(array(	"status"	=> "1",
//     							"actionable" => "Hydrate", 
//     							"icon" => "water", 
//     							"message" => "Hi eleni!.",
//     							"show_timestamp" => "1410590293",
//     							"show_time"	=> date("F j, Y, g:i a", "1410590293")));
    	die;
    }
    
    
}