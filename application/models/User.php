<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

  public $id;
  public $name;
  public $lastname;
  public $userType;
  public $status = 1;

  function __construct() {
    parent :: __construct();
    $this->load->database();
  }

  function saveUser($data) {
    $this->db->insert("user",$data);
    if ($this->db->affected_rows() > 0) {
			return true;
		}
		return false;
  }

  function getUser($username, $pass) {
    $this->db->select();
    $this->db->from('user');
    $this->db->where('username', $username);
    $this->db->where('password', $pass);
    $data = $this->db->get()->result_array();

    if (empty($data)) {
      $this->status = 0;
      return  $this;
    }
    foreach ($data as $user) {
      $this->id =  $user['id'];
      $this->name =  $user['name'];
      $this->lastname =  $user['lastname'];
      $this->userType =  $user['user_type'];
      break;
    }
    return $this;
  }

}
