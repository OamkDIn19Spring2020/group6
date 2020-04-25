<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');

    }

    // ------------------------------------------------------------------------

    // This is the front page or home page
    public function index()
    {
        $data['page'] = 'home/home_view';
        $this->load->view('home/menu/content_view', $data);
    }

    // ------------------------------------------------------------------------

    public function register()
    {
        $data['page'] = 'home/register_view';
        $this->load->view('home/menu/content_view', $data);
    }

    // ------------------------------------------------------------------------

    public function login()
    {

        // Gets username and password
        $given_username = $this->input->post('username');
        $given_password = $this->input->post('password');

        // Hardcoded to use admin username and pass -> 1=user_id in database
        $admin_data = $this->user_model->get(1);
        $admin_username = $admin_data[0]['username'];
        $admin_password = $admin_data[0]['password'];

        $db_password = $this->user_model->get_password($given_username);
        if (password_verify($given_password, $db_password)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $given_username;
            // redirects to User controller index when logged in successfully
            redirect('user');
        } elseif ($given_password === $admin_data[0]['password']) {
            redirect('admin/index');
        } else {
            // redirects to registration page
            redirect('home/register');
        }

    }

    // ------------------------------------------------------------------------

}

/* End of file Homepage.php */
/* Location: ./application/controllers/Homepage.php */