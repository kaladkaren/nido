<?php

class Registration_model_api extends Crud_model
{
 	
 	public function __construct()
	{
		parent::__construct();
		$this->table = 'tbl_registration';
		$this->upload_dir = 'tbl_registration'; # uploads/your_dir
		$this->uploads_folder = "uploads/" . $this->upload_dir . "/";

		// $this->load->model('api/shipping_model');
	}

	public function getEmail($email)
	{
		return $this->db->get_where('admin', array('email' => $email))->row();
	}

	public function login($data)
	{
		$res = $this->getEmail($data['email']);
		if(!$res){
		  return false;
		}

		if(password_verify($data['password'], $res->password))
		{
		  unset($res->password);
		  return $res;
		}
		return false; # kapag failed lahat
	}

	public function insertBatchRegistration($user_id, $data)
	{
		$res = [];

		for ($i=0; $i < count($data['fname']); $i++) {

		    $res[] = $this->add_registration($user_id, 
		    		array_merge(
		    			// first array
						[
					      'fname' => $data['fname'][$i],
					      'lname' => $data['lname'][$i],
					      'contact_num' => $data['contact_num'][$i],
					      'email' => $data['email'][$i],
					      'birthday' => $data['birthday'][$i],
					      'relationship' => $data['relationship'][$i],
					      'number_of_children' => $data['number_of_children'][$i],
					      'child_ages' => $data['child_ages'][$i],
					      'current_brand_milk' => $data['current_brand_milk'][$i],
					      'registration_etimestamp' => $data['registration_etimestamp'][$i],

					    ], 
					    // second array - for uploading
					    // $this->upload_registration($_FILES['signature'], [$i])
					    []
		    		)
		    		
				);
		}

		return 1;
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
					      'child_ages' => $data['child_age'],
					      'current_brand_milk' => $data['current_brand_milk'],
					      'registration_etimestamp' => $data['registration_etimestamp'],
					      'province_id' => $data['province_id'],
					      // 'city_id' => $data['city_id'],
					      // 'brgy_id' => $data['brgy_id'],
					      'city' => $data['city'],
					      'barangay' => $data['barangay'],
					      // 'signature' => $data['signature']
					    ];
		$this->db->insert('tbl_registration', $data_array);
    	$last_insert_id = $this->db->insert_id();

    	$child_age = explode(',', $data['child_age']);
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

	public function upload_registration($file_key, $row_key)
	{
		@$file = $_FILES[$file_key]['name'][$row_key];
		$upload_path = "uploads/" . $this->upload_dir;

		$config['upload_path'] = $upload_path; # NOTE: Change your directory as needed
		$config['allowed_types'] = 'gif|jpg|jpeg|png'; # NOTE: Change file types as needed
		$config['file_name'] = time() . '_' . $file['name'][$row_key]; # Set the new filename
		$this->upload->initialize($config);

		# Folder creation
		# TODO: Will refactor this and integrate it to the core upload class
		if (!is_dir($upload_path) && !mkdir($upload_path, DEFAULT_FOLDER_PERMISSIONS, true)){
		  mkdir($upload_path, DEFAULT_FOLDER_PERMISSIONS, true); # You can set DEFAULT_FOLDER_PERMISSIONS constant in application/config/constants.php
		}

		if($this->upload->do_upload($file_key)){
		  return [$file_key => $this->upload->data('file_name')];
		}else{
		  // echo $this->upload->display_errors(); die();
		  return [];
		}

	}

	function get_provinces()
	{
		$this->db->where('active', 1);
		return $this->db->get('refprovince')->result();
	}

	function get_cities($prov_code)
	{
		$this->db->where('provCode', $prov_code);
		return $this->db->get('refcitymun')->result();
	}

	function get_barangay($city_code)
	{
		$this->db->where('citymunCode', $city_code);
		return $this->db->get('refbrgy')->result();
	}

	# ADRIAN CODE
	public function getAmabassadors() 
	{
		$query = $this->db->query("select id, email, password, fname, mname, lname, active from admin");
		return $query->result_array();
	}

}