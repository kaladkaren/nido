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

  public function getEmail($email)
  {
    return $this->db->get_where($this->table, array('email' => $email))->row();
  }

  public function add($data)
  {
    $check = $this->getEmail($data['email']);

    if($check){
      return false;
    }

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

  public function get_ambassador_count()
  {
    $this->db->select('COUNT(id) as ambassador_count');
    $this->db->where('role', 2);
    $res = $this->db->get('admin')->result();

    return $res[0]->ambassador_count;
  }

  public function squery($like_arr)
  {
    $squery = $this->input->get('squery');
    if($squery) {

      if (count($like_arr) > 0) { # if more than 1 columns
        $like_str = "(";
        foreach ($like_arr as $key => $value) {
          $like_str .= "LOWER($value) LIKE '%$squery%'";

          if ($value !== end($like_arr)) {
             $like_str .= " OR ";
          } else {
             $like_str .= ")";
          }
        }

        $this->db->where("$like_str");
      } else {
        foreach ($like_arr as $key => $value) {
          $this->db->or_like("LOWER($value)", strtolower($squery));
        }
      }
    } else {
      return false; #do nthing
    }

  }

  public function eso_list()
  {
    $this->db->where('deleted_at IS NULL');
    $this->db->order_by('eso_label', 'asc');
    $res = $this->db->get('tbl_eso')->result();

    return $res;
  }

  public function add_eso($data)
  {
    $this->db->insert('tbl_eso', $data);
    return $this->db->insert_id();
  }

  public function update_eso($id, $data)
  {
    $this->db->where('id', $id);
    return $this->db->update('tbl_eso', $data);
  }

  public function delete_eso($data)
  {
    $this->db->where('id', $data['id']);
    return $this->db->update('tbl_eso', ['deleted_at' => date('Y-m-d H:i:s')]);
  }

  # BATCHCODE

  public function batchcode_list()
  {
    $this->db->where('deleted_at IS NULL');
    $res = $this->db->get('tbl_batchcodes')->result();

    return $res;
  }

  public function add_batchcode($data)
  {
    $this->db->insert('tbl_batchcodes', $data);
    return $this->db->insert_id();
  }

  public function update_batchcode($id, $data)
  {
    $this->db->where('id', $id);
    return $this->db->update('tbl_batchcodes', $data);
  }

  public function delete_batchcode($data)
  {
    $this->db->where('id', $data['id']);
    return $this->db->update('tbl_batchcodes', ['deleted_at' => date('Y-m-d H:i:s')]);
  }

  # BATCHCODE ASSIGNMENT

  public function batchcode_assignment_list()
  {
    $this->db->select('a.*, b.batchcode_label, b.expiry_date, c.eso_label, CONCAT(d.fname, " ", d.lname) as ambassador_name');
    $this->db->where('a.deleted_at IS NULL');
    $this->db->join('tbl_batchcodes b', 'b.id = a.batchcode_id', 'left');
    $this->db->join('tbl_eso c', 'c.id = b.eso_id', 'left');
    $this->db->join('admin d', 'd.id = a.ambassador_id', 'left');
    $res = $this->db->get('tbl_batchcodes_assignment a')->result();

    return $res;
  }

  public function add_batchcode_assignment($data)
  {
    $this->db->insert('tbl_batchcodes_assignment', $data);
    return $this->db->insert_id();
  }

  public function update_batchcode_assignment($id, $data)
  {
    $this->db->where('id', $id);
    return $this->db->update('tbl_batchcodes_assignment', $data);
  }

  public function delete_batchcode_assignment($data)
  {
    $this->db->where('id', $data['id']);
    return $this->db->update('tbl_batchcodes_assignment', ['deleted_at' => date('Y-m-d H:i:s')]);
  }

  # PROVINCES
  public function provinces_list()
  {
    // $this->db->order_by("provDesc ASC, active DESC");
    $res = $this->db->get('refprovince')->result();

    return $res;
  }

  public function deactivate_province($id)
  {
    $this->db->where('id', $id);
    return $this->db->update('refprovince', ['active' => 0]);
  }

  public function activate_province($id)
  {
    $this->db->where('id', $id);
    return $this->db->update('refprovince', ['active' => 1]);
  }

}