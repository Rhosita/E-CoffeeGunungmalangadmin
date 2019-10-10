<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('data');
		if($this->session->userdata('id')==null){
			redirect('user');
		}
	}
	public function index($i=null) {
		$jumlah[0]=$this->data->get_all_num('transaksi');
		$jumlah[1]=$this->data->get_all_num('user');
		$jumlah[2]=$this->data->get_all_num('produk');
		$data=array(
			'jumlah'=>$jumlah,
			'title'=>'E-Coffee Gunungmalang',
			'isi' =>'home'
			);
		$this->load->view('layout/wrapper',$data); 
	}
	public function users($i=null) {
		$data_p=$this->data->data_as_array('user','level',3);
		$data_admin=$this->data->data_as_array('user','level',1);
		$data_user=$this->data->data_as_array('user','level',2);
		$data=array(
			'data_p'=>$data_p,
			'data_admin'=>$data_admin,
			'data_user'=>$data_user,
			'title'=>'Data User',
			'isi' =>'users'
			);
		$this->load->view('layout/wrapper',$data); 
	}
	public function transaksi($i=null) {
		$data=array(
			'title'=>'Data Transaksi',
			'isi' =>'transaksi'
			);
		$this->load->view('layout/wrapper',$data); 
	}
	public function laporan($i=null) {
		$data=array(
			'title'=>'Laporan',
			'isi' =>'coba'
			);
		$this->load->view('layout/wrapper',$data); 
	}
	
}
?>