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
			$this->load->model('Dentist');
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

	function requestAppointment() {
		$this->load->model('appointment');
		$this->load->helper(array('form', 'url'));
	  $this->load->library('form_validation');
		$this->form_validation->set_rules('disp','disp', 'required');
		if ($this->form_validation->run() == FALSE) {
			$msg['result'] = "No ha seleccionado ninguna cita";
			$this->load->vars($msg);
		} else {
			$id_dentist = $this->input->post('disp');
			$dispo = 'disponibilidad' . ($id_dentist);
			$di = 'dia' . ($id_dentist);

			$time = $this->input->post('disponibilidad');
			$date = $this->input->post('dia');
			$this->load->model('patient');
			$id_glob = $this->session->userdata("id");
			$id_patient_a = $this->Patient->getPatientIdById($id_glob);
			$id_patient = $id_patient_a[0]->id;

			$avai = $this->internalDentistAvailability();

			foreach ($avai as $key => $value) {

				if ($key == 'available') {
					$nowTime = $value[0]['availability'];
					$cont = 0;
					$singleDay = '';
					$hour = '';
					foreach ($nowTime as $dayss => $val) {
						if ($cont == $date) {
							$singleDay = $this->getNearestDay($dayss);
						}
						$cont = $cont + 1;
						$hour = $val[$time];

					}
					$data = array(
						"data_date" => $singleDay,
						"hour" => $this->getNormalTime($hour),
						"id_patient" => $id_patient,
						"id_dentist" => $id_dentist
					);
					print_r($data);
					$saving = $this->Appointment->createAppointment($data);
					if ($saving) {
						print_r('si');
					} else {
						print_r('no');
					}
				}

			}

		}
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
    $data_esp = $this->Dentist->getWithSpecificSpecialty($especialtyNameTwo);
		$av = array();
		$cont = 0;
		foreach ($data_esp as $key => $value) {
			$time = $this->Dentist->getDentistTime($value->id);
			if (count($time) > 0) {
				$usr = $this->Dentist->getAttrById($value->user_id);

				$name = $usr[0]['name'] . " " . $usr[0]['lastname'];
				$dentId = $value->id;
				$dentistTime = $time;

				$av[$cont] = array(
					'dentist_id' => $dentId,
					'name' => $name,
					'availability' => $dentistTime
				);
			}
		}

		$data['available'] = $av;
		$data['specialties'] = $this->Appointment->getSpecialties();
		$this->load->view('default_menu_view');
		$this->load->view('registerAppointmentView', $data);
		$this->load->view('footer.php');

		return;
  }


	public function internalDentistAvailability() {
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
    $data_esp = $this->Dentist->getWithSpecificSpecialty($especialtyNameTwo);
		$av = array();
		$cont = 0;
		foreach ($data_esp as $key => $value) {
			$time = $this->Dentist->getDentistTime($value->id);
			if (count($time) > 0) {
				$usr = $this->Dentist->getAttrById($value->user_id);

				$name = $usr[0]['name'] . " " . $usr[0]['lastname'];
				$dentId = $value->id;
				$dentistTime = $time;

				$av[$cont] = array(
					'dentist_id' => $dentId,
					'name' => $name,
					'availability' => $dentistTime
				);
			}
		}
		$data['available'] = $av;
		$data['specialties'] = $this->Appointment->getSpecialties();
		return $data;
	}

	private function getNearestDay($day) {
		$dayy = $this->getDay($day);
		$str = 'next ' . $dayy;
		$date = date('Y-m-d', strtotime($str, strtotime(date('Y-m-d'))));
		return $date;
	}

	private function getDay($day) {
    switch ($day) {
      case 'Lunes':
        return "Monday";
        break;
      case 'Martes':
        return "Tuesday";
        break;
      case 'Miercoles':
        return "Wednesday";
        break;
      case 'Jueves':
        return "Thursday";
        break;
      case 'Viernes':
        return "Friday";
        break;
      case 'Sabado':
        return "Saturday";
        break;
      default:
        return "error";
        break;
    }
  }


	private function getNormalTime($time) {
		return date_format($time, 'H:i:s');
	}
}
