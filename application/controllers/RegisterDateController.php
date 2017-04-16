<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registerDateController extends CI_Controller {

	public function index()
	{
    $this->load->model('Dentist');
    $this->load->model('Cita');
    // Obtener especialidades aquí y enviarlas
    $data['especialidades'] = array("los brakes mijo", "las muelas", "la limpieza");
		$this->load->view('registerDateView', $data);
	}

  public function getEspecialidades() {
    $this->load->model('Dentist');
    $this->load->model('Cita');
  }

  public function disponibilidad() {
    $this->load->model('Dentist');

    $esp = $this->input->post('especialidad');

    $dispon = $this->Dentist->getDentistTime();

    $data['disponibles'] = $dispon;
    $data['especialidades'] = array("los brakes mijo", "las muelas", "la limpieza");
    $this->load->vars($data);
		$this->load->view('registerDateView', $data);
  }

	public function registrar(){
    $this->load->model('Cita');
	}
}
