<?php

class LoginModel extends CI_Model
{
    public function Login($name, $password)
    {
        $this->db->select('name', 'password');
        $this->db->from('Login');
        $this->db->where('name', $name);
        $this->db->where('password', $password);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return true;
        } else {
            $data = [
                "name" => $name,
                "password" => $password
            ];
            $this->db->insert('tictactoe.Login', $data);
            return true;
        }
    }
}
