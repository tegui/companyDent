<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dentist extends CI_Controller {


	public function __construct()
	{
	    parent::__construct();
      if (!$this->session->userdata("login")) {
	  		redirect(base_url());
	  	}
			if (($this->session->userdata("login")) and ($this->session->userdata("type") != "dentist") ) {
				$message = "Devuelvete ahora mismo pedazo de... <br>ok, me alteré";
	  		show_error($message, "403", $heading = 'Oups, parece que no tienes permisos para estar aquí...');
	  	}
      $this->load->model('Appointment');
			$this->load->model('Patient');
			$this->load->model('ClinicalHistory');
	}

	public function index() {
		$this->load->view('dentist_menu_view');
		$this->load->view('inicio_view');
		$this->load->view('footer.php');
	}

  public function list_appointments() {
    $currentId = $this->session->userdata("id") ;
    $data['appointments'] = $this->Appointment->getAppointmentsById($currentId);
    $cont = count($data['appointments']);
    if ($cont < 1) {
      $data['resul'] = "Usted no tiene citas asignadas";
    }

    $this->load->view('dentist_menu_view');
    $this->load->view('consult_appointment_view', $data);
    $this->load->view('footer.php');
  }

	public function patientTreatment() {
		$currentId = $this->session->userdata("id") ;
    $appointments = $this->Appointment->getAppointmentsById($currentId);
		$patientsArray = array();
		foreach ($appointments as $patient) {
			$temp = array($patient->id => $patient->patientName);
			$patientsArray[$patient->id] = $patient->patientName;
		}
		$data['patients'] = $patientsArray;


		$this->load->view('dentist_menu_view');
    $this->load->view('treatment_view', $data);
    $this->load->view('footer.php');
	}

	public function createPatientHistory() {
		$currentId = $this->session->userdata("id") ;
    $appointments = $this->Appointment->getAppointmentsById($currentId);
		$patientsArray = array();

		foreach ($appointments as $user) {

			$patientsArray[$user['id_patient']] = $user['id'] . " - " .$user['patientName'];
		}
		$data['patients'] = $patientsArray;

		$this->load->view('dentist_menu_view');
    $this->load->view('clinical_history', $data);
    $this->load->view('footer.php');
	}

	public function saveClinicalHistory() {
		$patient = $this->input->post("patientId");
		$diagnose = $this->input->post("diagnose");
		$currentDate = date('Y-m-d');

		$data = array(
			'patient_id' => $patient,
			'input_date' => $currentDate,
			'diagnose' => $diagnose
		);
		$status = $this->ClinicalHistory->saveNewHistory($data);
		if (!$status) {
			$data['resul'] = "Errorrrr";
			$this->load->vars($data);
		}
		$this->createPatientHistory();
	}

}
