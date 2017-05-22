<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	  	if ((!$this->session->userdata("login")) and ($this->session->userdata("type") != "admin") ) {
	  		redirect(base_url());
	  	}
			$this->load->model('User');
			$this->load->model('Patient');
			$this->load->model('Dentist');
	}

	function list_patients() {
		$data['patients'] = $this->Patient->list_patient();
		if ($data['patients'] == null) {
			$data['resul'] = "No se encontraron pacientes registrados";
		}
		$this->load->view('admin_menu_view');
		$this->load->view('consult_patient_view', $data);
	}

	public function register_patient() {
		$this->load->view('admin_menu_view');
		$this->load->view('register_patient_view');
	}

	function savePatient() {
		$id = $this->input->post("id");
		$name = $this->input->post("name");
		$lastname = $this->input->post("lastname");
		$birthdate = $this->input->post("date");
		$email = $this->input->post("email");
		$phone = $this->input->post("phone");
		$password = $this->input->post("password");
		$username = $this->input->post("username");

		$first_data = array(
			"id" => $id,
			"username" => $username,
			"name" => $name,
			"lastname" => $lastname,
			"password" => $password,
			"user_type" => 2
		);

		if ($this->User->saveUser($first_data)) {
			$final_data = array(
				"user_id" => $id,
				"birthdate" => $birthdate,
				"email" => $email,
				"phone" => $phone
			);
			if ($this->Patient->save($final_data)) {
				$data['resul'] = "Registro Guardado";
			} else {
				$data['resul'] = "Error de registro";
			}
		}
		$this->load->view('admin_menu_view');
		$this->load->view('register_patient_view', $data);
	}



	function update($id){
		$data['patients'] = $this->Patient->patient($id);
		$this->load->view('admin_menu_view');
		$this->load->view('update_patient_view', $data);



	}

	function update_patient($id){

		$name = $this->input->post("name");
		$brithdate = $this->input->post("date");
		$email = $this->input->post("email");
		$phone = $this->input->post("phone");

		$data = array(
			"id" => $id,
			"name" => $name,
			"brithdate" => $brithdate,
			"email" => $email,
			"phone" => $phone
			);

	    $this->Patient->update($data,$id);
		redirect(base_url('user_management/list_patients'));

	}


	function delete($id){

		if($this->Patient->delete($id)){
			$data['resul'] = "Registro Eliminado";
		}
		else{
			$data['resul'] = "No se pudo eliminar los datos";
		}

         redirect(base_url('user_management/list_patients'));

	}


	public function register_dentist()
	{
		$this->load->view('admin_menu_view');
		$this->load->view('register_dentist_view');
	}



	function saveDentist(){
		$id = $this->input->post("id");
		$name = $this->input->post("name");
		$lastname = $this->input->post("lastname");
		$password = $this->input->post("password");
		$username = $this->input->post("username");
		$specialtyId = $this->input->post("specialty");
		$specialty = "Odontología general";
		switch ($specialtyId) {
			case 0:
				$specialty = "Endodoncia";
				break;
			case 1:
				$specialty = "Ortodoncia";
				break;
			case 2:
				$specialty = "Cirugía y traumatología";
				break;
			case 3:
				$specialty = "Periodoncia";
				break;
			default:
				break;
		}

		$first_data = array(
			"id" => $id,
			"username" => $username,
			"name" => $name,
			"lastname" => $lastname,
			"password" => $password,
			"user_type" => 1
		);

		if ($this->User->saveUser($first_data)) {
			$final_data = array(
				"user_id" => $id,
				"specialty" => $specialty
			);
			if ($this->Dentist->saveDentist($final_data)) {
				$data['resul'] = "Registro Guardado";
			} else {
				$data['resul'] = "Error de registro";
			}
		}
		$this->load->view('admin_menu_view');
		$this->load->view('register_Dentist_view', $data);
	}

	function list_dentist(){
		$data['dentists'] = $this->Dentist->list_dentist();
		if ($data['dentists'] == null) {
			$data['resul'] = "No se encontraron odontologos registrados";
		}
		$this->load->view('admin_menu_view');
		$this->load->view('consult_dentist_view', $data);
	}
	function update_dent($id){
		$data['dentists'] = $this->Dentist_model->dentist($id);
		$this->load->view('admin_menu_view');
		$this->load->view('update_dentist_view', $data);



	}

	function update_dentist($id){

		$name = $this->input->post("name");
		$lastname = $this->input->post("lastname");
		$specialty = $this->input->post("specialty");


		$data = array(
			"id" => $id,
			"name" => $name,
			"lastname" => $lastname,
			"specialty" => $specialty,
			);

	    $this->Dentist_model->update($data,$id);
		redirect(base_url('user_management/list_dentist'));

	}


	function delete_dentist($id){

		if($this->Dentist_model->delete($id)){
			$data['resul'] = "Registro Eliminado";
		}
		else{
			$data['resul'] = "No se pudo eliminar los datos";
		}

         redirect(base_url('user_management/list__dentist'));

	}



}




/* End of file user_management.php */
/* Location: ./application/controllers/user_management.php */
