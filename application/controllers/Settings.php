<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->model('Settings_model');
    }

    // ------------------------------------------------------------------------

    public function index()
    {
        $data['page'] = 'settings/manage_account_view';
        $this->load->view('settings/menu/content_view', $data);
    }

    public function submit() {
        $this->load->model("Settings_model");
        $name = $_SESSION['username'];
            $query = $this->db->get_where('user_stats', array('name' => $name));
            $num = $query->num_rows();      
            $data = array(
                'birthyear' => $this->input->post('user_age'),
                'gender' => $this->input->post('gender'),
                'email' => $this->input->post('user_email')
            );
        $this->Settings_model->update($data);
        $data['page'] = 'settings/manage_account_view';
        $this->load->view('settings/menu/content_view', $data);
    }

    public function change_password_view() {
        $data['page'] = 'settings/change_password';
        $this->load->view('settings/menu/content_view', $data);
    }

    public function change_pass() {

        $this->form_validation->set_rules('old_password', 'old password', 'required|trim');
        $this->form_validation->set_rules('new_password', 'new password', 'required|trim');
        $this->form_validation->set_rules('confirm_new_password', 'confirmation', 'required|trim|matches[new_password]');

        if ($this->form_validation->run() == false) {
            $data['page'] = 'settings/change_password';
            $this->load->view('home/menu/content_view', $data);
        } else { 
            $old2 = $this->input->post('old_password');
            $new = $this->input->post('new_password');
            $confirm = $this->input->post('confirm_new_password');
            $name = $_SESSION['username'];
            $this->db->where('username', $name);
            $q = $this->db->get('user_database');
            $data = $q->result_array();
            $old1 = $data[0]['password'];
            if (password_verify($old2, $old1)) {
                $id = $this->Settings_model->update_password($new);
                $this->load->view('settings/password_changed');
            } else {
                $message = "Wrong password";
                echo "<script type='text/javascript'>alert('$message');</script>";
                $data['page'] = 'settings/change_password';
                $this->load->view('home/menu/content_view', $data);
            }
        }
    }
}