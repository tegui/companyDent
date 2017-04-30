<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	 
	  	if (($this->session->userdata("type") == "user") ) {
	  		redirect(base_url());
	  	}


	}

	public function register_patient()
	{
		
		$this->load->view('admin_menu_view');
		$this->load->view('register_patient_view');
	}

	}


/* End of file user_management.php */
/* Location: ./application/controllers/user_management.php */