<?php 

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
		//$form = new Zend_Form();
   
      $this->setMethod('post');
   
      // Create and configure username element:
      $username = $this->createElement('text', 'username');
   
      $username->setRequired(true)
               ->setLabel("Username: ")
               ->addFilter('StringToLower');
               
      $username->addDecorators(array(array('Errors')));
  
      // Create and configure password element:
      $password = $this->createElement('password', 'password');

      $password	->setLabel("Password: ")
				->setRequired(true);

      // Add elements to form:
      $this->addElement($username)
           ->addElement($password)
           // use addElement() as a factory to create 'Login' button:
           ->addElement('submit', 'login', array('label' => 'Login'));
           
    }
}
           