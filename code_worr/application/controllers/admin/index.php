<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
	 
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
		$this->load->model("Admin_model");
		$this->load->model("City_model");
		$this->load->model("Type_model");
		$this->load->model("Property_model");
		$this->load->model("Media_model");
		$this->load->model("Booking_details_model");
		$this->load->model("Country_model");
		$this->load->model("Contents_model");
		session_start();
    } 
    
    
    private function checkAdminLogin(){
	
		if(!isset($_SESSION['admin_id'])){
			redirect('/admin/login');
		}
	}
      
	public function index()
	{
		$this->checkAdminLogin();
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/template/footer.php');
	}
	
	
	
	public function login()
	{
		$data = array();
		
		if(isset($_POST['loginSubmit'])){
			$username = addslashes($_POST['username']);
			$password = addslashes($_POST['password']);
			
			$loginResult = $this->Admin_model->checkLogin($username,$password);
			if($loginResult != 0 && $loginResult != -1){
				$_SESSION['admin_id'] = $loginResult['admin_id'];
				redirect('/admin/dashboard');
			}
			$data['loginResult'] = $loginResult;
			
		}
		
		$this->load->view('admin/login.php',$data);
	}
	
	
	function logout(){
		
		if(isset($_SESSION['admin_id'])){
			unset($_SESSION['admin_id']);
		}
		redirect('/admin/login');
		
	}
	
	
	function dashboard(){
		
		$this->checkAdminLogin();
		
		$data = array();
		
		$propertyNumber = $this->Property_model->getTotalNumber();
		$data['propertyNumber'] = $propertyNumber;
		
		$totalType = $this->Type_model->getTotalNumber();
		$data['totalType'] = $totalType;
		
		$totalLocation = $this->City_model->getTotalNumber();
		$data['totalLocation'] = $totalLocation;
		
		$totalActiveBooking = $this->Booking_details_model->getTotalNumber();
		$data['totalActiveBooking'] = $totalActiveBooking;
		
		$propertyList = $this->Property_model->propertyList(5);
		$data['propertyList'] = $propertyList;
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/dashboard.php',$data);
		$this->load->view('admin/template/footer.php');
	}
	
	
	function editProfile(){
		
		$this->checkAdminLogin();
		
		$data = array();
		
		if(isset($_POST['editProfileSubmit'])){
			$username = addslashes($_POST['adminUsername']);
			$password = addslashes($_POST['adminPassword']);
			
			$editResult = $this->Admin_model->updateProfile($username, md5($password));
			$data['editResult'] = $editResult;
		}
		
		$adminDetails = $this->Admin_model->getDetails();
		$data['adminDetails'] = $adminDetails;
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/edit_profile.php',$data);
		$this->load->view('admin/template/footer.php');
		
	}
	
	function cityList(){
		
		$this->checkAdminLogin();
		
		$data = array();
		
		$cityList = $this->City_model->cityList();
		$data['cityList'] = $cityList;
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/city_list.php',$data);
		$this->load->view('admin/template/footer.php');
	}
	
	function addCity(){
		
		$this->checkAdminLogin();
		
		$data = array();
		
		if(isset($_POST['addcitySubmit'])){
			$name = addslashes($_POST['cityName']);
			
			$addResult = $this->City_model->addCity($name);
			$data['addResult'] = $addResult;
		}
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/add_city.php',$data);
		$this->load->view('admin/template/footer.php');
	}
	
	
	function editCity(){
		
		$this->checkAdminLogin();
		
		$data = array();
		
		if(!isset($_GET['cityId'])) exit();
		$cityId = (int)$_GET['cityId'];
		
		if(isset($_POST['editcitySubmit'])){
			$name = addslashes($_POST['cityName']);
			$editResult = $this->City_model->updateCity($cityId,$name);
			$data['editResult'] = $editResult;
		}
		
		$cityDetails = $this->City_model->cityDetails($cityId);
		$data['cityDetails'] = $cityDetails;
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/edit_city.php',$data);
		$this->load->view('admin/template/footer.php');
	}
	
	
	function deleteCity(){
		
		$this->checkAdminLogin();
		
		if(!isset($_GET['cityId'])) exit();
		$cityId = (int)$_GET['cityId'];
		
		$this->City_model->deleteCity($cityId);
		header("Location:{$_SERVER['HTTP_REFERER']}");
	}
	
	
	
	
	
	
	
	function typeList(){
		
		$this->checkAdminLogin();
		
		$data = array();
		
		$typeList = $this->Type_model->typeList();
		$data['typeList'] = $typeList;
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/type_list.php',$data);
		$this->load->view('admin/template/footer.php');
		
	}
	
	
	function addType(){
		
		$this->checkAdminLogin();
		
		$data = array();
		
		if(isset($_POST['addTypeSubmit'])){
			$name = addslashes($_POST['typeName']);
			
			$addResult = $this->Type_model->addType($name);
			$data['addResult'] = $addResult;
		}
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/add_type.php',$data);
		$this->load->view('admin/template/footer.php');
		
		
	}
	
	
	function editType(){
		
		$this->checkAdminLogin();
		
		$data = array();
		
		if(!isset($_GET['typeId'])) exit();
		$typeId = (int)$_GET['typeId'];
		
		if(isset($_POST['editTypeSubmit'])){
			$name = addslashes($_POST['typeName']);
			$editResult = $this->Type_model->updateType($typeId,$name);
			$data['editResult'] = $editResult;
		}
		
		$typeDetails = $this->Type_model->typeDetails($typeId);
		$data['typeDetails'] = $typeDetails;
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/edit_type.php',$data);
		$this->load->view('admin/template/footer.php');
		
	}
	
	
	
	function deleteType(){
		
		$this->checkAdminLogin();
		
		if(!isset($_GET['typeId'])) exit();
		$typeId = (int)$_GET['typeId'];
		
		$this->Type_model->deleteType($typeId);
		header("Location:{$_SERVER['HTTP_REFERER']}");
		
	}
	
	
	
	
	
	function propertyList(){
		
		$this->checkAdminLogin();
		
		$data = array();
		
		$propertyList = $this->Property_model->propertyList("");
		$data['propertyList'] = $propertyList;
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/property_list.php',$data);
		$this->load->view('admin/template/footer.php');
		
	}
	
	function addProperty(){
		
		$this->checkAdminLogin();
		
		$data = array();
		
		if(isset($_POST['addPropertySubmit'])){
			$isFeatured = 0;
			$title = addslashes($_POST['propertyTitle']);
			$propertyType = addslashes($_POST['propertyType']);
			$cityId = addslashes($_POST['cityId']);
			$bedroom = addslashes($_POST['bedroom']);
			$maxGuest = addslashes($_POST['maxGuest']);
			$expense = addslashes($_POST['expense']);
			$isFeatured = addslashes($_POST['isFeatured']);
			$fullDescription = addslashes($_POST['fullDescription']);
			$status = addslashes($_POST['status']);
			
			
			$addResult = $this->Property_model->addProperty($title, $propertyType, $cityId, $bedroom, $maxGuest, $expense,$isFeatured, $fullDescription, $status);
			$data['addResult'] = $addResult;
		}
		
		$typeList = $this->Type_model->typeList();
		$data['typeList'] = $typeList;
		
		$cityList = $this->City_model->cityList();
		$data['cityList'] = $cityList;
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/add_property.php',$data);
		$this->load->view('admin/template/footer.php');

 
	}
	
	
	function deleteProperty(){
		
		$this->checkAdminLogin();
		
		if(!isset($_GET['propertyId'])) exit();
		$propertyId = (int)$_GET['propertyId'];
		
		$this->Property_model->deleteProperty($propertyId);
		header("Location:{$_SERVER['HTTP_REFERER']}");
		
	}
	
	
	function editProperty(){
		
		$this->checkAdminLogin();
		
		$data = array();
		
		if(!isset($_GET['propertyId'])) exit();
		$propertyId = (int)$_GET['propertyId'];
		
		if(isset($_POST['editPropertySubmit'])){
			
			$isFeatured = 0;
			$title = addslashes($_POST['propertyTitle']);
			$propertyType = addslashes($_POST['propertyType']);
			$cityId = addslashes($_POST['cityId']);
			$bedroom = addslashes($_POST['bedroom']);
			$maxGuest = addslashes($_POST['maxGuest']);
			$expense = addslashes($_POST['expense']);
			$isFeatured = addslashes($_POST['isFeatured']);
			$fullDescription = addslashes($_POST['fullDescription']);
			$status = addslashes($_POST['status']);
			
			
			$editResult = $this->Property_model->updateProperty($propertyId, $title, $propertyType, $cityId, $bedroom, $maxGuest, $expense,$isFeatured, $fullDescription, $status);
			$data['editResult'] = $editResult;
		}
		
		$typeList = $this->Type_model->typeList();
		$data['typeList'] = $typeList;
		
		$cityList = $this->City_model->cityList();
		$data['cityList'] = $cityList;
		
		$propertyDetails = $this->Property_model->propertyDetails($propertyId);
		$data['propertyDetails'] = $propertyDetails;
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/edit_property.php',$data);
		$this->load->view('admin/template/footer.php');
		
	}
	
	
	
	
	
	
	function showAlbum(){
		
		$this->checkAdminLogin();
		
		$data = array();
		
		if(!isset($_GET['propertyId'])) exit();
		$propertyId = (int)$_GET['propertyId'];
		
		$imageList = $this->Media_model->albumDetails($propertyId);
		$data['imageList'] = $imageList;
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/show_album.php',$data);
		$this->load->view('admin/template/footer.php');
	}
	
	
	function addMedia(){
		
		$this->checkAdminLogin();
		
		$data = array();
		
		if(!isset($_GET['propertyId'])) exit();
		$propertyId = (int)$_GET['propertyId'];
		
		if(isset($_POST['addImageSubmit'])){
			$config['upload_path'] = APPPATH .'../uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if(! $this->upload->do_multi_upload("mediaFile")) {
    		    $data['error'] = "There were problems in uploading media file!";
    		}else{
				$uploadResponseData = $this->upload->get_multi_upload_data();
				
				foreach($uploadResponseData as $aResponse){
					$this->Media_model->addMedia($propertyId, $aResponse['file_name']);
				}
				header("Location:showAlbum?propertyId={$propertyId}");
			}
	
		}
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/add_media.php',$data);
		$this->load->view('admin/template/footer.php');
		
	}
	
	
	function deleteMedia(){
		
		$this->checkAdminLogin();
		
		if(!isset($_GET['mediaId'])) exit();
		$mediaId = (int)$_GET['mediaId'];
		
		$this->Media_model->deleteMedia($mediaId);
		header("Location:{$_SERVER['HTTP_REFERER']}");
		
	}
	
	
	
	
	function activeBookingList(){
		
		$this->checkAdminLogin();
		
		$data = array();
		
		$activeBookingList = $this->Booking_details_model->activeBookingList();
		$data['activeBookingList'] = $activeBookingList;
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/active_booking_list.php',$data);
		$this->load->view('admin/template/footer.php');
		
	}
	
	
	function deleteBooking(){
		
		$this->checkAdminLogin();
		
		if(!isset($_GET['bookingDetailsId'])) exit();
		$bookingDetailsId = (int)$_GET['bookingDetailsId'];
		
		$this->Booking_details_model->deleteBooking($bookingDetailsId);
		header("Location:{$_SERVER['HTTP_REFERER']}");
		
	}
	
	
	function editBooking(){
		
		$this->checkAdminLogin();
		
		$data = array();
		
		if(!isset($_GET['bookingDetailsId'])) exit();
		$bookingDetailsId = (int)$_GET['bookingDetailsId'];
		
		if(isset($_POST['editBookingSubmit'])){
			
			$startDate = addslashes($_POST['startDate']);
			$endDate = addslashes($_POST['endDate']);
			$numberOfPersonToStay = addslashes($_POST['numberOfPersonToStay']);
			$clientFirstName = addslashes($_POST['clientFirstName']);
			$clientLastName = addslashes($_POST['clientLastName']);
			$clientEmail = addslashes($_POST['clientEmail']);
			$clientContactNumber = addslashes($_POST['clientContactNumber']);
			$country = addslashes($_POST['country']);
			$comments = addslashes($_POST['comments']);
			
			
			$editResult = $this->Booking_details_model->updateBooking($bookingDetailsId, $startDate, $endDate, $numberOfPersonToStay, $clientFirstName, $clientLastName, $clientEmail, $clientContactNumber, $country, $comments);
			$data['editResult'] = $editResult;
		}
		
		$bookingDetails = $this->Booking_details_model->bookingDetails($bookingDetailsId);
		$data['bookingDetails'] = $bookingDetails;
		
		$countryList = $this->Country_model->getList();
		$data['countryList'] = $countryList;
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/edit_booking.php',$data);
		$this->load->view('admin/template/footer.php');
		
	}
	
	
	function setFeaturedImage(){
		
		$this->checkAdminLogin();
		
		$propertyId = addslashes($_GET['propertyId']);
		$mediaId = addslashes($_GET['imageId']);
		
		$this->Property_model->setFeaturedImage($propertyId, $mediaId);
		
		header("Location:{$_SERVER['HTTP_REFERER']}");
	}
	
	
	
	
	
	function editContentDetails(){
		
		$this->checkAdminLogin();
		
		$data = array();
		
		$contentId = addslashes($_GET['contentId']);
		
		if(isset($_POST['editContentSubmit'])){
			$contents = $_POST['contents'];
			$editResult = $this->Contents_model->editContent($contentId, $contents);
			$data['editResult'] = $editResult;
		}
		
		$contentDetails = $this->Contents_model->getDetails($contentId);
		$data['contentDetails'] = $contentDetails;
		
		$this->load->view('admin/template/header.php');
		$this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/template/topbar.php');
		$this->load->view('admin/edit_content.php',$data);
		$this->load->view('admin/template/footer.php');
		
	}
}
