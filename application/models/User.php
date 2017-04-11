<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dentist extends CI_Model {
  public $id_user = '';
  public $name = '';

  function __construct(){
    parent :: __construct();
  }
}
