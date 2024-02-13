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
    $data['total_registered'] = $this->registration_model->get_registration_count();
    $data['total_children'] = $this->registration_model->get_children_count();

    $this->wrapper('cms/registration_data', $data);
  }


  public function bulk_import()
  {
  	$this->wrapper('cms/upload_data');
  }

  public function add_bulk_import()
  {
    $converted_data = $this->registration_model->convertCSV('batch_upload_nido_format');
    
    $res = $this->registration_model->bulk_add($converted_data);

    if($res) {
      $this->session->set_flashdata('flash_msg', ['message' => 'Data imported successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error updating item', 'color' => 'red']);
    }
    $this->admin_redirect('cms/registration/bulk_import');
  }

  public function export_csv()
  {
    // var_dump($data); die();
    // output headers so that the file is downloaded rather than displayed
    header('Content-type: text/csv');
    header('Content-Disposition: attachment; filename="' . date('Y-m-d') . "_registration" . '_.csv"');
    // do not cache the file
    header('Pragma: no-cache');
    header('Expires: 0');
    // create a file pointer connected to the output stream
    $file = fopen('php://output', 'w');
    // send the column headers
    fputcsv($file, array('#', 'First Name', 'Lastname', 'Relationship', 'Contact #', 'Email', 'Birthday', '# of 3-5yrs old Children', 'Children Ages', 'Current Milk Brand', 'Registration Date', 'Province/Area', 'Ambassador'));
  
    $result = $this->registration_model->registration_data();

    $new_res = [];
    $i = 1;
    foreach ($result as $key => $value) {
      
      $relationship = $value->relationship == 1 ? 'Parent' : 'Guardian';

      $new_res[] = array(
        $i++,
        $value->fname,
        $value->lname,
        $relationship,
        $value->contact_num,
        $value->email,
        $value->birthday_f,
        $value->number_of_children,
        $value->children_ages,
        $value->current_brand_milk,
        $value->registration_etimestamp,
        $value->provDesc .'/'.   $value->city .'/'.  $value->barangay,
        $value->ambassador_name

      );
    }
    $data = $new_res;

    foreach ($data as $row)
    {
      fputcsv($file, $row);
    }
    exit();
  }

}