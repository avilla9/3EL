<?php

class Tictactoe extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('scores_model');
    $this->load->model('LoginModel');
    $this->load->helper('url_helper');
    $this->load->helper('html');
  }

  public function index()
  {
    $data['scores'] = $this->scores_model->get_scores();
    //var_dump($data["scores"]);
    $data['title'] = '3 EN LÍNEA';
    $data['level'] = $this->uri->segment(3);
    $data['user_id'] = $this->uri->segment(4);

    $this->load->view('templates/header', $data);
    $this->load->view('tictactoe/index', $data);
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $data["against"] = $this->input->post("against");
    $data["winner"] = $this->input->post("winner");
  }

  public function getData()
  {
    $user = $this->input->post("id_user");
    $data = $this->LoginModel->getData($user);
    return $data;
  }
}
