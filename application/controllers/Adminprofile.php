<?php

class Adminprofile extends CI_Controller{

    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Manila");
        $this->load->model('accounts_model');
        if ($this->session->has_userdata('adminislogin') == FALSE) {
            redirect('');
        } 
    }
    public function index(){
        $accode = $this->session->dataadmin;
        $title = array(
            'title' => 'Dashboard',
            'accode' => $accode,
        );
        $this->load->view('adminprofile/includes/header',$title);
        $this->load->view('adminprofile/dashboard');
        $this->load->view('adminprofile/includes/footer');
    }
    public function adminaccounts(){
        $accode = $this->session->dataadmin;
        $title = array(
            'title' => 'Admin Accounts',
            'accode' => $accode,
        );
        $this->load->view('adminprofile/includes/header',$title);
        $this->load->view('adminprofile/adminaccounts');
        $this->load->view('adminprofile/includes/footer');
    }
    public function selleraccounts(){
        $accode = $this->session->dataadmin;
        $title = array(
            'title' => 'Seller Accounts',
            'accode' => $accode,
        );
        $this->load->view('adminprofile/includes/header',$title);
        $this->load->view('adminprofile/selleraccounts');
        $this->load->view('adminprofile/includes/footer');
    }
    public function useraccounts(){
        $accode = $this->session->dataadmin;
        $title = array(
            'title' => 'User Accounts',
            'accode' => $accode,
        );
        $this->load->view('adminprofile/includes/header',$title);
        $this->load->view('adminprofile/useraccounts');
        $this->load->view('adminprofile/includes/footer');
    }
    public function logout(){
        $accode = $this->input->post('accode');
        $line = array(
            'account_line' => 0
        );
        if(!$this->accounts_model->editstatus('admins_tbl',$accode,$line)){
            $this->session->sess_destroy();
            echo "Success";
        }else {
            echo "Error";
        }
    }
}