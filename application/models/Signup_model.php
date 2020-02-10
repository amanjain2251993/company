<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup_model extends CI_Model {

	public function user_register($data){
		$this->db->select('id');
			 $this->db->where('email',$data['email']);
			 $query = $this->db->get('register');			 
			 if($query->num_rows() > 0){
				return 0;
			 }else{
				 $this->db->insert('register',$data);
				$user_id =   $this->db->insert_id();
				$verify_code = time().$user_id;
				$this->db->set('verify_link',$verify_code);
				$this->db->where('id',$user_id);
				$this->db->update('register');
				$varificationlink = site_url('verify-email/'.$verify_code);
					$subject = 'Welcome to  - Please Activate your Account!';
					$message ="Hey ".$data['name'].",
								<br/><br/>								
								Please verify your email address by following the steps mentioned below:
								Either Copy ".$varificationlink." & paste it in your browser to verify your email address or 
								<b><a href=\"".$varificationlink."\">click here!</a></b>
								<br/><br/>";
					$email = $data['email'];				
					//$this->sendEmail($subject,$message,$email);
					$this->session->set_flashdata('success_msg','Please check your email inbox to verify your email id.');
					return 1;
			 }
	}
		 public function sendEmail($email,$subject,$message)
		{

			$config = Array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'ssl://smtp.googlemail.com',
			  'smtp_port' => 465,
			  'smtp_user' => 'amanjain2251993@gmail.com', 
			  'smtp_pass' => '**********', 
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1',
			  'wordwrap' => TRUE
			);


			  $this->load->library('email', $config);
			  $this->email->set_newline("\r\n");
			  $this->email->from('amanjain2251993@gmail.com');
			  $this->email->to($email);
			  $this->email->subject($subject);
			  $this->email->message($message);
			  if($this->email->send())
			 {
			  echo 'Email send.';
			 }
			 else
			{
			 show_error($this->email->print_debugger());
			}

		}
		
	
	public function getUser(){
		$id = $this->session->userdata('id');		 
		$this->db->select('image,created');
		$this->db->where('id',$id);
		$query = $this->db->get('register');
		return $query->row_array();

	}
	function forgetEmail(){
     $this->db->where('email',$this->input->post('email'));
	 $query = $this->db->get('register');
	 $data['emailExists'] =$emailExists =  $query->num_rows();
	 $userData = $query->row();
	 if($emailExists!=0)
	  {
	    $forget_pass_code = base64_encode(base64_encode(time().'-'.$userData->id));
		$forget_pass_exptime = strtotime('+1 day',time());
		$this->db->set('forget_pass_code',$forget_pass_code);
		$this->db->set('forget_pass_exptime',$forget_pass_exptime);
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('id',$userData->id);
		$this->db->update('register');
		$data['forget_pass_code'] = $forget_pass_code;
		$link = site_url('recover-password/'.$data['forget_pass_code']);			  
				$subject = 'Social - Forget Password Email';
				$message ="Hello ".$userData->username .",
						<br/><br/>
						Please <a href='".$link."' target='_blank'>click</a> the following link if you forgot your passowrd ".$link."
						<br/><br/>
						In case you have any questions, feel free to contact us at social development team
						<br/><br/>
						Regards,
						<br/><br/>
						Social Team <br/>";
				$email = $userData['email'];						
			//$this->sendEmail($subject,$message,$email);
			return $data;
	  }else{
		  return 'error';
	  }
	 
  }
   function checkForResetPass($forget_pass_code,$user_id){
  
     $this->db->select('forget_pass_exptime');
	 $this->db->where('forget_pass_code',$forget_pass_code);
	 $this->db->where('id',$user_id);
	 $query = $this->db->get('register');
	 $data = $query->row();
	 if($query->num_rows()!=0)
	  {
	    if($data->forget_pass_exptime>time())
	     { return 'yes'; }
	  }
	 else {return 'no'; }
  }
  function resetPassword($user_id){
  
     $this->db->set('password',md5($this->input->post('password')));
	 $this->db->set('forget_pass_code','');
	 $this->db->set('status','1');
	 $this->db->set('varification_code','');
	 $this->db->where('forget_pass_code',$this->input->post('code'));
	 $this->db->where('id',$user_id);
	 $query = $this->db->update('register');
	 return true;
  }
  
   
}

?>