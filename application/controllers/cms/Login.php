<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/login_model', 'login');
    $this->load->model('cms/admin_model');
  }

  public function index()
  {
    $this->login();
  }

  public function login()
  {
    $this->load->view('cms/login');
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('cms/login');
    die();
  }

  public function attempt() # attempt to login
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    // var_dump(password_verify($password, $res->password)); die();

    $res = $this->login->getByEmail($email);
    if($res && password_verify($password, $res->password)){
      $this->session->set_userdata(['role' => 'administrator', 'id' => $res->id, 'fname' => $res->fname, 'role_id' => $res->role]);
      redirect('cms/dashboard');
    } else {
      $this->session->set_flashdata('login_msg', ['message' => 'Incorrect email or password', 'color' => 'red']);
      redirect('cms/login');
    }

  }

  public function ambassador_signup()
  {
    $this->load->view('cms/ambassador_signup');
  }

  public function register()
  {
    $input = $this->input->post(null, true);
    $input['role'] = 2;
    if($this->admin_model->add($input)){
      $this->session->set_flashdata('flash_msg', ['message' => 'Successfully registered, you may now login.', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error registration. Email you have entered already exist.', 'color' => 'red']);
    }

    redirect('cms/login/ambassador_signup');
  }

}