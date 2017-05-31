<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dentist extends CI_Model {

	public $id;
	public $user_id;
	public $specialty;

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

	function deleteById($id) {

		$sql = "DELETE FROM dentist WHERE id = ?";
		$this->db->query($sql, $id);
		// $this->db->where('id', $id);
		// $this->db->delete('dentist');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
			return false;
	}

	function getAttrById($id) {
		$this->db->select('name, lastname');
		$this->db->from('user');
		$this->db->where('id', $id);
		$data = $this->db->get()->result_array();
		return $data;
	}

	function update($data,$data1,$id){
    $this->db->where('user_id', $id);
    $this->db->update('dentist', $data1);
    $this->db->where('id', $id);
    return $this->db->update('user', $data);
  }

	function getAllDentistInfo($id) {
    $this->db->select('*');
    $this->db->from('dentist');
    $this->db->join('user', 'user.id = dentist.user_id');
    $this->db->where('user_id', $id);
		$consult = $this->db->get();
		return $consult->result();
	}

	function getDentistById($id) {
    $this->db->select('id');
		$this->db->from('dentist');
		$this->db->where('user_id', $id);
		$consult = $this->db->get();
		return $consult->result();
  }

	function dentist($id){
		$this->db->select('*');
		$this->db->from('dentist');
		$this->db->where('id', $id);
		$consult = $this->db->get();
		return $consult->result();
	}

	public function getDentistTime($id) {
    $this->db->select('time_in, time_out, id_day');
    $this->db->from('dentist_time');
    $this->db->where('id_dentist', $id);
    $query = $this->db->get();
    $time = array();
    foreach ($query->result() as $od) {

      $st = $od->time_in;
      $end = $od->time_out;

      $day = $this->getDay($od->id_day);

      $dt = DateTime::createFromFormat("H:i:s", $st);
      $hour_st = $dt->format('H');
      $dt = DateTime::createFromFormat("H:i:s", $end);
      $hour_end = $dt->format('H');

      for ($i=$hour_st; $i < $hour_end; $i++) {
        $time[$day][] = $this->getTimeSymb($i);
      }
    }
    return $time;
  }

  public function getWithSpecificSpecialty($esp) {
    $this->db->select();
    $this->db->from('dentist');
    $this->db->where('specialty',$esp);
    $query = $this->db->get();
    return $query->result();
  }

  private function getDay($day) {
    switch ($day) {
      case '1':
        return "Lunes";
        break;
      case '2':
        return "Martes";
        break;
      case '3':
        return "Miercoles";
        break;
      case '4':
        return "Jueves";
        break;
      case '5':
        return "Viernes";
        break;
      case '6':
        return "Sabado";
        break;
      default:
        return "error";
        break;
    }
  }

  private function getTimeSymb($hour) {
    if ($hour < "12") {
      return $hour . ":00 AM";
    } else {
      return $hour . ":00 PM";
    }
  }

}

/* End of file dentist.php */
/* Location: ./application/models/dentist.php */
