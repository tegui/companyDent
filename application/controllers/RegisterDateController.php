<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registerDateController extends CI_Controller {


	public function index()
	{
    $this->load->model('Odontologo');
    $this->load->model('Cita');
    $data['especialidades'] = $this->espec("one");

    $this->load->view('welcome_message');
		$this->load->view('registerDateView', $data);
	}

  public function disponibilidad() {
    $esp = $this->input->post('especialidad');
    $especialidad = $this->espec("two");
    $esp_name = $especialidad[$esp];
    $this->load->model('Odontologo');
    $data_esp = $this->Odontologo->getWithSpecificSpecialty($esp_name);
    $data['disponibles'] = $data_esp; //array();
		$available = array();
    foreach ($data_esp as $odontologo) {
      $name = $odontologo->nombre;
      $id = $odontologo->id;
			$available[$id] = $this->Odontologo->getOdontologoTime($id);
    }
		$data['availability'] = $available;
    $this->load->vars($data);
    $this->index();
  }


  public function espec($call) {
    $this->load->model('Odontologo');
    $result = $this->Odontologo->getEspecialidades();
    $results = array();
    $cont = 0;
    foreach ($result as $especialidad) {
      $results[$cont] = $especialidad->especialidad;
      $cont++;
    }
			return $results;
  }

	public function pedirCita(){

	$this->load->model('Cita');
	$this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
	$this->form_validation->set_rules('disp','disp', 'required');

    if ($this->form_validation->run() == FALSE) {
        $msg['result'] = "No ha seleccionado ninguna cita";
		$this->load->vars($msg);
		$this->index();
    }else{
		$id_odontologo = $this->input->post('disp');


		$dispo = 'disponibilidad' . ($id_odontologo);
		$di = 'dia' . ($id_odontologo);
		$horario = $this->input->post($dispo);
		$fecha = $this->input->post($di);
		$id_paciente = 22222;

		$this->load->model('Odontologo');
		$available = $this->Odontologo->getOdontologoTime($id_odontologo);
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

		$msg['result'] = "Su cita se ha almacenado exitosamente :D";
		$this->Cita->registerDate($data);
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
