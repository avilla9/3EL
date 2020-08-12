<?php

/**
 * Created by PhpStorm.
 * User: adminkofi
 * Date: 30/01/17
 * Time: 1:36
 * @property  db
 */

class LoginModel extends CI_Model {


    public function Login($name, $password) {

               $this->db->select('name', 'password');
               $this->db->from('members');
               $this->db->where('name', $name);
               $this->db->where('password', $password);


               $query = $this->db->get();
               if ($query->num_rows() == 1){
                   return true;
               }else{
                   return false;
               }





           }


}