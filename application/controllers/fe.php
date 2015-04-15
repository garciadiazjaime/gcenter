<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe extends CI_Controller {
	var $menu 		= '';
	var $location 	= '';
	var $title 		= 'GaritaCenter - Reporte de garitas para San Ysidro y Otay | Tijuana';
	var $keywords 	= 'reporte garitas, garitas, garitas tijuana, garitacenter, garita san ysidro, garita otay, linea san ysidro';
	var $description= 'GaritaCenter - Reporte de garitas para San Ysidro y Otay';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('user_agent', 'miscellaneous'));
		$this->load->model('reporte');
	}

	public function index()
	{					
		$data['san_ysidro'] = $this->reporte->get_reporte(1);
		$data['otay'] = $this->reporte->get_reporte(2);
		$data['last_update'] = $this->reporte->last_update(1);

		$data['ads'] = $this->agent->is_mobile() ? $this->reporte->get_ads(2): $this->reporte->get_ads(1);

		$this->menu = $this->miscellaneous->printMENU('inicio');
		$content = $this->load->view('fe/home', array('data'=>$data), true);
		$this->load->view('fe/layout/main', array('content' => $content, 'menu'=>$this->menu, 'location'=>'inicio', 'title'=>$this->title, 'keywords'=>$this->keywords, 'description'=>$this->description  ) );
	}
	
	public function inicio()
	{					
		$this->menu = $this->miscellaneous->printMENU('inicio');
		$content = $this->load->view('fe/home', '', true);
		$this->load->view('fe/layout/main', array('content' => $content, 'menu'=>$this->menu, 'location'=>'inicio', 'title'=>$this->title, 'keywords'=>$this->keywords, 'description'=>$this->description  ) );
	}
	
	public function reporte()
	{			
		$this->menu = $this->miscellaneous->printMENU('reporte-garitas');
		$content = $this->load->view('fe/home', '', true);
		$this->load->view('fe/layout/main', array('content' => $content, 'menu'=>$this->menu, 'location'=>'reporte', 'title'=>$this->title, 'keywords'=>$this->keywords, 'description'=>$this->description  ) );
	}

	public function nosotros()
	{			
		$this->menu = $this->miscellaneous->printMENU('quienes-somos');
		$content = $this->load->view('fe/acerca', '', true);
		$this->load->view('fe/layout/main', array('content' => $content, 'menu'=>$this->menu, 'location'=>'nosotros', 'title'=>$this->title, 'keywords'=>$this->keywords, 'description'=>$this->description ) );
	}

	public function publicidad()
	{			
		$this->menu = $this->miscellaneous->printMENU('anunciate');
		$content = $this->load->view('fe/publicidad', '', true);
		$this->load->view('fe/layout/main', array('content' => $content, 'menu'=>$this->menu, 'location'=>'publicidad','title'=>$this->title, 'keywords'=>$this->keywords, 'description'=>$this->description  ) );
	}

	public function contacto()
	{		
		$this->menu = $this->miscellaneous->printMENU('contactanos');
		$content = $this->load->view('fe/contacto', '', true);
		$this->load->view('fe/layout/main', array('content' => $content, 'menu'=>$this->menu, 'location'=>'contacto', 'title'=>$this->title, 'keywords'=>$this->keywords, 'description'=>$this->description ) );
	}

	public function update_click()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : '';
		if($id){ // && strpos($_SERVER['HTTP_REFERER'], 'mintitmedia') != false){
			$this->reporte->update_click($id);
			echo 'true';
			return;
		}
		echo 'false';
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

/* End of file fe.php */
/* Location: ./application/controllers/fe.php */
