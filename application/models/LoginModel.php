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
            return true;
        } else if ($this->db->insert('login', $data)) {
            return true;
        } else {
            return false;
        }
    }
}
