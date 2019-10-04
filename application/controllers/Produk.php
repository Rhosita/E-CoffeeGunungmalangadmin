<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Produk extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('data');
		$this->load->model('crud');
		$this->load->helper(array('form', 'url'));
		if($this->session->userdata('id')==null){
			redirect('user');
		}
	}
	public function index($i=null) {
		$data_p=$this->data->get_all('produk');
		$data=array(
			'data_p'=>$data_p,
			'title'=>'Data Produk',
			'isi' =>'produk'
			);
		$this->load->view('layout/wrapper',$data); 
	}
	function tambah() {
		$config['upload_path'] = './assets/uploads/images';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '20000';
		$config['max_width'] = '3000';
		$config['max_height'] = '3000';
		$this->load->library('upload', $config);
		if($this->input->post('id')==null){
			if($this->upload->do_upload('foto')){ 
				$file = $this->upload->file_name;
				$ins_data['nama_barang']=$this->input->post('nama');
				$ins_data['harga']=$this->input->post('harga');
				$ins_data['ket']=$this->input->post('keterangan');
				$ins_data['gambar']=$file;
				if($this->crud->save_data($ins_data, 'produk')){
					//echo json_encode(array("status" => TRUE));
					redirect('produk');
				}else{
					//echo json_encode(array("status" => FALSE));
				}
			}else{
				//echo json_encode(array("upload" => $this->upload->file_name));
			}
		}else{
			$up_data['id_barang']=$this->input->post('id');
			$up_data['nama_barang']=$this->input->post('nama');
			$up_data['harga']=$this->input->post('harga');
			$up_data['ket']=$this->input->post('keterangan');
			if($this->upload->do_upload('foto')){
				unlink('./assets/uploads/images/'.$this->input->post('gambar'));
				$file = $this->upload->file_name;
				$up_data['gambar']=$file;
			}
			if($this->crud->update_data($up_data['id_barang'],'id_barang',$up_data, 'produk')){
				//echo json_encode(array("status" => TRUE));
				redirect('produk');
			}
		}
	}
	
	public function edit($id){
		$data=$this->crud->data_as_row('produk', 'id_barang', $id);
		echo json_encode($data);
	}
	public function hapus($id){
		$data=$this->crud->data_as_row('produk', 'id_barang', $id);
		if(unlink('./assets/uploads/images/'.$data->gambar)){
			if($this->crud->delete_data($id, 'id_barang', 'produk')) echo json_encode(array("status" => TRUE));
		}
	}
	
	function laporan(){
		$data=array(
			'title'=>'Data Produk',
			'isi' =>'laporan_p',
			'cont' =>'produk',
			);
		$this->load->view('layout/wrapper',$data); 
	}

	function cetak(){
		$tabel = 'produk';
		$data=array(
			'title'=>'Data Produk',
			'data'=>$this->data->get_all($tabel)
			);
		$this->load->view('cetak_p',$data);
	}
	
}
?>
