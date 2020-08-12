<?php
/**
 * Created by PhpStorm.
 * User: adminkofi
 * Date: 30/01/17
 * Time: 1:23
 */
class HomeController extends CI_Controller {
    public function  index(){
        $this->load->view('login');
    }

}

?>