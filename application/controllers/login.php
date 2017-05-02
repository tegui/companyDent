<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('dentist_model');
		$this->load->model('admin_model');
		$this->load->model('patient_model');
	}

	function Sign_in() {
		$user = $this->input->post('user');
		$password = $this->input->post('password');
		$type_user = $this->input->post('typeUser');

	

			if ($type_user == 0) {
			# code...
				$type = "user";
				$resp = $this->patient_model->login($user, $password);

			}
			else if ($type_user == 1) {
			# code...

				$type = "dentist";
				$resp = $this->dentist_model->login($user, $password);

			}

			else if ($type_user == 2) {
			# code...
				$type = "admin";
				$resp = $this->admin_model->login($user, $password);

			}

			if($resp){
				$data = [
				"id" => $resp->id,
				"name" => $resp->name,
				"type" => $type,
				"login" => TRUE
				];

				$this->session->set_userdata($data);
				
			
				$this->load->view('admin_menu_view');
		        $this->load->view('inicio_view');

			}
			else{

				echo "Error";
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