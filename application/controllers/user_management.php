<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management extends CI_Controller {

	public function __construct()
	{
		parent::__construct();


	  	if ((!$this->session->userdata("login")) and ($this->session->userdata("type") != "admin") ) {
	  		redirect(base_url());
	  	}
	
		$this->load->model('Patient_model');
	}

	public function register_patient()
	{
		
		$this->load->view('admin_menu_view');
		$this->load->view('register_patient_view');
	}



	function save(){


		$id = $this->input->post("id");
		$name = $this->input->post("name");
		$brithdate = $this->input->post("date");
		$email = $this->input->post("email");
		$phone = $this->input->post("phone");			
		$password = $this->input->post("password");


		$data = array(
			"id" => $id,
			"name" => $name,
			"brithdate" => $brithdate,
			"email" => $email,
			"phone" => $phone,				
			"password" => $password
			);


		if($this->Patient_model->save($data) == true)
			echo "Registro Guardado";
		else
			echo "No se pudo guardar los datos";
		


	}

	function list_patients(){

		$data['patients'] = $this->Patient_model->list_patient();
		

		if ($data['patients'] == null) {

			$data['resul'] = "No se encontraron pacientes registrados";

		}
		$this->load->view('admin_menu_view');
		$this->load->view('consult_patient_view', $data);
		

	}
	function update($id){
		$data['patients'] = $this->Patient_model->patient($id);
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

	    $this->Patient_model->update($data,$id);
		redirect(base_url('user_management/list_patients'));
		
	}


	function delete($id){

		if($this->Patient_model->delete($id)){
			$data['resul'] = "Registro Eliminado";
		}
		else{
			$data['resul'] = "No se pudo eliminar los datos";
		}

         redirect(base_url('user_management/list_patients'));
		
	}

	

}




/* End of file user_management.php */
/* Location: ./application/controllers/user_management.php */