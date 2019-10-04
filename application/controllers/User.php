<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('akun');
		$this->load->model('data');
		$this->load->model('crud');
	}
	public function index() {
		$this->load->view('login'); 
	}
	public function login() {
		$data = array(
			'username' => $this->input->post('username', TRUE),
			//'password' => md5($this->input->post('password', TRUE))
			'password' => $this->input->post('password', TRUE)
			);
		$hasil = $this->akun->cek_user($data);
			if ($hasil->num_rows() == 1) {
				$user = $this->input->post('username');
				$data_cek = $this->data->data_as_array('user','username',$user);
				foreach($data_cek as $list){
					$level = $list['level'];
				}
				if($level == '2'){
					redirect();
				}else{
					foreach ($hasil->result() as $sess){
						$sess_data = array(
							'nama'=>$sess->nama,
							'id'=>$sess->id,
							'username'=>$sess->username,
							'level'=>$sess->level);
						$this->session->set_userdata($sess_data);
					}
					redirect('home');
				}
			}else {
				$this->session->set_flashdata('gagal','Username tidak terdaftar atau Password tidak cocok');
				redirect();
			}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect();
	}
	public function hapus($id){
		if($this->akun->delete_data($id)) echo json_encode(array("status" => TRUE));
	}
	function daftar(){
		$cek = array('username' => $this->input->post('username'));
		$hasil = $this->akun->cek_user($cek);
		if ($hasil->num_rows() == 0) {
			$data =  array(
							'nama' => $this->input->post('nama'),
							'alamat' => $this->input->post('alamat'),
							'no_tlp' => $this->input->post('notel'),
							'username' => $this->input->post('username'),
							'password' => $this->input->post('password'),
							'level' => $this->input->post('level')
					);
			if($this->crud->save_data($data,'user')){
				echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
		}else{
			$id = $this->input->post('id');
			$data= array(
							'nama' => $this->input->post('nama'),
							'alamat' => $this->input->post('alamat'),
							'no_tlp' => $this->input->post('notel'),
							'username' => $this->input->post('username'),
							'password' => $this->input->post('password')
						);
			if($this->crud->update_data($id,'id',$data,'user')){
				echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
		}
			
	}
	public function profil(){
		if ($this->session->userdata('id_akun')==null){
			redirect(); 
		}else{
		$id['id_akun']=$this->session->userdata('id_akun'); 
		$isi = $this->akun->profil($id);
		$data_user = $this->akun->data_as_array('akun', 'id_parent', $id['id_akun']);
		$data=array('title'=>'Profil Saya – Management Data Core',
		'data' => $isi,
		'isi' =>'profil',
		'data_user' =>$data_user
		);
		$this->load->view('layout_akun/wrapper',$data);
		}
	}
	function edit(){
		$cek = array('username' => $this->input->post('username'));
		$hasil = $this->akun->cek_user($cek);
		if ($hasil->num_rows() == 0) {
			$data = array(
				'id_akun' => $this->session->userdata('id_akun'),
				'nama_akun' => $this->input->post('nama'),
				'username'=> $this->input->post('username'),
				'quote'=> $this->input->post('quote')
			);
			if($this->akun->update_data($data['id_akun'], 'id_akun', $data, 'akun')){
				echo json_encode(array("status" => TRUE));
				$this->session->set_userdata($data);
			}
		}
	}
	public function ubah($id){
		$data=$this->crud->data_as_row('user', 'id', $id);
		echo json_encode($data);
	}
	function edit_pass(){
		$data = array(			
			'password' => md5($this->input->post('password_l')),
			'username'=> $this->session->userdata('username')
		);
		$hasil = $this->akun->cek_user($data);
		if ($hasil->num_rows() == 1) {
			$data['id_akun']= $this->session->userdata('id_akun');
			$data['password']= md5($this->input->post('password_b'));
			if($this->akun->update_data($data['id_akun'], 'id_akun', $data, 'akun')){
				echo json_encode(array("status" => TRUE));
			}
		}
	}
	
	public function anggota(){
		$id_parent=$this->session->userdata('id_akun');
		$id_parent=1;
		$isi = $this->akun->data_as_array('akun', 'id_parent', $id_parent);
		echo json_encode($isi);
	}
	
	function laporan(){
		$data=array(
			'title'=>'Data User',
			'isi' =>'laporan_p',
			'cont' =>'user',
			);
		$this->load->view('layout/wrapper',$data); 
	}

	function cetak(){
		$tabel = 'user';
		$data=array(
			'title'=>'Data user',
			'data'=>$this->data->get_all($tabel)
			);
		$this->load->view('cetak_u',$data);
	}
}
?>