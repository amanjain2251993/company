<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
        parent::__construct();      
        $this->load->model('login_model');
				
    }
	public function index()
	{		if($this->session->userdata('isLoggedIn') == True){
				redirect('dashboard');
			}else{
				$this->load->view('login/login_view');
			}
			
	}
		
	public function dashboard(){
		if($this->session->userdata('isLoggedIn') == True){
		$this->load->view('header');
		$this->load->view('dashboard/dashboard');
		$this->load->view('footer');		
		}
		else{
				redirect('login');
			}
			
	}
	public function user_login(){
		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('password','password','required|trim');
		if($this->form_validation->run()){
			$data['email'] = $this->input->post('email');			
			$data['password'] = md5($this->input->post('password'));
			$res = $this->login_model->valid_login($data);
			if($res != 0){
						$this->session->set_userdata('id',$res['id']);
						$this->session->set_userdata('isLoggedIn', true);
						$this->session->set_userdata('userData' ,$data);
						$this->session->set_userdata('login_user_data' ,$res['user_id']);
						$data['result'] = 1;
						echo json_encode($data);
						die;
					}
			else{
				$data['result'] = 0;			
				$data['status'] = 'error';
				echo json_encode($data);
				die;
			}
			
		}else{
			$error['email'] = strip_tags(form_error('email'));
			$error['password'] = strip_tags(form_error('password'));
			$response['error'] = $error;			
			echo json_encode($response);
			die;			
		}
	}

	
	public function logout() {        
        $this->session->unset_userdata('userData');
        $this->session->unset_userdata('login_user_data');
        $this->session->unset_userdata('isLoggedIn');
        redirect('login');
    }
	
}
