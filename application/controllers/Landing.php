<?php

class Landing extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->model('accounts_model');
        date_default_timezone_set("Asia/Manila");
        if ($this->session->has_userdata('adminislogin') == TRUE) {
            redirect('adminprofile/');
        }elseif ($this->session->has_userdata('sellerislogin') == TRUE) {
            redirect('sellersprofile/');
        }elseif ($this->session->has_userdata('userislogin') == TRUE) {
            redirect('usersprofile/');
        }
        
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
                        'message' => 'Your account was deactivated.'."\n".' Please contact the administrator.',
                        'stats' => 'foraddsell'
                    );
                    echo json_encode($message);
                }else{
                    $accesscode = $userdetails[0]->access_code;
                    $message = array(
                        'type' => 'warning',
                        'message' => 'Your account was not yet activated. Click ok to add verification.',
                        'stats' => 'foruser',
                        'linkactivate' => base_url() . 'landing/activation/' . $accesscode
                    );
                    echo json_encode($message);
                }
            }else{
                $line = array(
                    'account_line' => 1
                );
                if($admindetails){
                    if(!$this->accounts_model->editLineemail('admins_tbl',strtolower($lemail),'email',$line)){
                        $accesscode = $admindetails[0]->access_code;
                        $this->session->adminislogin = true;
                        $this->session->dataadmin = $accesscode;
                        $message = array(
                            'type' => 'success',
                            'linklogin' => base_url().'adminprofile/'
                        );
                        echo json_encode($message);
                    }else{
                        $message = array(
                            'type' => 'error',
                            'message' => 'Something went wrong please try again!',
                        );
                        echo json_encode($message);
                    }
                }elseif($sellersdetails){
                    if(!$this->accounts_model->editLineemail('sellers_tbl',strtolower($lemail),'email',$line)){
                        $accesscode = $sellersdetails[0]->access_code;
                        $this->session->sellerislogin = true;
                        $this->session->dataseller = $accesscode;
                        $message = array(
                            'type' => 'success',
                            'linklogin' => base_url().'sellersprofile/'
                        );
                        echo json_encode($message);
                    }else{
                        $message = array(
                            'type' => 'error',
                            'message' => 'Something went wrong please try again!',
                        );
                        echo json_encode($message);
                    }
                }elseif($userdetails){
                    if(!$this->accounts_model->editLineemail('users_tbl',strtolower($lemail),'email',$line)){
                        $accesscode = $sellersdetails[0]->access_code;
                        $this->session->userislogin = true;
                        $this->session->datauser = $accesscode;
                        $message = array(
                            'type' => 'success',
                            'linklogin' => base_url().'usersprofile/'
                        );
                        echo json_encode($message);
                    }else{
                        $message = array(
                            'type' => 'error',
                            'message' => 'Something went wrong please try again!',
                        );
                        echo json_encode($message);
                    }
                }
            }
        }
    }
    public function signup(){
        $title = array(
            'title' => 'Sign up'
        );
        $this->load->view('landing/includes/header',$title);
        $this->load->view('landing/signup');
        $this->load->view('landing/includes/footer');
    }
    public function signupsubmit(){
        $this->form_validation->set_rules('firstname','First Name','required');
        $this->form_validation->set_rules('lastname','Last Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[admins_tbl.email]
                |is_unique[sellers_tbl.email]|is_unique[users_tbl.email]');
        $this->form_validation->set_rules('contact','Contact Number','required|numeric|exact_length[11]');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('password','Password','required|min_length[7]');
        $this->form_validation->set_rules('confirmpassword','Confirm Password','required|min_length[7]|matches[password]');
        if($this->form_validation->run() == FALSE){
            $message = array(
                'type' => 'error',
                'message' => strip_tags(
                        form_error('firstname') . "\n" .
                        form_error('lastname') . "\n" .
                        form_error('email') . "\n" .
                        form_error('contact') . "\n" .
                        form_error('address') . "\n" .
                        form_error('password') . "\n" .
                        form_error('confirmpassword') . "\n")
            );
            echo json_encode($message);
        }else{
            $this->load->helper('string');
            $verification_code = strtoupper(random_string("alpha", 6));
            $getAccountsData = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'image' => 'noimage.png',
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
                'contact_number' => $this->input->post('contact'),
                'email' => strtolower($this->input->post('email')),
                'password' => sha1($this->input->post('password`')),
                'date_registered' => time(),
                'access_code' => $verification_code
            );
            if (!$this->accounts_model->insert('users_tbl', $getAccountsData)) {
                $message = array(
                    'type' => 'error',
                    'message' => 'Something Went Wrong Please Try again!',
                );
                echo json_encode($message);
            } else {
                $message = array(
                    'type' => 'success',
                    'message' => 'Registration Successful!',
                    'access_code' => $verification_code
                );
                echo json_encode($message);
            }
        }
    }
    public function activation(){
        $title = array(
            'title' => 'Account Activation'
        );
        $this->load->view('landing/activation',$title);
    }
    public function sendactivation(){
        $accode = $this->input->post('accode');
        $data = array(
            'access_code' => $accode
        );
        $accountdetails = $this->accounts_model->getinfo('users_tbl', $data);
        $semail = $accountdetails[0]->email;
        $this->email->from('papathorstorino@gmail.com', 'iTechGadget');
        $this->email->to($semail);
        $this->email->subject('Account Verification');
        $data = array(
            'name' => "iTechGadget",
            'accode' => $accode,
        );
        $this->email->message($this->load->view('landing/includes/mailer', $data, true));
        if (!$this->email->send()) {
            $message = array(
                'type' => 'error',
                'message' => 'Something Went Wrong in Email Sending please try again',
            );
            echo json_encode($message);
        } else {
            $message = array(
                'type' => 'success',
                'message' => 'Email successfully sent! Please check your email to confirm.',
            );
            echo json_encode($message);
        }
    }
    public function load(){
        $accesscode = $this->uri->segment(3);
        $dataarr = array(
            'access_code' => $accesscode,
        );
        $accountdetails = $this->accounts_model->getinfo('users_tbl',$dataarr);
        $data = array(
            'account_status' => 1,
        );
        if(!$this->accounts_model->editstatus('users_tbl',$accesscode,$data)){
            $line = array(
                'account_line' => 1
            );
            $this->accounts_model->editstatus('users_tbl',$accesscode,$line);
            $this->session->userislogin = true;
            $this->session->datauser = $accesscode;
            $message = "Your account was activated!";
            $this->session->set_flashdata('success',$message);
            redirect("usersprofile/");
        }else{
            echo 'error';
        }
    }
    public function shop(){
        $title = array(
            'title' => 'Shop'
        );
        $this->load->view('landing/includes/header',$title);
        $this->load->view('landing/shop');
        $this->load->view('landing/includes/footer');
    }
}