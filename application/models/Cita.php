<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cita extends CI_Model {
  public $id_ate = '';
  public $date = '';
  public $id_user = '';
  public $id_doc = '';

  function __construct(){
    parent :: __construct();
  }
}
