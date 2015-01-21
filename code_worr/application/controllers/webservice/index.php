<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 
	 */
	 
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
		$this->load->model("User_profile_model");
		session_start();
    }

	
	
	
	function registration(){
		
		if(!isset($_POST['first_name'])){
			exit();
		}
		
		$outputArray = array();
		$dbData = array();
		$dbData['first_name'] = addslashes($_POST['first_name']);
		$dbData['last_name'] = addslashes($_POST['last_name']);
		$dbData['email_address'] = addslashes($_POST['email_address']);
		$dbData['password'] = $_POST['password'];
		$dbData['address'] = addslashes($_POST['address']);
		$dbData['city'] = addslashes($_POST['city']);
		$dbData['country'] = addslashes($_POST['country']);
		$dbData['cell_no'] = addslashes($_POST['cell_no']);
		$dbData['added_on'] = date("y-m-d");
		
		$result = $this->User_profile_model->Add($dbData);
		
		$outputArray['result'] = $result;
		
		echo json_encode($outputArray);
		
	}
	
	function checkLogin(){
	
		if(!isset($_POST['email_address'])){
			exit();
		}
		
		$outputArray = array();
		$dbData = array();
		
		$email_address = addslashes($_POST['email_address']);
		$password = addslashes($_POST['password']);
		
		$userDetails = $this->User_profile_model->GetDetailsByEmail($email_address);
		if(!isset($userDetails['password'])){
			$outputArray['result'] = "failed";
			$outputArray['message'] = "This email is not registered yet!";
		}else if($userDetails['password'] == $password ){
			$outputArray['result'] = "success";
			$_SESSION['code_warrior_user_id'] = $userDetails['user_id'];
		}else if( $userDetails['password'] != $password ){
			$outputArray['result'] = "failed";
			$outputArray['message'] = "Email and password do not match!";
		}
		
		echo json_encode($outputArray);
		
	}
	
	
	function updateProfile(){
		
		if(!isset($_SESSION['code_warrior_user_id'])){
			exit();
		}
		
		if(!isset($_POST['first_name'])){
			exit();
		}
		
		$outputArray = array();
		$dbData = array();
		$dbData['first_name'] = addslashes($_POST['first_name']);
		$dbData['last_name'] = addslashes($_POST['last_name']);
		$dbData['password'] = $_POST['password'];
		$dbData['address'] = addslashes($_POST['address']);
		$dbData['city'] = addslashes($_POST['city']);
		$dbData['country'] = addslashes($_POST['country']);
		$dbData['cell_no'] = addslashes($_POST['cell_no']);
		
		$result = $this->User_profile_model->Update($_SESSION['code_warrior_user_id'], $dbData);
		
		$outputArray['result'] = $result;
		
		echo json_encode($outputArray);
		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */