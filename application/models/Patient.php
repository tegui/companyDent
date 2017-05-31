<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Model {

  public $id;
  public $userId;
  public $birthdate;
  public $email;
  public $phone;

function __construct() {
    parent :: __construct();
    $this->load->database();
  }

	function save($data) {
		$this->db->insert("patient",$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	function list_patient() {
    $this->db->select('*');
    $this->db->from('patient');
    $this->db->join('user', 'user.id = patient.user_id');
		$consult = $this->db->get();
		return $consult->result();
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('patient');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

  function getAllPatientInfo($id) {
    $this->db->select('*');
    $this->db->from('patient');
    $this->db->join('user', 'user.id = patient.user_id');
    $this->db->where('user_id', $id);
		$consult = $this->db->get();
		return $consult->result();
	}

	function update($data,$data1,$id){
    $this->db->where('user_id', $id);
    $this->db->update('patient', $data1);
    $this->db->where('id', $id);
    return $this->db->update('user', $data);
  }

  function getPatientIdById($id) {
    $this->db->select('id');
		$this->db->from('patient');
		$this->db->where('user_id', $id);
		$consult = $this->db->get();
		return $consult->result();
  }

	function patient($id){
		$this->db->select('*');
		$this->db->from('patient');
		$this->db->where('id', $id);
		$consult = $this->db->get();
		return $consult->result();
  }
}
