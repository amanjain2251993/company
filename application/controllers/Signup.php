<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
	
	function __construct() {
        parent::__construct();      
		 //Load login model
        $this->load->model('signup_model');     
    }
	public function index(){		
		$this->load->view('login/reg');
	}
	
	public function user_register(){		
		$this->form_validation->set_rules('name','First Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('confirm_password','Confirm Password','required|trim|matches[password]');
		if($this->form_validation->run()){
			$data['name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['password'] = md5($this->input->post('password'));
			$data['mobile_no'] = $this->input->post('phone_number');
			$data['jobtype'] = $this->input->post('jobtype');
			$data['status'] = 0;
			$data['created'] = time();			
			$data['verify_link'] = time();
			$data['user_id'] = $this->generate_user_id();
			$res = $this->signup_model->user_register($data);
			if($res == 1){				
				$data['status'] = 'success';
				$data['message_display'] = 'Successfully LogIn';
				$data['activate'] = 'Please varify your account on your email.';
				$this->session->set_userdata('userData' ,$data);
				echo json_encode($data);	
			}else{
				$response['status'] = 'error';
				$error['email'] = 'Email already exist';
				$response['error'] = $error;			
				echo json_encode($response);				
			}
			
		}else{
			$response['status'] = 'error';
			$error['name'] = strip_tags(form_error('name'));
			$error['email'] = strip_tags(form_error('email'));
			$error['password'] = strip_tags(form_error('password'));
			$error['confirm_password'] = strip_tags(form_error('confirm_password'));
			$response['error'] = $error;			
			echo json_encode($response);	
	}
	}
	
	public function getuser(){
		$data = $this->login_model->getUser();
		echo json_encode($data);
	}
	public function forget_password_view(){
		$this->load->view('forget_password');
	}
	public function forget_password(){	  
	 
	    $this->form_validation->set_rules('email','Email','trim|required|valid_email');
		if($this->form_validation->run())
		 {
		   $data = $this->login_model->forgetEmail();		
			  $output['error'] = 'no';
			  $output['msg'] = 'Please Check your email to reset your password';
		}else {
		      $output['error'] = 'yes';
			  $output['msg'] = 'Email does not exists in our database';
		   }		 		  
		echo json_encode($output); die;
	  }
	function recoverPassword($forget_pass_code){
	 
	 $user_id = explode('-',base64_decode(base64_decode($forget_pass_code)))[1];
	 $output['validlink'] = $this->login_model->checkForResetPass($forget_pass_code,$user_id);
	 $output['linkcode'] = $forget_pass_code;
	 $this->load->view('reset_password',$output);
	}
	function resetPassword(){	  
	    $this->form_validation->set_rules('password','Password','trim|required');
	    $this->form_validation->set_rules('cnfpassword','Confirm Password','trim|required|matches[password]');
		if($this->form_validation->run())
		 { 
		   $user_id = explode('-',base64_decode(base64_decode($this->input->post('code'))))[1];
		   $this->login_model->resetPassword($user_id);
		   $output['error'] = 'no';
		   $output['msg'] = 'Password changed successfully';		   
		 }
		 else{
		  
		      $output['error'] = 'yes';
			  $output['msg'] = validation_errors();
		  }
		echo json_encode($output); die;	  
	}
	
	function varifyEmail($varification_code)
	 {
	    $this->db->where('verify_link',$varification_code);
		$query = $this->db->get('register');
		$checkCode = $query->num_rows();
	   if($checkCode==1)
	    {
		  $this->db->set('verify_link','');
		  $this->db->set('status','1');
		  $this->db->where('verify_link',$varification_code);
		  $this->db->update('register');
		  $this->session->set_userdata('success_msg','Email Verified Successfully.');
		  redirect('login');
		} else {
		  $this->session->set_userdata('success_msg','Link Expired!');
		  redirect('register');
		}
	   
	 }
	 public function generate_user_id(){
		 $result = $this->db->query("SELECT MID(UUID(),1,18)");
		return str_replace("-",'',$result->row_array()['MID(UUID(),1,18)']);
	 }
	
}
