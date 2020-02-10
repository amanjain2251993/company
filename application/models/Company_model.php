<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
	
	public function add($data){
		$this->db->insert('company',$data);
		return $this->db->insert_id();
		
	}
	public function update($data){
		$this->db->where('user_id',$this->user_id);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('company',$data);
		if($this->db->affected_rows() > 0 ){
			return true;
		}else{
			return false;
		}
	}
	public function get(){
		$this->db->select('*');
		$this->db->where('user_id',$this->user_id);
		if(!empty($this->input->get('search_key'))){
			$this->db->where('title',$this->input->get('search_key'));
		}
		$this->set_limit();	
		$query = $this->db->get('company');
		$output['data'] =  $query->result_array();
		
		if(!empty($this->input->get('search_key'))){
			$this->db->where('title',$this->input->get('search_key'));
		}
		
		$this->db->where('user_id',$this->user_id);
		$output['total_items'] = $this->db->count_all_results('company');
		return $output;
		
	}
	public function set_limit(){
		$items_per_page = isset($_REQUEST['items_per_page']) ? $_REQUEST['items_per_page'] : 10;
		$current_page = isset($_REQUEST['current_page']) ? $_REQUEST['current_page'] : 1;
		if(isset($_REQUEST['current_page']) || isset($_REQUEST['items_per_page'])){
			$this->db->limit($items_per_page, $items_per_page * ($current_page-1));
		}
		$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'status';
		$order_type = isset($_GET['order_type']) ? $_GET['order_type'] : 'DESC';
		$this->db->order_by($order_by, $order_type);
	}
	public function delete(){
		$this->db->where('user_id',$this->user_id);
		$id = explode(',',$this->input->post('id'));
		$this->db->where_in('id',$id);
		$this->db->delete('company');
		if($this->db->affected_rows() > 0 ){
			return true;
		}else{
			return false;
		}
	}
	
	

}

?>