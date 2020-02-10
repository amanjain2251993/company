<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apps extends CI_Controller{

	public function __construct(){
		parent::__construct();		
		$this->form_validation->set_error_delimiters('',''); 
		$this->user_id =$this->get_login_user_id("login_user_data");		
	}
	function get_login_user_id($session_name){
		return $this->session->userdata($session_name);
	}
				
	public function jsonify($array,$JSON_NUMERIC_CHECK=1){		
		header('Content-Type: application/json');
		if(isset($array['status']) && $array['status']=='error'){
			return json_encode($array);
		}
		if(isset($_REQUEST['draw'])){
			$array['draw'] = $_REQUEST['draw']+1;
		}
		if(isset($_REQUEST['current_page'])){
			$array['current_page'] = $_REQUEST['current_page'];
		}
		if(isset($_REQUEST['items_per_page'])){
			$array['items_per_page'] = $_REQUEST['items_per_page'];
		}
		if(isset($_REQUEST['order_by'])){
			$array['order_by'] = $_REQUEST['order_by'];
		}
		if(isset($_REQUEST['order_type'])){
			$array['order_type'] = $_REQUEST['order_type'];
		}
		if(isset($_REQUEST['callback'])){
			$array['callback'] = $_REQUEST['callback'];
		}
		if(isset($_REQUEST['redirect_url'])){
			$array['redirect_url'] = $_REQUEST['redirect_url'];
		}
		if($JSON_NUMERIC_CHECK){
			return json_encode($array,JSON_NUMERIC_CHECK);
		}else{
			return json_encode($array);
		}
	}
	
	public function view($param){
		$this->load->view('header');
		$this->load->view($param);
		$this->load->view('footer');
	}
	
}
