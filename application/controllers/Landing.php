<?php

class Landing extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->model('accounts_model');
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
    public function loginsubmit(){
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');
        if ($this->form_validation->run() == FALSE) {
            $message = array(
                'type' => 'error',
                'message' => strip_tags(form_error('email') . "\n" . form_error('password'))
            );
            echo json_encode($message);
        }else{
            $lemail = $this->input->post("email");
            $lpword = $this->input->post("password");
            $data = array(
                'email' => strtolower($lemail),
                'password' => sha1($lpword),
            );
            $data2 = array(
                'email' => strtolower($lemail),
                'password' => sha1($lpword),
                'account_status' => 1,
            );
            $admindetails = $this->accounts_model->getinfo('admins_tbl', $data);
            $adminstats = $this->accounts_model->getinfo('admins_tbl', $data2);
            $sellersdetails = $this->accounts_model->getinfo('sellers_tbl', $data);
            $sellerstats = $this->accounts_model->getinfo('sellers_tbl', $data2);
            $userdetails = $this->accounts_model->getinfo('users_tbl', $data);
            $userstats = $this->accounts_model->getinfo('users_tbl', $data2);
            if(!$admindetails && !$sellersdetails && !$userdetails){
                $message = array(
                    'type' => 'error',
                    'message' => 'Invalid Email or password!'
                );
                echo json_encode($message);
            }elseif(!$adminstats && !$sellerstats && !$userstats){
                if($admindetails || $sellersdetails){
                    $message = array(
                        'type' => 'warning',
                        'message' => 'Your account was deactivated. Please contact the administrator.'
                    );
                    echo json_encode($message);
                }else{
                    $accesscode = $userdetails[0]->access_code;
                    $message = array(
                        'type' => 'warning',
                        'message' => 'Your account was not yet activated. Click ok to add verification.',
                        'linkactivate' => base_url() . 'landing/activation/' . $accesscode
                    );
                    echo json_encode($message);
                }
            }else{
                $message = array(
                    'type' => 'success',
                );
                echo json_encode($message);
            }
        }
    }
}