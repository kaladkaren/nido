<?php

class Registration_model extends Admin_core_model
{

  function __construct()
  {
    parent::__construct();

    $this->table = 'tbl_registration'; # Replace these properties on children
    $this->upload_dir = 'tbl_registration'; # Replace these properties on children
    $this->upload_dir_csv = 'uploads/upload_registration'; # Replace these properties on children
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

    if (@$_GET['ambassador_id']) {
      $this->db->where('ambassador_id = "' . $_GET['ambassador_id']. '"');
    }

    if (@$_GET['province_id']) {
      $this->db->where('tbl_registration.province_id = "' . $_GET['province_id']. '"');
    }

    $this->db->select('tbl_registration.*, CONCAT(admin.fname, " ", admin.lname) as ambassador_name, refprovince.provDesc');
    $this->db->join('admin', 'admin.id = tbl_registration.ambassador_id', 'left');
    $this->db->join('refprovince', 'refprovince.id = tbl_registration.province_id', 'left');
    $this->db->order_by('tbl_registration.id', 'DESC');
    $res = $this->db->get('tbl_registration')->result();

    $result = [];
    foreach ($res as $value) {
      $value->children_ages = $this->get_child_ages($value->id);
      $value->birthday_f = date('M j, Y', strtotime($value->birthday));
      $result[] = $value;
    }
    // var_dump($result); die();

    return $result;
  }

  function get_child_ages($registration_id)
  {
    $this->db->select('children_age');
    $this->db->where('registration_id', $registration_id);
    $res = $this->db->get('tbl_children_ages')->result();

    $ages = [];
    foreach ($res as $value) {
      $ages[] = $value->children_age;
    }

    $children_ages = implode(',', $ages);

    return $children_ages;
  }

  public function get_registration_count()
  {
    $this->db->select('COUNT(id) as registration_count');
    if (@$_GET['from']) {
      $this->db->where('registration_etimestamp >= "' . $_GET['from']. '"');
    }
    if (@$_GET['to']) {
      $this->db->where('registration_etimestamp <= "' . $_GET['to']. '"');
    }

    if (@$_GET['ambassador_id']) {
      $this->db->where('ambassador_id = "' . $_GET['ambassador_id']. '"');
    }

    if (@$_GET['province_id']) {
      $this->db->where('tbl_registration.province_id = "' . $_GET['province_id']. '"');
    }

    $res = $this->db->get('tbl_registration')->result();

    return $res[0]->registration_count;
  }

  public function get_children_count()
  {
    $this->db->select('SUM(number_of_children) as number_of_children');
    if (@$_GET['from']) {
      $this->db->where('registration_etimestamp >= "' . $_GET['from']. '"');
    }
    if (@$_GET['to']) {
      $this->db->where('registration_etimestamp <= "' . $_GET['to']. '"');
    }

    if (@$_GET['ambassador_id']) {
      $this->db->where('ambassador_id = "' . $_GET['ambassador_id']. '"');
    }

    if (@$_GET['province_id']) {
      $this->db->where('tbl_registration.province_id = "' . $_GET['province_id']. '"');
    }

    $res = $this->db->get('tbl_registration')->result();

    $child_count = 0;

    foreach ($res as $value) {
      $child_count += $value->number_of_children;
    }

    return $child_count;
  }

  public function add_registration($user_id, $data)
  {
    $data_array = [
                'ambassador_id' => $user_id,
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'contact_num' => $data['contact_num'],
                'email' => $data['email'],
                'birthday' => $data['birthday'],
                'relationship' => $data['relationship'],
                'relationship_label' => $data['relationship_label'],
                'number_of_children' => $data['number_of_children'],
                'current_brand_milk' => $data['current_brand_milk'],
                'registration_etimestamp' => $data['registration_etimestamp'],
                'province_id' => $data['province_id'],
                'city' => $data['city'],
                'barangay' => $data['barangay'],
              ];
      $this->db->insert('tbl_registration', $data_array);
      $last_insert_id = $this->db->insert_id();

      // for ($i=0; $i < count($data['child_age']); $i++) {
      //   $this->add_child_ages($last_insert_id, $data['child_age'][$i]);
      // }
      foreach ($child_age as $value) {
        $this->add_child_ages($last_insert_id, $value);
      }

      return $last_insert_id;
  }

  function add_child_ages($registration_id, $child_age)
  {
    $this->db->insert('tbl_children_ages', ['registration_id' => $registration_id, 'children_age' => $child_age]);
      return $this->db->insert_id();
  }

  public function convertCSV($file_key)
  {
    $files = glob(FCPATH . $this->upload_dir_csv); // get all file names
    foreach($files as $file){ // iterate files
      if(is_file($file))
        unlink($file); // delete file
    }

    $file_name = @$this->uploadCSV($file_key)['batch_upload_nido_format'];
    $imported_csv = fopen(FCPATH . $this->upload_dir_csv . "/" .$file_name, 'r');
    $res = [];

    while(!feof($imported_csv))
    {
      $res[] = fgetcsv($imported_csv);
    }
    fclose($imported_csv); array_pop($res); # remove the extra element at the end

    return $res;
  }


  public function uploadCSV($file_key)
  {
    @$file = $_FILES[$file_key];
    $upload_path = $this->upload_dir_csv;

    $config['upload_path'] = $upload_path; # NOTE: Change your directory as needed
    $config['allowed_types'] = 'csv'; # NOTE: Change file types as needed
    $config['file_name'] = time() . '_' . $file['name']; # Set the new filename
    $this->upload->initialize($config);

    if (!is_dir($upload_path) && !mkdir($upload_path, DEFAULT_FOLDER_PERMISSIONS, true)){
      mkdir($upload_path, DEFAULT_FOLDER_PERMISSIONS, true); # You can set DEFAULT_FOLDER_PERMISSIONS constant in application/config/constants.php
    }
    if($this->upload->do_upload($file_key)){
      return [$file_key => $this->upload->data('file_name')];
    }else{
      return [];
    }
  }

  public function bulk_add($converted_data)
  {
    unset($converted_data[0]);
    $succ = []; #success checkcer
    foreach ($converted_data as $key => $value) {
      $this->db->trans_start();

      // explode(',', $value[1]);
      # data to insert
      $data = [];
      $data['fname'] = $value[0];
      $data['lname'] = $value[1];
      $data['contact_num'] = $value[2];
      $data['email'] = $value[3];
      $data['birthday'] = date('Y-m-d', strtotime($value[4])); //$value[4];
      $data['relationship'] = $value[5];
      $data['relationship_label'] = $value[6];
      $data['number_of_children'] = $value[7];
      $data['child_age'] = explode(',', $value[8]);
      $data['current_brand_milk'] = $value[9];
      $data['registration_etimestamp'] = date('Y-m-d', strtotime($value[10]));
      $data['province_id'] = $value[11];
      $data['city'] = $value[12];
      $data['barangay'] = $value[13];

      $last_entry_id = $this->add_registration($this->session->userdata('id'), $data);

      $this->db->trans_complete();
      $succ[] = ($last_entry_id) ? $last_entry_id : false;

      // var_dump($product); die();
    }

    return $this->hasFailure($succ);
  }

  public function hasFailure($succ)
  {
    $res = true;
    foreach ($succ as $key => $value) {
      $res = $value && $res;
    }
    return $res;
  }

}