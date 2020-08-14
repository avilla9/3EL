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

  public function verifyUser()
  {
    $_POST = json_decode(file_get_contents('php://input'), true);
    var_dump("response: ", $this->input->post('user'));
    if ($this->input->is_ajax_request()) {
      $user = $this->input->post('user');
      $pass = $this->input->post('pass');
      $this->load->model('LoginModel');
      if ($this->LoginModel->login($user, $pass)) {
        echo json_encode(true);
      } else {
        echo json_encode(false);
      }
    } else {
      echo json_encode(false);
    }
  }
}
