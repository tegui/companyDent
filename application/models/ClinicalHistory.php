<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClinicalHistory extends CI_Model {

  public $id = '';
  public $patient_id = '';
  public $input_date = '';
  public $diagnose = '';

  function __construct() {
  		parent :: __construct();
  		$this->load->database();
  }

  public function saveNewHistory($data) {
    $this->db->insert("clinical_history",$data);
    if ($this->db->affected_rows() > 0) {
			return true;
		}
		return false;
  }
}
