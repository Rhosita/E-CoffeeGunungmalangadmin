<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class WebServices extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('WebService');
	}
	public function login(){
		$where[1] = $this->input->get('username');
		$where[2] = $this->input->get('password');
		$col[1]="username";
		$col[2]="password";
		$user=$this->WebService->login($col, $where, 'user');
        $response = array();
        $data = array();
        //lopping data dari database
		if($user==TRUE){
        foreach ($user as $hasil)
        {
            $data[] = array(
                "id"   =>  $hasil->id,
                "nama" =>  $hasil->nama
            );
        }
			$response['user'] = $data;
			$response['success'] = "1";
      	}else{
			$response["success"] = "0";
			$response["message"] = "Tidak ada data";
		}
		header('Content-Type: application/json');
        echo json_encode($response,TRUE);
	}
	public function get_list(){
		$where = $_GET["tipe"];
		$pilih= $_GET["pilih"];
		$col="tipe";
		$detail=$this->WebService->data_list($pilih, $col, $where, 'od');
		echo json_encode($detail);
	}
	public function get_listByOdc(){
		$where[1] = $_GET["odp"];
		$where[2] ="ODP";		
		$col[1]="nama";
		$col[2]="tipe";
		$detail=$this->WebService->data_list2('id,nama,lat,lon', $col, $where, 'od');
		echo json_encode($detail);
	}
	public function get_DetailODP($id){
		//$where = $_GET["id"];
		$where=$id;
		$col="id";
		$pilih="id,nama,lat,lon";
		$detail=$this->WebService->data_list($pilih, $col, $where, 'od');
		foreach ($detail as $list){
			$where=$list['id'];
			$col="id_uplink";
			$pilih="id_spl,nama,inlet";
			$spliter=$this->WebService->data_list($pilih, $col, $where, 'spliter');
			foreach ($spliter as $list_port){
				$where=$list_port['id_spl'];
				$col="id_spl";
				$pilih="id_port,nama,outlet";
				$port[$list_port['id_spl']]=$this->WebService->data_list($pilih, $col, $where, 'spliter_port');
			}
		}
		$data=array(0=>$detail,1=>$spliter,2=>$port);
		echo json_encode($data);
	}
	
}
?>