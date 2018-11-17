<?php

class Adminprofile extends CI_Controller{

    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Manila");
        
    }
    public function index(){
        $title = array(
            'title' => 'Home'
        );
        $this->load->view('adminprofile/includes/header',$title);
        $this->load->view('adminprofile/dashboard');
        $this->load->view('adminprofile/includes/footer');
    }
}