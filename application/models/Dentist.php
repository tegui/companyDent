<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dentist extends CI_Model {

function __construct() {
		parent :: __construct();
		$this->load->database();
	}

	function saveDentist($data){
		$this->db->insert("dentist",$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	function list_dentist() {
		$this->db->select('*');
    $this->db->from('dentist');
    $this->db->join('user', 'user.id = dentist.user_id');
		$consult = $this->db->get();
		return $consult->result();
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('dentist');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}
	function update($data,$id){

		$this->db->where('id', $id);
		return $this->db->update('dentist', $data);

	}
	function dentist($id){

		$this->db->select('*');
		$this->db->from('dentist');
		$this->db->where('id', $id);
		$consult = $this->db->get();
		return $consult->result();

	}
}

/* End of file dentist.php */
/* Location: ./application/models/dentist.php */
