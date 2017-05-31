<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class appointmentController extends CI_Controller {

	function __construct(){
		parent :: __construct();
	}

	public function index()
	{
		$this->load->model('Appointment');
		$data['appointments'] = $this->appointment_model->get_appointments();
		//print_r($data);
		if ($data['appointments'] == null) {
			$data['resul'] = "No se encontraron citas asignadas";
		}
		$this->load->view('welcome_message');
		$this->load->view('consult_appointment_view', $data);
		$this->load->view('footer.php');
	}

	function createAppointment($data) {
		$this->db->insert('appointment', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		return false;
	}

}

/* End of file appointments_controller.php */
/* Location: ./application/controllers/appointments_controller.php */
