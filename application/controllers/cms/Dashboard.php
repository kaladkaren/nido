<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/admin_model', 'admin_model');
  }

  public function index()
  {
    $this->dashboard();
  }

  public function dashboard()
  {
    $res = $this->admin_model->user_list();

    $data['total_sales'] = 100;
    $data['total_orders'] = 40;
    $data['total_items'] = 60;
    $data['total_pages'] = $this->admin_model->getTotalPages();

    // var_dump($res); die();

    $data['res'] = $res;
    $this->wrapper('cms/dashboard', $data);
  }

  public function dashboards()
  {
    // $res = $this->orders_model->allCompletedOrders();
    // $data['total_sales'] = $this->orders_model->getSalesAmount();
    // $data['total_orders'] = $this->orders_model->getTotalOrders();
    // $data['total_items'] = $this->orders_model->countCartItems();
    // $data['res'] = $res;

    $data['total_sales'] = 100;
    $data['total_orders'] = 40;
    $data['total_items'] = 60;
    $data['res'] = array();

    // var_dump($data); die();
    $this->wrapper('cms/dashboard', $data);
  }

}
