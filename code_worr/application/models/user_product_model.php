<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_profile_model extends CI_Model {
	 
	function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	function GetDetails($user_id){
		
		$sqlQuery = "select * from product where user_id = '{$user_id}'";
		$resultObj = $this->db->query($sqlQuery);
		
		return $resultObj->first_row("array");
		
	}
	
}