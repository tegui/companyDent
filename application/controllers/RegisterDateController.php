<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registerDateController extends CI_Controller {

	public function index()
	{
    $this->load->model('Dentist');
    $this->load->model('Appointment');
    $data['specialties'] = $this->espec("one");
		return;
    $this->load->view('welcome_message');
		$this->load->view('registerDateView', $data);
		$this->load->view('footer.php');
	}

  public function availability() {
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
		print_r($available);

		$data['availability'] = $available;
    $this->load->vars($data);
    $this->index();
  }


  public function espec($call) {
    $this->load->model('Dentist');
    $result = $this->Dentist->getSpecialties();
    $results = array();
    $cont = 0;
		print_r($result);
		return;
    foreach ($result as $especialidad) {
      $results[$cont] = $especialidad->especialidad;
      $cont++;
    }
			return $results;
  }

	public function requestAppointment(){
	$this->load->model('appointment');
	$this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
	$this->form_validation->set_rules('disp','disp', 'required');

    if ($this->form_validation->run() == FALSE) {
    $msg['result'] = "No ha seleccionado ninguna cita";
		$this->load->vars($msg);
		$this->index();
    } else {
		$id_odontologo = $this->input->post('disp');

		$dispo = 'disponibilidad' . ($id_odontologo);
		$di = 'dia' . ($id_odontologo);
		$horario = $this->input->post($dispo);
		$fecha = $this->input->post($di);
		$id_paciente = 22222;

		$this->load->model('Dentist');
		$available = $this->Dentist->getOdontologoTime($id_odontologo);
		$days = array();
		$cont = 0;
		$day = '';
		while ($name = current($available)) {
			$days[] = key($available);
			next($available);
		}
		$chooseDay = '';
		foreach ($days as $singleDay) {
			if ($cont == $fecha) {
				$chooseDay = $singleDay;
				$day = $this->getNearestDay($singleDay);
				break;
			}
			$cont += 1;
		}
		$cont = 0;
		$time = '';
		foreach ($available[$chooseDay] as $singleTime) {
			if ($cont == $horario) {
				$time = $singleTime;
				break;
			}
			$cont += 1;
		}

		$data = array(
			"fecha" => $day,
			"hora" => $time,
			"id_paciente" => $id_paciente,
			"id_odontologo" => $id_odontologo
		);
		$registrar = $this->Cita->registerDate($data);
		//validamos que que la consutal de registrar cita sea exitosa,
		if (!$registrar )
		{
			$msg['result'] = "Registro de cita no exitosa :( ";
		}
		else
		{
			$msg['result'] = "Su cita se ha almacenado exitosamente :D";
		}
		$this->load->vars($msg);
		$this->index();
	}
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

}
