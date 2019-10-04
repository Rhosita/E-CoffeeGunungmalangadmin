<?php
class Akun extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	public function cek_user($data) {
		$query = $this->db->get_where('user', $data);
		return $query;
	}
	function insert_data($ins_data){ 
		$data_user=array(
		'nama'=> $ins_data['nama'],
		'username'=> $ins_data['username'],
		'password'=>$ins_data['password'],
		'level'=>$ins_data['level']);
		return $this->db->insert('user', $data_user); 
	}
	function delete_data($id){
        $return = FALSE;
        $this->db->where('id', $id);
        if ($this->db->delete('user')){
            $return = TRUE;
        }
        return $return;
    }
	
	
	
	
	function profil($id){
		$query = $this->db->get_where('user', $id);
		return $query->result_array();
	}
	function update_data($id, $col, $data, $table){
        $return = FALSE;
        $this->db->where($col, $id);
        if ($this->db->update($table, $data)){
            $return = TRUE;
        }
        return $return;
    }
	
	function data_as_array($table, $col, $where){       
    	$this->db->where($col, $where);
		$query = $this->db->get($table);
		return $query->result_array();
	}
//------------------------
	function get_all($table){
		$query = $this->db->get($table);
		return $data=$query->result_array();
    }
	function data_as_array2($table, $col, $where){       
    	$this->db->where($col[1], $where[1]);
		$this->db->where($col[2], $where[2]);
		$query = $this->db->get($table);
		return $data=$query->result_array();
	}
	
//------------------------
	function data_as_num($table, $col, $where){       
    	$this->db->where($col, $where);
		$query = $this->db->get($table);
		return $data=$query->num_rows();
	}
	function data_as_num2($table, $col, $where){       
    	$this->db->where($col[1], $where[1]);
		$this->db->where($col[2], $where[2]);
		$query = $this->db->get($table);
		return $data=$query->num_rows();
	}
	function data_as_num3($table, $col, $where){       
    	$this->db->where($col[1], $where[1]);
		$this->db->where($col[2], $where[2]);
		$this->db->where($col[3], $where[3]);
		$query = $this->db->get($table);
		return $data=$query->num_rows();
	}
//------------------------
	public function like($param, $col, $table) {
		$this->db->select($param[3]);
		$this->db->like($col[2], $param[2]);
		$this->db->where($col[1], $param[1]);
		$query = $this->db->get($table);
		return $data=$query->result_array();
	}
}
?>