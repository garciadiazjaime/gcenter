<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('user_agent');
		$this->load->model('reporte');
	}
	
	public function tco($token = '')
	{
		if( md5('tco') == $token){
			$data = $this->reporte->getServiceReporte();
		}else{
			echo "error";
		}
	}

	public function get_info()
	{	
		$data = $this->reporte->get_data_from(1);
		if($data){
			if($this->reporte->save_data(1, $data)){
				$this->reporte->save_img(1);
				echo "SD Report Registered: ".date('Y/m/d H:i:s');	
			} 
		}
		$data = $this->reporte->get_data_from(2);
		if($data){
			if($this->reporte->save_data(2, $data)){
				$this->reporte->save_img(2);
				echo "<br />Otay Report Registered: ".date('Y/m/d H:i:s');	
			} 
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */