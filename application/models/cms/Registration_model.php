<?php

class Registration_model extends Admin_core_model
{

  function __construct()
  {
    parent::__construct();

    $this->table = 'tbl_registration'; # Replace these properties on children
    $this->upload_dir = 'tbl_registration'; # Replace these properties on children
    $this->per_page = 15;
  }

  public function registration_data()
  {
  	if (@$_GET['from']) {
      $this->db->where('registration_etimestamp >= "' . $_GET['from']. '"');
    }
    if (@$_GET['to']) {
      $this->db->where('registration_etimestamp <= "' . $_GET['to']. '"');
    }
    $res = $this->db->get('tbl_registration')->result();


    return $res;
  }

}