<?php
class Data extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
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
	function data_as_array($table, $col, $where){       
    	$this->db->where($col, $where);
		$query = $this->db->get($table);
		return $data=$query->result_array();
	}
//////////////////////////////////////////////////////////////////////////////////////
	function get_all_num($table){
			$query = $this->db->get($table);
			return $data=$query->num_rows();
		}
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
/////////////////////////////////////////////////////////////////////////////////////////
	public function like($param, $col, $table) {
		$this->db->select($param[3]);
		$this->db->like($col[2], $param[2]);
		$this->db->where($col[0], $param[0]);
		$this->db->where($col[1], $param[1]);
		$query = $this->db->get($table);
		return $data=$query->result_array();
	}
/////////////////////////////////////////////////////////////////////////////////////////
	function select($table, $select1){
    	$this->db->select($select1);
		$query = $this->db->get($table);
		return $query->result_array();
    }
	function select1($table, $col, $where, $select1){
    	$this->db->select($select1);
    	$this->db->where($col, $where);
		$query = $this->db->get($table);
		return $query->result_array();
    }
	
	function data_user(){
		$q=$this->db->query('select*from user where level="2"');
		return $q->result_array();
	}
	
	function data_pengambilan(){
		$q=$this->db->query('select*from user,pengambilan where user.id=pengambilan.id');
		return $q->result_array();
	}
	
	function data_uang_user(){
		$q=$this->db->query('select*from user,uang where user.id=uang.id');
		return $q->result_array();
	}
	
	function data_cetak_per($tabel,$tb){
		$q=$this->db->query('select*from user,'.$tabel.' where user.id='.$tabel.'.id and '.$tabel.'.tgl like "'.$tb.'%"');
		return $q->result_array();
	}
	
	function data_cetak($tabel){
		$q=$this->db->query('select*from user,'.$tabel.' where user.id='.$tabel.'.id order by '.$tabel.'.tgl ASC');
		return $q->result_array();
	}
	
	function data_cetak_t_per($tabel,$tb){
		$q=$this->db->query('select*from user,produk,'.$tabel.' where user.id='.$tabel.'.id and produk.id_barang='.$tabel.'.id and '.$tabel.'.tgl like "'.$tb.'%"');
		return $q->result_array();
	}
	
	function data_cetak_t($tabel){
		$q=$this->db->query('select*from user,produk,'.$tabel.' where user.id='.$tabel.'.id and produk.id_barang='.$tabel.'.id_barang order by '.$tabel.'.tgl ASC');
		return $q->result_array();
	}
	
	function data_cetak_tahun($tabel,$tahun){
		$q=$this->db->query('select*from user,'.$tabel.' where user.id='.$tabel.'.id and '.$tabel.'.tgl like "'.$tahun.'%" order by '.$tabel.'.tgl ASC');
		return $q->result_array();
	}
	
	function data_cetak_tahun_t($tabel,$tahun){
		$q=$this->db->query('select*from user,produk,'.$tabel.' where user.id='.$tabel.'.id and produk.id_barang='.$tabel.'.id_barang and '.$tabel.'.tgl like "'.$tahun.'%" order by '.$tabel.'.tgl ASC');
		return $q->result_array();
	}
}
?>