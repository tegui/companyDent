<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {


	public function __construct()
	{
	    parent::__construct();
      
	  	if ((!$this->session->userdata("login")) and ($this->session->userdata("type") != "user") ) {
	  		redirect(base_url());
	  	}
	}

	public function index()
	{
		$this->load->view('default_menu_view');
		$this->load->view('inicio_view');
		$this->load->view('footer.php');
	}

}
