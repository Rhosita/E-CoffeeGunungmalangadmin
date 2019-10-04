<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transaksi extends CI_Controller {
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
		$data_p=$this->data->get_all('transaksi');
		$data_u=$this->data->data_user();
		$data_i=$this->data->get_all('produk');
		$data=array(
			'data_p'=>$data_p,
			'data_u'=>$data_u,
			'data_i'=>$data_i,
			'title'=>'Data Transaksi',
			'isi' =>'transaksi'
			);
		$this->load->view('layout/wrapper',$data); 
	}	
	function tambah() {
		$id_barang = $this->input->post('barang');
		$id = $this->input->post('user');
		$total = $this->input->post('total');
		$b = $this->data->data_as_array('produk','id_barang',$id_barang);
		foreach($b as $list){
			$nama_barang = $list['nama_barang'];
			$harga = $list['harga'];
		}
		$u = $this->data->data_as_array('user','id',$id);
		foreach($u as $list){
			$nama = $list['nama'];
		}
		$id_trs = random_string('alnum', 12);
		$ttl_harga=$total*$harga;
		$data = array(
					'id_barang' => $id_barang,
					'nama_barang' => $nama_barang,
					'id' => $id,
					'nama' => $nama,
					'tgl' => $this->input->post('tgl'),
					'ttl_produk' => $total,
					'ttl_harga' => $ttl_harga
					);
		$this->crud->save_data($data,'transaksi');
		
		$un = $this->data->data_as_array('uang','id',$id);
		foreach($un as $list){
			$uang = $list['uang'];
		}
		$uang_new = $uang+$ttl_harga;
		$data_uang = array(
					'id' => $id,
					'uang' => $uang_new
					);
					
		if($this->data->data_as_array('uang','id',$id))
			{
				$this->crud->update_data($id,'id',$data_uang,'uang');
			}else{
				$this->crud->save_data($data_uang,'uang');
		}			
		redirect('transaksi');
	}
	
	public function edit($id){
		$data=$this->crud->data_as_row('produk', 'id_barang', $id);
		echo json_encode($data);
	}
	
	public function hapus($id){
	if($this->crud->delete_data($id, 'id_trs', 'transaksi')) echo json_encode(array("status" => TRUE));
	}
	
	function laporan(){
		$data=array(
			'title'=>'Data Transaksi',
			'isi' =>'laporan',
			'cont' =>'transaksi',
			);
		$this->load->view('layout/wrapper',$data); 
	}
	
	function cetakper(){
		$b = $this->input->post('bulan');
		$t = $this->input->post('tahun');
		$tb = $t.'-'.$b;
		$tabel = 'transaksi';
		$data=array(
			'title'=>'Data Transaksi',
			'data'=>$this->data->data_cetak_t_per($tabel,$tb)
			);
		$this->load->view('cetak_transaksi',$data);
	}
	
	function cetak(){
		$tabel = 'transaksi';
		$data=array(
			'title'=>'Data Transaksi',
			'data'=>$this->data->data_cetak_t($tabel)
			);
		$this->load->view('cetak_transaksi',$data);
	}
	
	function cetaktahun(){
		$tahun = $this->input->post('tahun_c');
		$tabel = 'transaksi';
		$data=array(
			'title'=>'Data Transaksi',
			'data'=>$this->data->data_cetak_tahun_t($tabel,$tahun)
			);
		$this->load->view('cetak_transaksi',$data);
	}
	
}
?>