<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Specialty extends CI_Model {

  public $id;
  public $name;
  public $specialty;

  function __construct() {
    parent :: __construct();
    $this->load->database();
  }

  function getSpecialties_array() {
    $this->db->select('*');
    $this->db->from('specialty');
    $query = $this->db->get();
    $result = array();
    foreach ($query->result() as $q) {
      $result[$q->id] = $q->name;
    }
    return $result;
  }

  function getSpecialtyById($id) {
    $this->db->select('name');
    $this->db->from('specialty');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->result();
  }
}
