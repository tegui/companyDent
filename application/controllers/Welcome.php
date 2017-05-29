<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
			if (($this->session->userdata("login"))) {
				$type = $this->session->userdata("type");
				switch ($type) {
					case 'admin':
						redirect(base_url('admin'));
						break;
					case 'dentist':
						redirect(base_url('dentist'));
						break;
					default:
						redirect(base_url('user'));
						break;
				}
	  	}
	}

	public function index()
	{
		$this->load->view('welcome_message');
		$this->load->view('inicio_view');
		$this->load->view('footer.php');
	}
	public function enviar_datos(){

	}
}
