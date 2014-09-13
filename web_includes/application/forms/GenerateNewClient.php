<?php 

class Application_Form_GenerateNewClient extends Zend_Form
{

    public function init()
    {
		//$form = new Zend_Form();
   
      $this->setMethod('post');
   
      // Create and configure username element:
      $username = $this->createElement('text', 'username');
   
      $username->setRequired(true)
               ->setLabel("* Client's Username [full website name without www./.com/etc | www.hoverdog.com = \"hoverdog\"]: ")
               ->addFilter('StringToLower')
      		   ->addValidator('regex', false, array('[^([a-zA-Z])[a-zA-Z_-]*[\w_-]*[\S]$|^([a-zA-Z])[0-9_-]*[\S]$|^[a-zA-Z]*[\S]$]'))
               ->addValidator('stringLength', false, array(1, 149));
      $username->getValidator('regex')->setMessage('Not a valid username. We do not accept spaces or slashes.');
  
      
      $email = $this->createElement('text', 'email');

      $email	->setLabel("* Client's Email For Activation: ")
				->setRequired(true)
      			->addValidator('regex', false, array('[^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$]'))
                ->addValidator('stringLength', false, array(1, 249));
      $email->getValidator('regex')->setMessage('Not a valid email address.');

      
      $startupCost = $this->createElement('text', 'startup_cost');
      $startupCost->setRequired(true)
	      ->setLabel("* Startup Cost USD XXXX.XX [1499.99]: ")
	      ->addValidator('regex', false, array('"(?!^0*$)(?!^0*\.0*$)^\d{1,5}(\.\d{1,2})?$"'))
	      ->addValidator('stringLength', false, array(1, 10));
	  $startupCost->getValidator('regex')->setMessage('Not a valid amount. Only include numbers and decimal point.');

	  $monthlyFee = $this->createElement('text', 'monthly_fee');
	  $monthlyFee->setRequired(true)
	      	->setLabel("* Monthly Fee USD XXXX.XX [49.99]: ")
	      	->addValidator('regex', false, array('"(?!^0*$)(?!^0*\.0*$)^\d{1,5}(\.\d{1,2})?$"'))
	      	->addValidator('stringLength', false, array(1, 10));
	  $monthlyFee->getValidator('regex')->setMessage('Not a valid amount. Only include numbers and decimal point.');
      
      
      // Add elements to form:
      $this->addElement($username)
           ->addElement($email)
           ->addElement($startupCost)
      	   ->addElement($monthlyFee)
           // use addElement() as a factory to create 'Login' button:
           ->addElement('submit', 'send', array('label' => 'Send'));
           
    }
}
           