<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }
    public function index()
    {
        $data['page'] = 'first';
        $this->load->view('menu/content', $data);
    }
    public function Login()
    {
        $given_username = $this->input->post('username');
        $given_password = $this->input->post('password');
        $admin_username = 'admin';
        $admin_password = 'admin';

        // Access the user registration database for login username and password

        $this->load->model('Registration_model');
        $db_password = $this->Registration_model->getPassword($given_username);
        // If successfully Logged In
        if (password_verify($given_password, $db_password)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $given_username;
            redirect('pulseup/second');

        } else if ($given_username === $admin_username && $given_password === $admin_password) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $given_username;
            $this->load->view('pages/admin_page');
        } else {
            $_SESSION['logged_in'] = false;
            redirect('pulseup');
        }

    }
    public function logout()
    {
        // $_SESSION['logged_in']=false;
        session_destroy();
        $data['page'] = 'login/logout';
        $this->load->view('menu/content', $data);
    }
}

/* End of file filename.php */