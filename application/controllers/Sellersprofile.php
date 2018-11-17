<?php

class Sellersprofile extends CI_Controller{

    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Manila");
        $this->load->model('accounts_model');
        if ($this->session->has_userdata('sellerislogin') == FALSE) {
            redirect('');
        } 
    }

    public function index(){
        $accode = $this->session->dataseller;
        echo 'This is seller = '.$accode;
    }
    public function logout(){
        // $accode = $this->input->post('accode');
        $accode = $this->session->dataseller;
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