<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/admin_model');
    $this->load->model('cms/registration_model', 'registration_model');

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
    $res = $this->registration_model->registration_data();

    $data['res'] = $res;
    $data['total_registered'] = $this->registration_model->get_registration_count();

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
    $this->admin_redirect('cms/admin');
  }

  public function update($id)
  {
    if($this->admin_model->update($id, $this->input->post(null, true))){
      $this->session->set_flashdata('flash_msg', ['message' => 'User updated successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error updating user.', 'color' => 'red']);
    }
    $this->admin_redirect('cms/admin');
  }

  public function deactivate()
  {
    if($this->admin_model->deactivate($this->input->post('id', true))){
      $this->session->set_flashdata('flash_msg', ['message' => 'User deactivated successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error deactivating user.', 'color' => 'red']);
    }
    $this->admin_redirect('cms/admin');
  }

  public function activate()
  {
    if($this->admin_model->activate($this->input->post('id', true))){
      $this->session->set_flashdata('flash_msg', ['message' => 'User activated successfully!', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error activating user.', 'color' => 'red']);
    }
    $this->admin_redirect('cms/admin');
  }

  # ESO

  public function eso()
  {
    $res = $this->admin_model->eso_list();

    $data['res'] = $res;
    $data['total_pages'] = count($res);

    $this->wrapper('cms/eso_management', $data);
  }

  public function add_eso()
  {
    if($this->admin_model->add_eso($this->input->post(null, true))){
      $this->session->set_flashdata('flash_msg', ['message' => 'ESO added successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error adding ESO.', 'color' => 'red']);
    }

    $this->admin_redirect('cms/admin/eso');
  }

  public function update_eso($eso_id)
  {
    if($this->admin_model->update_eso($eso_id, $this->input->post(null, true) )){
      $this->session->set_flashdata('update_flash_msg', ['message' => 'ESO updated successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('update_flash_msg', ['message' => 'Error updating ESO.', 'color' => 'red']);
    }

    $this->admin_redirect('cms/admin/eso');
  }

  public function delete_eso()
  {
    if($this->admin_model->delete_eso($this->input->post())){
      $this->session->set_flashdata('update_flash_msg', ['message' => 'ESO deleted successfully.', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('update_flash_msg', ['message' => 'Error deleting ESO.', 'color' => 'red']);
    }
    $this->admin_redirect('cms/admin/eso');
  }

  # BATCHCODE

  public function batchcode()
  {
    $res = $this->admin_model->batchcode_list();

    $data['res'] = $res;
    $data['total_pages'] = count($res);
    
    $this->wrapper('cms/eso_management', $data);
  }

  public function add_batchcode()
  {
    if($this->admin_model->add_batchcode($this->input->post(null, true))){
      $this->session->set_flashdata('flash_msg', ['message' => 'Batchcode added successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error adding Batchcode.', 'color' => 'red']);
    }

    $this->admin_redirect('cms/admin/batchcode');
  }

  public function update_batchcode($batchcode_id)
  {
    if($this->admin_model->update_batchcode($batchcode_id, $this->input->post(null, true) )){
      $this->session->set_flashdata('update_flash_msg', ['message' => 'Batchcode updated successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('update_flash_msg', ['message' => 'Error updating Batchcode.', 'color' => 'red']);
    }

    $this->admin_redirect('cms/admin/batchcode');
  }

  public function delete_batchcode()
  {
    if($this->admin_model->delete_batchcode($this->input->post())){
      $this->session->set_flashdata('update_flash_msg', ['message' => 'Batchcode deleted successfully.', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('update_flash_msg', ['message' => 'Error deleting batchcode.', 'color' => 'red']);
    }
    $this->admin_redirect('cms/admin/batchcode');
  }

  # ASSIGNMENT

  public function ambassador_batchcode()
  {
    $res = $this->admin_model->batchcode_assignment_list();

    $data['res'] = $res;
    $data['total_pages'] = count($res);
    
    $this->wrapper('cms/ambassador_batchcode', $data);
  }

  public function add_batchcode_assignment()
  {
    if($this->admin_model->add_batchcode_assignment($this->input->post(null, true))){
      $this->session->set_flashdata('flash_msg', ['message' => 'Batchcode assignment added successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error adding Batchcode assignment.', 'color' => 'red']);
    }

    $this->admin_redirect('cms/admin/ambassador_batchcode');
  }

  public function update_batchcode_assignment($batchcode_id)
  {
    if($this->admin_model->update_batchcode_assignment($batchcode_id, $this->input->post(null, true) )){
      $this->session->set_flashdata('update_flash_msg', ['message' => 'Batchcode assignment updated successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('update_flash_msg', ['message' => 'Error updating Batchcode assignment.', 'color' => 'red']);
    }

    $this->admin_redirect('cms/admin/ambassador_batchcode');
  }

  public function delete_batchcode_assignment()
  {
    if($this->admin_model->delete_batchcode_assignment($this->input->post())){
      $this->session->set_flashdata('update_flash_msg', ['message' => 'Batchcode assignment deleted successfully.', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('update_flash_msg', ['message' => 'Error deleting batchcode assignment.', 'color' => 'red']);
    }
    $this->admin_redirect('cms/admin/ambassador_batchcode');
  }

  # PROVINCES
  public function areas()
  {
    $res = $this->admin_model->provinces_list();

    $data['res'] = $res;
    $data['total_pages'] = count($res);
    
    $this->wrapper('cms/provinces', $data);
  }

  public function deactivate_province()
  {
    if($this->admin_model->deactivate_province($this->input->post('id', true))){
      $this->session->set_flashdata('flash_msg', ['message' => 'Province deactivated successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error deactivating province.', 'color' => 'red']);
    }
    $this->admin_redirect('cms/admin/areas');
  }

  public function activate_province()
  {
    if($this->admin_model->activate_province($this->input->post('id', true))){
      $this->session->set_flashdata('flash_msg', ['message' => 'Province activated successfully!', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error activating province.', 'color' => 'red']);
    }
    $this->admin_redirect('cms/admin/areas');
  }

}
