<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('registration_model');
    }

    public function index()
    {
        $data['page'] = 'pages/first';
        $this->load->view('menu/content', $data);
    }

    public function show_login()
    {

        redirect('pulseup/index');
    }

    public function validation()
    {
        $this->form_validation->set_rules('reg_username', 'Name', 'required|trim');
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
            $id = $this->registration_model->insert($data);
            // TODO create a pop up modal for registration verification
            if ($id > 0) {
                $data['message'] = 'Registration complete, you can now login.';
                $data['return_url'] = 'show_login';
                $data['page'] = 'feedback/reg_confirmation';
                $this->load->view('menu/content', $data);
            }
        } else {
            // display validation error
            $this->index();
        }
    }

}

/* End of file Registration.php */
/* Location: ./application/controllers/Registration.php */