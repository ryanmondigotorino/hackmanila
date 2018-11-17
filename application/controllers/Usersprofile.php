<?php

class Usersprofile extends CI_Controller{

    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Manila");
        $this->load->model('accounts_model');
        if ($this->session->has_userdata('userislogin') == FALSE) {
            redirect('');
        } 
    }
    public function index(){
        $accode = $this->session->datauser;
        echo 'This is seller = '.$accode;
    }
    public function logout(){
        // $accode = $this->input->post('accode');
        $accode = $this->session->datauser;
        $line = array(
            'account_line' => 0
        );
        if(!$this->accounts_model->editstatus('users_tbl',$accode,$line)){
            $this->session->sess_destroy();
            echo "Success";
        }else {
            echo "Error";
        }
    }
}