<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Odontologo extends CI_Model {

  public $id_odontologo = '';
  public $name = '';
  public $specialty = '';
  public $time = '';

   function __construct(){
    parent :: __construct();
    $this->load->database();
  }

  public function getOdontologo() {

  }

  public function registerOdontologo() {

  }

  public function getOdontologoTime() {

  }

  public function getEspecialidades() {
    $this->db->distinct();
    $this->db->select('especialidad');
    $this->db->from('odontologo');
    $query = $this->db->get();
    return $query->result();
  }

  public function getWithSpecificSpecialty($esp) {
    $this->db->select();
    $this->db->from('odontologo');
    $this->db->where('especialidad',$esp);
    $query = $this->db->get();
    return $query->result();
  }
}
