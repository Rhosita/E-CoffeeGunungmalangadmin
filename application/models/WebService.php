<?php
class WebService extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	public function login($col, $where, $table){	
		$this->db->where($col[1], $where[1]);
		$this->db->where($col[2], $where[2]);
		$query = $this->db->get($table);
		return $query->result();
    }
	public function data_list($pilih,$col, $where, $table){
		$this->db->select($pilih);
		$this->db->where($col, $where);
		$query = $this->db->get($table);
		return $data=$query->result_array();
	}
	public function data_list2($pilih,$col, $where, $table){
		$this->db->select($pilih);
		$this->db->like($col[1], $where[1]);
		$this->db->where($col[2], $where[2]);
		$query = $this->db->get($table);
		return $data=$query->result_array();
	}
}
?>