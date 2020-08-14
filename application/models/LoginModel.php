<?php

class LoginModel extends CI_Model
{
  public function login($data)
  {
    $this->db->select('name', 'password');
    $this->db->from('login');
    $this->db->where('name', $data["name"]);
    $this->db->where('password', $data["password"]);

    $query = $this->db->get();

    if ($query->num_rows() >= 1) {
      foreach ($query->result_array() as $row) {
        //echo $row;
        return $row;
      }
    } else if ($this->db->insert('login', $data)) {
      $this->db->select('name', 'password');
      $this->db->from('login');
      $this->db->where('name', $data["name"]);
      $this->db->where('password', $data["password"]);

      $query = $this->db->get();

      foreach ($query->result_array() as $row) {
        echo $row['id'];
        return $row['id'];
      }
    } else {
      return false;
    }
  }

  public function getData($data)
  {
    $this->db->select('*');
    $this->db->from('login');
    $this->db->where(['id' => $data]);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      foreach ($query->result_array() as $row) {
        echo $row['name'];
        return $row['name'];
      }
    } else {
      return false;
    }
  }
}
