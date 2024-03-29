<?php

class Registration_api extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('api/registration_model_api');
  }

  function sign_in_post()
  {
    $login = $this->registration_model_api->login($this->input->post());
    $res = (object)[];

    if($login){
      $res->data = $login;
      $res->meta = (object)['message' => 'Successfully login.', 'code' => 'ok', 'status' => 200];
      $this->response($res, 200);
    }else{
      $res->data = (object)[];
      $res->meta = (object)['message' => 'Invalid credentials', 'code' => 'invalid_credentials', 'status' => 409];
      $this->response($res, 409);
    }

  }

  public function register_post($user_id)
  {
  	// var_dump($_FILES['signature']);
   //  var_dump($user_id);
  	// var_dump($this->input->post());
  	// die();

  	$attachments = $this->registration_model_api->batch_upload(@$_FILES['signature']);

  	// var_dump($attachments['name'][0]); die();
  	$res = [];
  	$data = $this->input->post();
  	for ($i=0; $i < count($data['fname']); $i++) {

	    $res[] = $this->registration_model_api->add_registration($user_id, 
					[
              'ambassador_id' => $user_id,
				      'fname' => $data['fname'][$i],
				      'lname' => $data['lname'][$i],
				      'contact_num' => $data['contact_num'][$i],
				      'email' => $data['email'][$i],
				      'birthday' => $data['birthday'][$i],
				      'relationship' => $data['relationship'][$i],
              'relationship_label' => $data['relationship_label'][$i],
				      'number_of_children' => $data['number_of_children'][$i],
              'child_age' => $data['child_age'][$i],
				      'current_brand_milk' => $data['current_brand_milk'][$i],
				      'registration_etimestamp' => $data['registration_etimestamp'][$i],
              'province_id' => $data['province_id'][$i],
              // 'city_id' => $data['city_id'][$i],
              // 'brgy_id' => $data['brgy_id'][$i],
              'city' => $data['city'][$i],
              'barangay' => $data['barangay'][$i],
				      // 'signature' => @$attachments['name'][$i],
				    ]
  		);
  	}

  	// $res = $this->registration_model_api->insertBatchRegistration($user_id, $this->input->post());

    $response = (object)[];
    if($res) {
      // $response->data = $res; 
      $response->meta = (object)[
        'message' => 'Registered successfully.',
        'code' => 'ok',
        'status' => 201
      ];

      $this->response($response, 201);
    }else{
      $response->data = (object)[];
      $response->meta = (object)[
        'message' => 'Malformed syntax.',
        'code' => 'malformed_syntax',
        'status' => 400
      ];

      $this->response($response, 400);
    }
  }

  public function provinces_get()
  {
    $res = $this->registration_model_api->get_provinces();

    $response = (object)[];
    $response->data = $res; 
    $response->meta = (object)[
      'message' => 'Successfully fetch.',
      'code' => 'ok',
      'status' => 200
    ];

    $this->response($response, 200);
  }

  public function cities_get($prov_code)
  {
    $res = $this->registration_model_api->get_cities($prov_code);

    $response = (object)[];
    $response->data = $res; 
    $response->meta = (object)[
      'message' => 'Successfully fetch.',
      'code' => 'ok',
      'status' => 200
    ];

    $this->response($response, 200);
  }

  public function barangay_get($city_code)
  {
    $res = $this->registration_model_api->get_barangay($city_code);

    $response = (object)[];
    $response->data = $res; 
    $response->meta = (object)[
      'message' => 'Successfully fetch.',
      'code' => 'ok',
      'status' => 200
    ];

    $this->response($response, 200);
  }

  # ADRIAN CODE
  function get_ambassadors_get()
  {
    $ambasaddors = $this->registration_model_api->getAmabassadors();
    $res = (object)[];
    if ($ambasaddors) {
      $res->data = $ambasaddors;
      $res->meta = (object)['message' => 'Succesful fetch', 'code' => 'ok', 'status' => 200];
      $this->response($res, 200);
    } else {
      $res->data = (object)[];
      $res->meta = (object)['message' => 'Invalid credentials', 'code' => 'invalid_credentials', 'status' => 409];
      $this->response($res, 409);
    }
  }


}