<?php

class Admin_model extends Admin_core_model
{

  function __construct()
  {
    parent::__construct();

    $this->table = 'admin'; # Replace these properties on children
    $this->upload_dir = 'admin'; # Replace these properties on children
    $this->per_page = 15;
  }

  public function add($data)
  {
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  public function update($id, $data)
  {
    if (!$data['password']) {
      unset($data['password']);
    } else {
      $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    }
    $this->db->where('id', $id);
    return $this->db->update($this->table, $data);
  }

  public function deactivate($id)
  {
    $this->db->where('id', $id);
    return $this->db->update($this->table, ['active' => 0]);
  }

  public function activate($id)
  {
    $this->db->where('id', $id);
    return $this->db->update($this->table, ['active' => 1]);
  }

  public function user_list()
  {
    $res = $this->db->query('SELECT a.*, b.id as role_id, b.role as role_name
                      FROM admin a
                      LEFT JOIN tbl_role b on b.id = a.role
                    ')->result();
    return $res;
  }

  public function get_user_details()
  {
    $this->db->where('id', $this->session->userdata('id'));
    $res = $this->db->get('admin')->row();

    return $res;
  }

}
