<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cita extends CI_Model {
  public $id_ate = '';
  public $date = '';
  public $id_user = '';
  public $id_doc = '';

  function __construct(){
    parent :: __construct();
  }

  function getDates() {
    $this->load->database();
    return $this->db->get('Cita');
  }

  function getDatebyId($id) {
    $this->load->database();
    $query = $this->db->get_where('Cita',array('id_date' => $id));
  }

  function registerDate($data) {
    $this->load->database();
    return $this->db->insert('Cita', $data);
  }

  function getDatesByDay($day) {

  }
   function get_Citas() {

    $this->load->database();
    $query = $this->db->get('citas');
    return $query->result();
  }
}
