<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/registration_model', 'registration_model');
  }

  public function index()
  {
  	$res = $this->registration_model->registration_data();


    $data['res'] = $res;
    $data['total_registered'] = count($res);
    $data['total_children'] = count($res);

    $this->wrapper('cms/registration_data', $data);
  }


  public function bulk_import()
  {
  	$this->wrapper('cms/upload_data');
  }
}