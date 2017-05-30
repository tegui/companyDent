<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {


	public function __construct()
	{
	    parent::__construct();
      if (!$this->session->userdata("login")) {
	  		redirect(base_url());
	  	}
			if (($this->session->userdata("login")) and ($this->session->userdata("type") != "user") ) {
				$message = "Devuelvete ahora mismo pedazo de... <br>ok, me alteré";
	  		show_error($message, "403", $heading = 'Oups, parece que no tienes permisos para estar aquí...');
	  	}
			$this->load->model('Patient');
			$this->load->model('Appointment');
	}

	public function index()
	{
		$this->load->view('default_menu_view');
		$this->load->view('inicio_view');
		$this->load->view('footer.php');
	}

	public function listAppointments() {
		$currentId = $this->session->userdata("id");
		$data['appointments'] = $this->Appointment->getAppointmentByPatientId($currentId);
		$cont = count($data['appointments']);
    if ($cont < 1) {
      $data['resul'] = "Usted no tiene citas asignadas";
    }
		$this->load->view('default_menu_view');
		$this->load->view('consult_user_appointment', $data);
		$this->load->view('footer.php');
	}

	function registerAppointment() {
		$data['specialties'] = $this->Appointment->getSpecialties();
		$this->load->view('default_menu_view');
		$this->load->view('registerAppointmentview', $data);
		$this->load->view('footer.php');
	}

	public function dentistAvailability() {
    $esp = $this->input->post('especialidad');
		$espp = $esp + 1;
		$this->db->select('name');
		$this->db->from('specialty');
		$this->db->where('id',$espp);
		$espOne = $this->db->get();
		$especialtyName = $espOne->result_array();
		$especialtyNameTwo = "";
		foreach ($especialtyName as $key) {
			$especialtyNameTwo = $key['name'];
		}

		$this->load->model('Dentist');
    $data_esp = $this->Dentist->getWithSpecificSpecialty($especialtyNameTwo);
    $data['disponibles'] = $data_esp; //array();

		$available = array();
    foreach ($data_esp as $odontologo) {
      $userId = $odontologo->user_id;
      $id = $odontologo->id;
			$available[$id] = $this->Dentist->getDentistTime($id);
    }

		$data['available'] = $available;
    $this->load->vars($data);

		$data['specialties'] = $this->Appointment->getSpecialties();
		$this->load->view('default_menu_view');
		$this->load->view('registerAppointmentview', $data);
		$this->load->view('footer.php');
  }
}
