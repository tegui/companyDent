<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {

	
	function login($name, $password){
		$this->db->where("name", $name);
		$this->db->where("password", $password);
		$result = $this->db->get("admin");
		if ($result->num_rows()>0) {
			return $result->row();
		}
		else{
			return false;
		}
	}

}

/* End of file admin.php */
/* Location: ./application/models/admin.php */