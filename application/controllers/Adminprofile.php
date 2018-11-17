<?php

class Adminprofile extends CI_Controller{

    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Manila");
        
    }
    public function index(){
        $title = array(
            'title' => 'Dashboard'
        );
        $this->load->view('adminprofile/includes/header',$title);
        $this->load->view('adminprofile/dashboard');
        $this->load->view('adminprofile/includes/footer');
    }
    public function adminaccounts(){
        $title = array(
            'title' => 'Admin Accounts'
        );
        $this->load->view('adminprofile/includes/header',$title);
        $this->load->view('adminprofile/adminaccounts');
        $this->load->view('adminprofile/includes/footer');
    }
    public function selleraccounts(){
        $title = array(
            'title' => 'Seller Accounts'
        );
        $this->load->view('adminprofile/includes/header',$title);
        $this->load->view('adminprofile/selleraccounts');
        $this->load->view('adminprofile/includes/footer');
    }
    public function useraccounts(){
        $title = array(
            'title' => 'User Accounts'
        );
        $this->load->view('adminprofile/includes/header',$title);
        $this->load->view('adminprofile/useraccounts');
        $this->load->view('adminprofile/includes/footer');
    }
}