<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citas_controller extends CI_Controller {

	function __construct(){
		parent :: __construct();
	}

	public function index()
	{
		$this->load->model('cita');
		$data['citas'] = $this->cita->get_Citas();
		//print_r($data);
		

		if ($data['citas'] == null) {

			$data['resul'] = "No se encontraron citas asignadas";

		}
		$this->load->view('welcome_message');
		$this->load->view('consultar_Cita_view', $data);
		
		
		
	}

}

/* End of file citas_controller.php */
/* Location: ./application/controllers/citas_controller.php */