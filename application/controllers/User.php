<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------

    public function index()
    {
        // Inside views/user/user_view
        // This is first page user sees after they login
        $data['page'] = 'user/user_view';
        $this->load->view('user/menu/content_view', $data);
    }

    // ------------------------------------------------------------------------

    // Logout will destroy user session and redirect back to home page
    public function logout()
    {
        session_destroy();
        redirect('/');
    }

    // ------------------------------------------------------------------------

    // When user fills in details on Registration form it is stored with this function
    public function register()
    {
        $this->form_validation->set_rules('reg_username', 'Name', 'required|trim|is_unique[user_database.username]');
        $this->form_validation->set_rules('reg_email', 'Email Address', 'required|trim|valid_email|is_unique[user_database.email]');
        $this->form_validation->set_rules('reg_password', 'Password', 'required|trim');
        $this->load->model('user_model');
        if ($this->form_validation->run()) {
            $plain_password = $this->input->post('reg_password');
            $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
            $data = array(
                'username' => $this->input->post('reg_username'),
                'email' => $this->input->post('reg_email'),
                'password' => $hashed_password,
            );
            $id = $this->user_model->insert($data);
            if ($id > 0) {
                $data['message'] = 'Registration complete, you can now login.';
                $data['return_url'] = 'return_to_login';
                $data['page'] = 'home/confirm_reg_view';
                $this->load->view('home/menu/content_view', $data);
            }
        } else {
            // display validation error
            $this->index();
        }
    }

    // ------------------------------------------------------------------------

    public function return_to_login()
    {
        // redirected here to login with new username and password
        redirect('/');
    }

    // ------------------------------------------------------------------------

    public function stats()
    {
        // go to stats page
        $data['page'] = 'stats/stats_view';
        $this->load->view('stats/menu/content_view', $data);
    }

}

/* End of file User_dashboard.php */
/* Location: ./application/controllers/User_dashboard.php */