<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function __construct()
	{
	    parent::__construct();
	  	if (!$this->session->userdata("login")) {
	  		redirect(base_url());
	  	}
			if (($this->session->userdata("login")) and ($this->session->userdata("type") != "admin") ) {
				$message = "Devuelvete ahora mismo pedazo de... <br>ok, me alteré";
	  		show_error($message, "403", $heading = 'Oups, parece que no tienes permisos para estar aquí...');
	  	}
	}

	public function index()
	{
		$this->load->view('admin_menu_view');
		$this->load->view('inicio_view');
		$this->load->view('footer.php');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
