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
            'alladminaccounts' => $this->accounts_model->fetchAlltbl('admins_tbl'),
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
            'allselleraccounts' => $this->accounts_model->fetchAlltbl('sellers_tbl'),
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
            'alluseraccounts' => $this->accounts_model->fetchAlltbl('users_tbl'),
        );
        $this->load->view('adminprofile/includes/header',$title);
        $this->load->view('adminprofile/useraccounts');
        $this->load->view('adminprofile/includes/footer');
    }
    public function activate() {
        $code = $this->input->post('accode');
        $status = $this->input->post('status');
        $data = array(
            'access_code' => $code,
        );
        $accounts = $this->accounts_model->getinfo($status, $data);
        if (!$accounts) {
            $message = array(
                'type' => 'error',
                'message' => 'Something Went Wrong Please try Again!',
            );
            echo json_encode($message);
        } else {
            $estat = array(
                'account_status' => 1
            );
            if (!$this->accounts_model->editstatus($status,$code, $estat)) {
                $message = array(
                    'type' => 'success',
                    'message' => 'Account Activated!',
                );
                echo json_encode($message);
            } else {
                $message = array(
                    'type' => 'error',
                    'message' => 'Something Went Wrong Please try Again!',
                );
                echo json_encode($message);
            }
        }
    }

    public function deactivate() {
        $code = $this->input->post('accode');
        $status = $this->input->post('status');
        $data = array(
            'access_code' => $code,
        );
        $accounts = $this->accounts_model->getinfo($status, $data);
        if (!$accounts) {
            $message = array(
                'type' => 'error',
                'message' => 'Something Went Wrong Please try Again!',
            );
            echo json_encode($message);
        } else {
            $estat = array(
                'account_status' => 0
            );
            if (!$this->accounts_model->editstatus($status,$code, $estat)) {
                $message = array(
                    'type' => 'success',
                    'message' => 'Account Deactivated!',
                );
                echo json_encode($message);
            } else {
                $message = array(
                    'type' => 'error',
                    'message' => 'Something Went Wrong Please try Again!',
                );
                echo json_encode($message);
            }
        }
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