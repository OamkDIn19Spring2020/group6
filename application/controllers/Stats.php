<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stats extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('stats_model');
    }

    public function index()
    {
        $data['page'] = 'stats/stats_view';
        $this->load->view('stats/menu/content_view', $data);
    }

    public function validation()
    {
        $this->form_validation->set_rules('user_weight', 'Weight', 'required|trim');
        $this->form_validation->set_rules('user_height', 'Height', 'required|trim');
        $this->form_validation->set_rules('user_age', 'Age', 'required|trim');
        if ($this->form_validation->run()) {
            $plain_password = $this->input->post('reg_password');
            $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
            $data = array(
                'weight' => $this->input->post('user_weight'),
                'height' => $this->input->post('user_height'),
                'age' => $this->input->post('user_age'),
            );
            $id = $this->stats_model->insert($data);

        }
    }
}

/* End of file Stats.php */
/* Location: ./application/controllers/Stats.php */