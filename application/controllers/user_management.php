<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management extends CI_Controller {

	private $userType;

	public function __construct()
	{
		parent::__construct();
	  	if ((!$this->session->userdata("login")) and ($this->session->userdata("type") != "admin") ) {
	  		redirect(base_url());
	  	}
			$this->userType = $this->session->userdata("type");
			echo "<script>console.log( 'Debug Objects: " . $this->userType . "' );</script>";
			$this->load->model('User');
			$this->load->model('Patient');
			$this->load->model('Dentist');
			$this->load->model('Appointment');
	}

	function list_patients() {
		$data['patients'] = $this->Patient->list_patient();
		if ($data['patients'] == null) {
			$data['resul'] = "No se encontraron pacientes registrados";
		}
		$menuView = 'dentist_menu_view';
		if ($this->isUserAdmin()) {
			$menuView = 'admin_menu_view';
		}

		$this->load->view($menuView);
		$this->load->view('consult_patient_view', $data);
		$this->load->view('footer.php');
	}

	public function register_patient() {
		$this->load->view('admin_menu_view');
		$this->load->view('register_patient_view');
		$this->load->view('footer.php');
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

		$this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
		$this->form_validation->set_rules('name',
    'Name', 'required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('lastname',
    'Lastname', 'required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('id',
    'Id', 'required|min_length[6]|max_length[12]|numeric');
		$this->form_validation->set_rules('password',
    'Password', 'required|min_length[6]|max_length[12]|alpha_numeric');
		$this->form_validation->set_rules('phone',
    'Phone', 'required|min_length[3]|max_length[30]|numeric');
		$this->form_validation->set_rules('email',
    'Email', 'required|min_length[5]|max_length[30]|valid_email');

		if ($this->form_validation->run() == FALSE)
		{
			$data['resul'] = "Error de registro";
			$this->load->view('admin_menu_view');
			$this->load->view('register_patient_view', $data);
			$this->load->view('footer.php');
		}

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
		$this->load->view('footer.php');
	}



	function update($id){
		$data['patients'] = $this->Patient->getAllPatientInfo($id);
		$this->load->view('admin_menu_view');
		$this->load->view('update_patient_view', $data);
		$this->load->view('footer.php');
	}

	function update_patient($id){

		$name = $this->input->post("name");
		$lastname = $this->input->post("lastname");
		$brithdate = $this->input->post("date");
		$email = $this->input->post("email");
		$phone = $this->input->post("phone");

		$data = array(
  			"id" => $id,
  			"name" => $name,
  			"lastname"=>$lastname
			);
			$data1 = array(
  			"brithdate" => $brithdate,
  			"email" => $email,
  			"phone" => $phone
  			);

	  $this->Patient->update($data,$data1,$id);
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
		$this->load->view('footer.php');
	}



	function saveDentist(){
		$id = $this->input->post("id");
		$name = $this->input->post("name");
		$lastname = $this->input->post("lastname");
		$password = $this->input->post("password");
		$username = $this->input->post("username");

		$this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
		$this->form_validation->set_rules('name',
    'Name', 'required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('lastname',
    'Lastname', 'required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('id',
    'Id', 'required|min_length[6]|max_length[12]|numeric');
		$this->form_validation->set_rules('password',
    'Password', 'required|min_length[6]|max_length[12]|alpha_numeric');

		if ($this->form_validation->run() == FALSE)
		{
			$data['resul'] = "Error de registro";
			$this->load->view('admin_menu_view');
			$this->load->view('register_Dentist_view', $data);
			$this->load->view('footer.php');
		} else {

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
		$this->load->view('footer.php'); }
	}

	function list_dentist(){
		$data['dentists'] = $this->Dentist->list_dentist();
		if ($data['dentists'] == null) {
			$data['resul'] = "No se encontraron odontologos registrados";
		}
		$this->load->view('admin_menu_view');
		$this->load->view('consult_dentist_view', $data);
		$this->load->view('footer.php');
	}
	function update_dent($id){
		$data['dentists'] = $this->Dentist_model->dentist($id);
		$this->load->view('admin_menu_view');
		$this->load->view('update_dentist_view', $data);
		$this->load->view('footer.php');
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

	function registerAppointment() {
		$data['specialties'] = $this->Appointment->getSpecialties();
		$this->load->view('default_menu_view');
		$this->load->view('registerDateview', $data);
		$this->load->view('footer.php');
	}

	function isUserAdmin() {
		if ($this->userType == "admin") {
			return TRUE;
		}
		return FALSE;
	}
}


/* End of file user_management.php */
/* Location: ./application/controllers/user_management.php */
