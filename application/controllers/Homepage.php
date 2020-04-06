<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Registration_model');
    }

    public function index()
    {
        $data['page'] = 'pages/first';
        $this->load->view('menu/content', $data);
    }

    public function second()
    {
        $data['page'] = 'pages/second';
        $this->load->view('menu/content', $data);
    }

    public function login()
    {
        $given_username = $this->input->post('username');
        $given_password = $this->input->post('password');
        $admin_username = 'admin';
        $admin_password = 'admin';

        // Access the user registration database for login username and password

        $db_password = $this->Registration_model->getPassword($given_username);
        // If successfully Logged In
        if (password_verify($given_password, $db_password)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $given_username;
            redirect('homepage/second');

        } else if ($given_username === $admin_username && $given_password === $admin_password) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $given_username;
            $this->load->view('pages/admin_page');
        } else {
            $_SESSION['logged_in'] = false;
            redirect('homepage/index');
        }

    }

    public function validation()
    {
        $this->form_validation->set_rules('reg_username', 'Name', 'required|trim|is_unique[register_user.name]');
        $this->form_validation->set_rules('reg_email', 'Email Address', 'required|trim|valid_email|is_unique[register_user.email]');
        $this->form_validation->set_rules('reg_password', 'Password', 'required|trim');
        if ($this->form_validation->run()) {
            $plain_password = $this->input->post('reg_password');
            $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
            $data = array(
                'name' => $this->input->post('reg_username'),
                'email' => $this->input->post('reg_email'),
                'password' => $hashed_password,
            );
            $id = $this->Registration_model->insert($data);
            // TODO create a pop up modal for registration verification
            if ($id > 0) {
                // $data['message'] = 'Registration complete, you can now login.';
                // $data['return_url'] = 'index';
                $data['page'] = 'pages/first';
                $this->load->view('menu/content', $data);
            }
        } else {
            // display validation error
            $this->index();
        }
    }

}

/* End of file Homepage.php */
/* Location: ./application/controllers/Homepage.php */