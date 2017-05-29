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

}
