<?php

class LoginController extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('LoginModel');
  }

  public function index()
  {
    $this->load->view('login');
  }

  public function getForm()
  {
    $this->form_validation->set_rules(
      'email',
      'Email',
      'required'
    );
    $this->form_validation->set_rules(
      'password',
      'Password',
      'required'
    );
    if ($this->form_validation->run() == FALSE) {
      echo validation_errors();
      return false;
    } else {
      $data["name"] = $this->input->post("email");
      $data["password"] = $this->input->post("password");
      $query = $this->LoginModel->login($data);
      if ($query) {
        echo true;
      } else {
        echo false;
      }
    }
  }
}
