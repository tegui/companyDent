<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registerDateController extends CI_Controller {

	public function index()
	{
    $this->load->model('Odontologo');
    $this->load->model('Cita');
    // Obtener especialidades aquí y enviarlas
    $result = $this->Odontologo->getEspecialidades();

    $results = array();
    $cont = 0;
    foreach ($result as $especialidad) {
      $results[$cont] = $especialidad->especialidad;
      $cont++;
    }
    $data['especialidades'] = $results;
    $this->load->view('welcome_message');
		$this->load->view('registerDateView', $data);
	}

  public function disponibilidad() {
    $esp = $this->input->post('especialidad');
    



    $data['disponibles'] = "sdasdas";
    $this->load->vars($data);
    $this->index();
  }

	public function registrar(){
    $this->load->model('Cita');
	}
}
