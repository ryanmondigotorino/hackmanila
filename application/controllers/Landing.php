<?php

class Landing extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Manila");
        
    }
    public function index(){
        $title = array(
            'title' => 'Home'
        );
        $this->load->view('landing/includes/header',$title);
        $this->load->view('landing/home');
        $this->load->view('landing/includes/footer');
    }

    public function login(){
        $this->load->view('landing/login');
    }
}