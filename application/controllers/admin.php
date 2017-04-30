<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function __construct()
	{
	    parent::__construct();
	 
	  	if ((!$this->session->userdata("login")) and ($this->session->userdata("type") != "admin") ) {
	  		redirect(base_url());
	  	}

	}

	public function index()
	{

		$this->load->view('admin_menu_view');
		$this->load->view('inicio_view');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */