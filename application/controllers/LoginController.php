<?php


class LoginController extends CI_Controller
{

  public function index()
  {
    $this->load->view('login');
  }

  public function checkLogin()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    var_dump($this->form_validation->run());
    if ($this->form_validation->run()) {
      $this->load->view('home');
    } else {
      redirect('HomeController/index');
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
      if ($this->LoginModel->Login($user, $pass)) {
        echo json_encode(true);
      } else {
        echo json_encode(false);
      }
    } else {
      echo json_encode(false);
    }
  }
}
