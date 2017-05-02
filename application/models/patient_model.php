<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model {
function __construct(){
    parent :: __construct();
    $this->load->database();
  }

	function save($data){

		$this->db->insert("patient",$data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	function list_patient() {


		$consult = $this->db->get('patient');
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


	function update($data,$id){

		 $this->db->where('id', $id);
        return $this->db->update('patient', $data);
		
}



	function patient($id){

		$this->db->select('*');
		$this->db->from('patient');
		$this->db->where('id', $id);
		$consult = $this->db->get();
		return $consult->result();
		
}
}