<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dentist extends CI_Model {
  public $id_dentist = '';
  public $name = '';
  public $specialty = '';
  public $time = '';

  function __construct(){
    parent :: __construct();
  }
}
