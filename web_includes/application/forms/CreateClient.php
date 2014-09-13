<?php 

class Application_Form_CreateClient extends Zend_Form
{

	
	protected $_user;
	protected $_checksum;
	
	public function setInfo($user, $checksum){
		$this->_user = $user;
		$this->_checksum = $checksum;
	}
	
    public function create()
    {
   
      $this->setMethod('post');
   
      
      $username = $this->createElement('hidden', 'user');
      $username->setValue($this->_user);
      $checksum = $this->createElement('hidden', 'checksum');
      $checksum->setValue($this->_checksum);
      
      
      // Create and configure username element:
      $fullname = $this->createElement('text', 'full_name');
   
      $fullname->setRequired(true)
      		   ->addValidator('regex', false, array('[^([1-zA-Z0-1@.\s]{1,255})$]'))
      		   ->addValidator('stringLength', false, array(1, 249))
               ->setLabel("* Enter Your Full Name (First+Last): ")
               ->addFilter('StringToLower');
      $fullname->getValidator('regex')->setMessage('Not a valid name. Try without special characters or numbers.');
      
      
      $phone = $this->createElement('text', 'phone');
      $phone->setRequired(true)
      		->addValidator('regex', false, array('"^[01]?[- .]?\(?[2-9]\d{2}\)?[- .]?\d{3}[- .]?\d{4}$"'))
      		->addValidator('stringLength', false, array(1, 99))
      		->setLabel("* Phone: ");
      
      $phone->getValidator('regex')->setMessage('Not a valid phone number');
      
      
      $address = $this->createElement('text', 'address');
       
      $address->setRequired(true)
      			->addValidator('stringLength', false, array(1, 499))
      			->setLabel("* Street Address: ");
      
      
      $county = $this->createElement('text', 'county');
       
      $county->setRequired(true)
      			->addValidator('stringLength', false, array(1, 249))
      			->setLabel("* County: ");
      
      $state = $this->createElement('select', 'state');
       
      $state->setRequired(true)
		      ->setLabel("* State: ")
      		  ->addValidator('stringLength', false, array(2, 2))
      		  ->addMultiOptions(array('' => '','AL'=>"Alabama",  'AK'=>"Alaska",  'AZ'=>"Arizona",  'AR'=>"Arkansas", 'CA'=>"California",  
      		  'CO'=>"Colorado",  'CT'=>"Connecticut",  'DE'=>"Delaware",'DC'=>"District Of Columbia",  'FL'=>"Florida",  'GA'=>"Georgia",  
      		  'HI'=>"Hawaii", 'ID'=>"Idaho",  'IL'=>"Illinois",  'IN'=>"Indiana",  'IA'=>"Iowa",  'KS'=>"Kansas", 'KY'=>"Kentucky",  
      		  'LA'=>"Louisiana",  'ME'=>"Maine",  'MD'=>"Maryland", 'MA'=>"Massachusetts",  'MI'=>"Michigan",  'MN'=>"Minnesota",  
      		  'MS'=>"Mississippi", 'MO'=>"Missouri",  'MT'=>"Montana", 'NE'=>"Nebraska", 'NV'=>"Nevada", 'NH'=>"New Hampshire", 
      		  'NJ'=>"New Jersey", 'NM'=>"New Mexico", 'NY'=>"New York", 'NC'=>"North Carolina", 'ND'=>"North Dakota", 'OH'=>"Ohio",  
      		  'OK'=>"Oklahoma",  'OR'=>"Oregon",'PA'=>"Pennsylvania",  'RI'=>"Rhode Island",  'SC'=>"South Carolina",  'SD'=>"South Dakota", 
      		  'TN'=>"Tennessee",  'TX'=>"Texas",  'UT'=>"Utah",  'VT'=>"Vermont",  'VA'=>"Virginia", 'WA'=>"Washington",  'WV'=>"West Virginia",  
      		  'WI'=>"Wisconsin",  'WY'=>"Wyoming"
      		));
      $state->getValidator("stringLength")->setMessage('Please select a state');
      
      
      $zip = $this->createElement('text', 'zip'); 
      $zip->setRequired(true)
      		->addValidator('regex', false, array('"(^\d{5}$)|(^\d{5}-\d{4}$)"'))
      		->setLabel("* Zip Code: ");
      $zip->getValidator('regex')->setMessage('Invalid zip code');
      
      
      $password = $this->createElement('password', 'password');

      $password->addValidator('StringLength', false, array(6, 500))
     			->setLabel("* Account password: ")
				->setRequired(true);
      $this->addDecorators(array(array('Errors')));
	  
	  // Create and configure confim password element:
      $confirmPassword = $this->createElement('password', 'confirm_password');

      $confirmPassword->addValidator('StringLength', false, array(6, 500))
     			->setLabel("* Re-enter your password: ")
				->setRequired(true);
      
      
      

      
      // Add elements to form:
      $this	->addElement($fullname)
           	->addElement($phone)
	      	->addElement($address)
	      	->addElement($county)
	      	->addElement($state)
	      	->addElement($zip)
      		->addElement($password)
      		->addElement($confirmPassword)
      		->addElement($username)
      		->addElement($checksum)
           	// use addElement() as a factory to create 'Login' button:
           	->addElement('submit', 'create', array('label' => 'Create Account'));
           
    }
}
           