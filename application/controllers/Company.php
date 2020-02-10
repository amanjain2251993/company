<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Apps.php');
class Company extends Apps {
	
	function __construct() {
        parent::__construct();      
        $this->load->model('company_model');
		$this->load->helper('application_messages_helper');
		$this->load->helper('file');
    }
	public function index()
	{		
	
			
	}
	public function create(){
		$title = $this->input->post('name');
		$email = $this->input->post('email');
		$this->form_validation->set_rules('name','Name','required|trim|callback_is_unique['.$title.']');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|callback_is_unique['.$email.']');
		if($this->form_validation->run()){			
			$data['title'] 			= $this->input->post('name');
			$data['user_id']        = $this->user_id;
			$data['website'] 		= $this->input->post('website');
			$data['address'] 		= $this->input->post('address');
			$data['email'] 			= $this->input->post('email');
			$data['created_date'] 	= time();
			$data['created_by']   	= $this->user_id;
			$data['modified_date'] 	= time();
			$data['modified_by']  	= $this->user_id;
			$data  = $this->company_model->add($data);
			if($data){					
				$response['status']= 'success';
				$response['message']= replaceSingleTag($this->lang->line('msg_suc_002'),"Title");
				echo $this->jsonify($response);
		    }else{
		    	$response['status']= 'error';
				$response['message']= replaceSingleTag($this->lang->line('msg_err_002'),"Title");
		    	echo $this->jsonify($response);
		    }
		}else{
			$response['status'] = 'error';
			$error['title'] = form_error('title'); 
			$error['email'] = form_error('email'); 
 			$response['message'] = $error;
 			echo $this->jsonify($response);
		}
	}
	public function is_unique($str){		
		$this->db->where('user_id', $this->user_id);
		if($this->input->post('email')){
			$this->db->where('email', $this->input->post('email'));
		}else{
			$this->db->where('title', $this->input->post('name'));
		}
		if($this->input->post('id')){
			$this->db->where_not_in('id',$this->input->post('id'));
		}		
		$query = $this->db->get('company');
		if($query->num_rows()){
			$this->form_validation->set_message('is_unique', 'The %s is already exist.');			
            return FALSE;
		}
        return TRUE;
	}
	public function update(){
		$title = $this->input->post('name');
		$email = $this->input->post('email');
		$this->form_validation->set_rules('name','Name','required|trim|callback_is_unique['.$title.']');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|callback_is_unique['.$email.']');
		if($this->form_validation->run()){			
			$data['title'] 			= $this->input->post('name');
			$data['website'] 		= $this->input->post('website');
			$data['address'] 		= $this->input->post('address');
			$data['email'] 			= $this->input->post('email');
			$data['modified_date'] 	= time();
			$data['modified_by']  	= $this->user_id;
			$data  = $this->company_model->update($data);
			if($data){					
				$response['status']= 'success';
				$response['message']= replaceSingleTag($this->lang->line('msg_suc_001'),"Title");
				echo $this->jsonify($response);
		    }else{
		    	$response['status']= 'error';
				$response['message']= replaceSingleTag($this->lang->line('msg_err_001'),"Title");
		    	echo $this->jsonify($response);
		    }
		}else{
			$response['status'] = 'error';
			$error['title'] = form_error('name'); 
			$error['email'] = form_error('email'); 
 			$response['message'] = $error;
 			echo $this->jsonify($response);
		}
	}
	public function get(){
		$response = $this->company_model->get();
		echo $this->jsonify($response);
	}
	
	public function delete(){
		$response = $this->company_model->delete();
		echo $this->jsonify($response);
	}
	
	
}
