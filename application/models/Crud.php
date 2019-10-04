<?php
class Crud extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
////////////////////////////////////////////////////////////////////////////
	function save_data($ins_data, $table){
        $return = FALSE;
        if ($this->db->insert($table, $ins_data)){
            $return = TRUE;
        }
        return $return;
    }
    function save_data_id($ins_data, $table){
        $tamba[0]=$this->db->insert($table, $ins_data);
		$tamba[1]=$this->db->insert_id();
		return $tamba;
    }
/////////////////////////////////////////////////////////////////////////////
 	function update_data($id, $col, $data, $table){
        $return = FALSE;
        $this->db->where($col, $id);
        if ($this->db->update($table, $data)){
            $return = TRUE;
        }
        return $return;
    }
///////////////////////////////////////////////////////////////////////////////
 	function delete_data($id, $col, $table){
        $return = FALSE;
        $this->db->where($col, $id);
        if ($this->db->delete($table)){
            $return = TRUE;
        }
        return $return;
    }
	function delete_data1($id, $col, $table){
        $return = FALSE;
        $this->db->where($col[1], $id[1]);
		$this->db->where($col[2], $id[2]);
        if ($this->db->delete($table)){
            $return = TRUE;
        }
        return $return;
    }
///////////////////////////////////////////////////////////////////////////////
	function data_as_row($table, $col, $where){
		$this->db->where($col, $where);
		$query = $this->db->get($table);
		return $data=$query->row();
    }
	function data_as_row2($table, $col, $where){
		$this->db->where($col[1], $where[1]);
		$this->db->where($col[2], $where[2]);
		$query = $this->db->get($table);
		return $data=$query->row();
    }
	function select1($table, $col, $where, $select1){
    	$this->db->select($select1);
    	$this->db->where($col, $where);
		$query = $this->db->get($table);
		return $query->result_array();
    }
	
	function save_where($ins_data, $table, $col, $id){
        $return = FALSE;
        $this->db->where($col, $id);
        if ($this->db->insert($table, $ins_data)){
            $return = TRUE;
        }
        return $return;
	}
	
}
?>