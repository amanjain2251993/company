<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
	public function valid_login($data){
		$this->db->select('email,password,status');
		$this->db->where('status',1);
		$this->db->where('email',$data['email']);
		$this->db->where('password',$data['password']);
		$query = $this->db->get('register');		
		if($query->num_rows() > 0){
			$this->db->select('*');	
			$this->db->where('register.status != 0');
			$this->db->where('email',$data['email']);
			$this->db->where('password',$data['password']);
			$query = $this->db->get('register');
			$row = $query->row_array();		
			return $row;
		}else{
			return 0;
		}
	}

}

?>