<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/admin_model');
  }

  public function index()
  {
    $res = $this->admin_model->user_list();
    $data['total_pages'] = $this->admin_model->getTotalPages();

    $data['res'] = $res;
    $this->wrapper('cms/users', $data);
  }


  public function profile()
  {
    $user_details = $this->admin_model->get_user_details();

    $data['user_details'] = $user_details;
    $data['uses_uploaded_data'] = array();
    $data['total_pages'] = count($data['uses_uploaded_data']);
    
    $this->wrapper('cms/profile', $data);
  }


  public function add()
  {
    if($this->admin_model->add($this->input->post(null, true))){
      $this->session->set_flashdata('flash_msg', ['message' => 'User added successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error adding user. Email already exists.', 'color' => 'red']);
    }
    $this->admin_redirect('cms');
  }

  public function update($id)
  {
    if($this->admin_model->update($id, $this->input->post(null, true))){
      $this->session->set_flashdata('flash_msg', ['message' => 'User updated successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error updating user.', 'color' => 'red']);
    }
    $this->admin_redirect('cms');
  }

  public function deactivate()
  {
    if($this->admin_model->deactivate($this->input->post('id', true))){
      $this->session->set_flashdata('flash_msg', ['message' => 'User deactivated successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error deactivating user.', 'color' => 'red']);
    }
    $this->admin_redirect('cms');
  }

  public function activate()
  {
    if($this->admin_model->activate($this->input->post('id', true))){
      $this->session->set_flashdata('flash_msg', ['message' => 'User activated successfully!', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error activating user.', 'color' => 'red']);
    }
    $this->admin_redirect('cms');
  }

}
