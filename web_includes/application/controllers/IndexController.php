<?php

class IndexController extends Zend_Controller_Action
{


	public function init()
	{
		$this->_helper->layout()->setLayout("landing");
	}
	
	public function indexAction()
	{
		$request = $this->getRequest();
		
		$fields = array("email" => $request->getParam('email', ""));
		 
		/**
		 * a post action has occured, validate data
		*/
		if($request->isPost())
		{
			$hasError = false;
			 
			$email = trim($request->getPost('email', ""));
			$fields["email"] = $email;
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$hasError = true;
				$fields["email_error"] = "Not a valid email.";
			}
			 
			$password = $request->getPost('password', "");
			$fields["password"] = "";
			if(strlen($password) < 4)
			{
				$hasError = true;
				$fields["password_error"] = "Password must be at least 4 characters!";
			}
			
			if(!$hasError)
			{
				$member = new Application_Model_Users();
			
				if($member->exists($email))
				{
					$user = $member->getUser($email);
					$sha = new Application_Model_NanoSha256();
					
					if ($sha->getSaltedHash($email, $password) == $user->pass)
					{
						$authNamespace = new Zend_Session_Namespace('Zend_Auth');
						$authNamespace->id = $user->id;
						$authNamespace->email = $user->email;
						$authNamespace->name_first = $user->name_first;
						$authNamespace->name_last = $user->name_last;
						$authNamespace->account_type = $user->account_type;
						$authNamespace->name = $user['name_first']." ".$user['name_last'];
						return $this->_redirect('/portal');
					}
					else
					{
						$hasError = true;
						$fields["error"] = "Invalid email/password combination!";
					}
				}
				else
				{
					$hasError = true;
					$fields["error"] = "Invalid email/password combination!";
				}
			}
			if($hasError)
			{
				$fields["has_error"] = true;
			}
			$this->view->fields = $fields;
		}
	}
    
    
}