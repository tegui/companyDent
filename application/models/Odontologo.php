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

  public function getOdontologoTime($id) {
    $this->db->select('horario_in, horario_out, id_dia');
    $this->db->from('horario_odontologo');
    $this->db->where('id_odontologo', $id);
    $query = $this->db->get();
    $time = array();
    foreach ($query->result() as $od) {

      $st = $od->horario_in;
      $end = $od->horario_out;

      $day = $this->getDay($od->id_dia);

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
