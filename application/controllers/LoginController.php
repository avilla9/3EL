<?php
/**
 * Created by PhpStorm.
 * User: adminkofi
 * Date: 30/01/17
 * Time: 1:19
 */

class LoginController extends CI_Controller
{

    public function index()
    {
        $this->load->view('login');
    }

    public function checkLogin()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_verifyUser');

        if ($this->form_validation->run() == false) {
            $this->load->view('home');

        } else {

            redirect('HomeController/index');

        }
    }

            public function verifyUser()
            {
                $name = $this->input->post('username');
                $password = $this->input->post('password');

                $this->load->model('LoginModel');
                if ($this->LoginModel->login($name, $password)) {
                    return true;
                } else {
                    $this->form_validation->set_message('verifyUser', 'Incorrect Email or Password. Please try Again');
                    return false;
                }
            }

        }



?>