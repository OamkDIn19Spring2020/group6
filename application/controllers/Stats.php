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
        $data['page'] = 'pages/stats';
        $this->load->view('menu/content', $data);
    }

    public function validation() {
            $name = $_SESSION['username'];
            $query = $this->db->get_where('user_stats', array('name' => $name));
            $num = $query->num_rows();      
            if ($num == 0) {
            $data = array(
                'name' => $name,
                'weight' => $this->input->post('user_weight'),
                'height' => $this->input->post('user_height'),
                'age' => $this->input->post('user_age')
            );
            $id = $this->stats_model->insert($data);
            } else {
                $data = array(
                    'name' => $name,
                    'weight' => $this->input->post('user_weight'),
                    'height' => $this->input->post('user_height'),
                    'age' => $this->input->post('user_age')
                );
                $id = $this->stats_model->upddata($data);
                $this->load->view('pages/stats', $data);
            }
        }
}



/* End of file Stats.php */
/* Location: ./application/controllers/Stats.php */