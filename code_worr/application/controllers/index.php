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
		$this->load->model("Country_model");
		session_start();
    }

	function index(){
		
		$this->load->view("template/header.php");
		$this->load->view("index.php");
		$this->load->view("template/footer.php");
		
	}
	
	function login(){
		
		$this->load->view("template/header.php");
		$this->load->view("login.php");
		$this->load->view("template/footer.php");
		
	}
	
	function registration(){
		
		$data = array();
		
		$countryList = $this->Country_model->GetList();
		$data['countryList'] = $countryList;
		
		$this->load->view("template/header.php");
		$this->load->view("registration.php", $data);
		$this->load->view("template/footer.php");
		
	}
	
	function profile(){
		
		$data = array();
		
		if(!isset($_SESSION['code_warrior_user_id'])){
			header("Location:login");
		}
		
		$userDetails = $this->User_profile_model->GetDetails($_SESSION['code_warrior_user_id']);
		$data['userDetails'] = $userDetails;
		
		$countryList = $this->Country_model->GetList();
		$data['countryList'] = $countryList;
		
		$this->load->view("template/header.php");
		$this->load->view("profile.php", $data);
		$this->load->view("template/footer.php");
		
	}
	
	
	function logout(){
		
		if(isset($_SESSION['code_warrior_user_id'])){
			unset($_SESSION['code_warrior_user_id']);
		}
		header("Location:login");
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */