<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('User');

		$this->load->model('dentist_model');
		$this->load->model('admin_model');
		$this->load->model('patient_model');
	}

	function Sign_in() {
		$user = $this->input->post('user');
		$password = $this->input->post('password');
		$userObj = $this->User->getUser($user, $password);
		if ($userObj->status == 0) {
			print_r("AUTH ERROR");
			return;
		}

		switch ($userObj->userType) {
			case 0:
				$data = [
					"id" => $userObj->id,
					"name" => $userObj->name,
					"type" => "admin",
					"login" => TRUE];
				$this->session->set_userdata($data);
				$this->load->view('admin_menu_view');
				$this->load->view('inicio_view');
				break;
			case 1:
				$type = "dentist";
				print_r("aqui");
				break;
			default:
				$type = "user";
				break;
		}

}





		function get_out()
		{
			$this->session->sess_destroy();
			$this->load->view('welcome_message');
		    $this->load->view('inicio_view');

		}

}

	/* End of file login.php */
/* Location: ./application/controllers/login.php */
