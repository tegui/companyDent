<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registerDateController extends CI_Controller {


	public function index()
	{
    $this->load->model('Odontologo');
    $this->load->model('Cita');
    $data['especialidades'] = $this->espec();

    $this->load->view('welcome_message');
		$this->load->view('registerDateView', $data);
	}

  public function disponibilidad() {
    $esp = $this->input->post('especialidad');
    $especialidad = $this->espec();
    $esp_name = $especialidad[$esp];
    $this->load->model('Odontologo');
    $data_esp = $this->Odontologo->getWithSpecificSpecialty($esp_name);
    $data['disponibles'] = $data_esp; //array();
    // foreach ($data_esp as $odontologo) {
    //   $name = $odontologo->nombre;
    //   $id = $odontologo->id;
    //   $data['disponibles'][] = array(
    //     'nombre' => $name,
    //     'id' => $id
    //   );
    // }


    $this->load->vars($data);
    $this->index();
  }

  public function espec() {
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

	public function registrar(){
    $this->load->model('Cita');
	}
}
