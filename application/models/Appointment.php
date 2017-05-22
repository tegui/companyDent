<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Model {
  public $id_date = '';
  public $date = '';
  public $id_user = '';
  public $id_dentist = '';

  function __construct(){
    parent :: __construct();
    $this->load->database();
  }

  function getDates() {
    return $this->db->get('cita');
  }

  function getDatebyId($id) {
    $query = $this->db->get_where('cita',array('id_date' => $id));
  }

  function registerDate($data) {
    return $this->db->insert('cita', $data);
  }

  function getDatesByDay($day) {

  }

  function get_appointments() {
    //SELECT nombre,fecha, hora from odontologo d JOIN cita c on d.id = c.id_odontologo
    $this->db->select('nombre, fecha, hora');
    $this->db->from('odontologo');
    $this->db->join('cita', 'odontologo.id=cita.id_odontologo');
    $query = $this->db->get();
    return $query->result();
  }

  function getSpecialties() {
    $this->db->select('name');
    $this->db->from('specialty');
    $specialties = $this->db->get();
    $items = array();
    $count = 0;
    foreach (($specialties->result_array()) as $name => $specialty) {
      $items[$count++] = $specialty['name'];
    }
    return $items;
  }
}
