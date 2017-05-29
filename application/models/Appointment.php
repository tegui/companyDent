<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Model {
  public $id = '';
  public $data_date = '';
  public $hour = '';
  public $patientName = '';
  public $id_patient = '';
  public $id_dentist = '';
  public $dentistName = '';

  function __construct(){
    parent :: __construct();
    $this->load->database();

  }

  function getDates() {
    return $this->db->get('cita');
  }

  function getAppointmentByPatientId($id) {
    $this->db->select('id');
    $this->db->from('patient');
    $this->db->where('user_id', $id);
    $query = $this->db->get();
		foreach ($query->result() as $patient) {
			$patientId = $patient->id ;
		}
    $result = array();
    if(isset($patientId)) {
      $this->db->select();
      $this->db->from('patient_appointment');
      $this->db->join('dentist', 'dentist.id  = id_dentist');
      $this->db->join('user', 'user.id  = dentist.user_id');
      $this->db->where('id_patient', $patientId);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        foreach ($query->result() as $appointmentData) {
          $this->id = $appointmentData->id;
          $this->data_date = $appointmentData->data_date;
          $this->hour = $appointmentData->hour;
          $this->id_patient = $appointmentData->id_patient;
          $this->id_dentist = $appointmentData->id_dentist;
          $this->dentistName = $appointmentData->name. " " . $appointmentData->lastname;
          array_push($result,$this);
    		}
      }
    } else {
      //SOME AUTH ERROR
    }
    return $result;
  }

  function getAppointmentsById($id) {
    $this->db->select('id');
    $this->db->from('dentist');
    $this->db->where('user_id', $id);
    $query = $this->db->get();
		foreach ($query->result() as $dentist) {
			$dentistId = $dentist->id ;
		}
    $result = array();
    if(isset($dentistId)) {
      $this->db->select();
      $this->db->from('patient_appointment');
      $this->db->join('patient', 'patient.id  = id_patient');
      $this->db->join('user', 'user.id  = patient.user_id');
      $this->db->where('id_dentist', $dentistId);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        foreach ($query->result() as $appointmentData) {
          $this->id = $appointmentData->id;
          $this->data_date = $appointmentData->data_date;
          $this->hour = $appointmentData->hour;
          $this->id_patient = $appointmentData->id_patient;
          $this->id_dentist = $dentistId;
          $this->patientName = $appointmentData->name. " " . $appointmentData->lastname;
          array_push($result,$this);
    		}
      }
    } else {
      //SOME AUTH ERROR
    }
    return $result;
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
    foreach ($specialties->result() as $specialty) {
      $items[$count++] = $specialty->name;
    }
    return $items;
  }
}
