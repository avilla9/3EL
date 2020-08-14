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

    if ($query->num_rows() > 0) {
      foreach ($query->result_array() as $row) {
        //echo $row;
        return $row;
      }
    } else {
      $this->db->select('name');
      $this->db->from('login');
      $this->db->where('name', $data["name"]);
      $query = $this->db->get();

      if ($query->num_rows() > 0) {
        return false;
      } else {
        try {
          $this->db->insert('login', $data);
          $this->db->select('name', 'password');
          $this->db->from('login');
          $this->db->where('name', $data["name"]);
          $this->db->where('password', $data["password"]);

          $q = $this->db->get();
          try {
            foreach ($q->result_array() as $r) {
              echo $r['id'];
              return $r['id'];
            }
          } catch (Exception $f) {
            echo $f;
            return false;
          }
        } catch (Exception $e) {
          echo $e;
          return false;
        }
      }
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
