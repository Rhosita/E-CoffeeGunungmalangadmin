<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pengambilan extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('data');
		$this->load->model('crud');
		$this->load->helper('string');
		$this->load->helper(array('form', 'url'));
		if($this->session->userdata('id')==null){
			redirect('user');
		}
	}
	public function index($i=null) {
		$data_p=$this->data->data_pengambilan();
		$data_u=$this->data->data_uang_user();
		$data=array(
			'data_p' => $data_p,
			'data_u' => $data_u,
			'title'=>'Data Pengambilan',
			'isi' =>'pengambilan'
			);
		$this->load->view('layout/wrapper',$data); 
	}
	
	function ambil(){
		$id = $this->input->post('user');
		$total = $this->input->post('total');
		
		$un = $this->data->data_as_array('uang','id',$id);
		foreach($un as $list){
			$uang = $list['uang'];
		}
		
		if($total>$uang)
		{
			$data_p=$this->data->data_pengambilan();
			$data_u=$this->data->data_uang_user();
			$data=array(
				'data_p' => $data_p,
				'data_u' => $data_u,
				'title'=>'Data Pengambilan',
				'isi' =>'pengambilan'
				);
			$this->load->view('layout/wrapper_error',$data); 
		}else{		
			$data = array(
						'id' => $id,
						'jml_ambil' => $total,
						'tgl' => $this->input->post('tgl')
						);
			
			$this->crud->save_data($data,'pengambilan');
			$uang_new = $uang-$total;
			$data_uang =  array(
							'uang' => $uang_new,
							'tgl' => $this->input->post('tgl')
							);
			$this->crud->update_data($id,'id',$data_uang,'uang');
			redirect('pengambilan');
		}
	}
	public function hapus($id){
	if($this->crud->delete_data($id, 'id_pengambilan', 'pengambilan')) echo json_encode(array("status" => TRUE));
	}
	
	function laporan(){
		$data=array(
			'title'=>'Data Pengambilan',
			'isi' =>'laporan',
			'cont' =>'pengambilan',
			);
		$this->load->view('layout/wrapper',$data); 
	}
	
	function cetakper(){
		$b = $this->input->post('bulan');
		$t = $this->input->post('tahun');
		$tb = $t.'-'.$b;
		$tabel = 'pengambilan';
		$data=array(
			'title'=>'Data Pengambilan',
			'data'=>$this->data->data_cetak_per($tabel,$tb)
			);
		$this->load->view('cetak',$data);
	}
	
	function cetak(){
		$tabel = 'pengambilan';
		$data=array(
			'title'=>'Data Pengambilan',
			'data'=>$this->data->data_cetak($tabel)
			);
		$this->load->view('cetak',$data);
	}
	
	function cetaktahun(){
		$tahun = $this->input->post('tahun_c');
		$tabel = 'pengambilan';
		$data=array(
			'title'=>'Data Pengambilan',
			'data'=>$this->data->data_cetak_tahun($tabel,$tahun)
			);
		$this->load->view('cetak',$data);
	}
}
?>