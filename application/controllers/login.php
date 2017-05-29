<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Dentist');
		$this->load->model('admin_model');
		$this->load->model('Patient');
	}

	function signIn() {
		$user = $this->input->post('user');
		$password = $this->input->post('password');
		$userObj = $this->User->getUser($user, $password);
		if ($userObj->status == 0) {
			print_r("AUTH ERROR");
			return;
		}
		$type = "";
		$userMenu = "";
		switch ($userObj->userType) {
			case 0:
				$type = "admin";
				$userMenu = 'admin_menu_view';
				break;
			case 1:
				$type = "dentist";
				$userMenu = 'dentist_menu_view';
				break;
			default:
				$type = "user";
				$userMenu = 'default_menu_view';
				break;
		}
		$data = [
			"id" => $userObj->id,
			"name" => $userObj->name,
			"type" => $type,
			"login" => TRUE];
		$this->session->set_userdata($data);
		$this->load->view($userMenu);
		$this->load->view('inicio_view');
		$this->load->view('footer.php');
}



function get_out() {
		$this->session->sess_destroy();
		$this->load->view('welcome_message');
		$this->load->view('inicio_view');
		$this->load->view('footer.php');
	}

}

	/* End of file login.php */
/* Location: ./application/controllers/login.php */
