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

    public function submit() {
            $name = $_SESSION['username'];
            $query = $this->db->get_where('user_stats', array('name' => $name));
            $num = $query->num_rows();      
            $data = array(
                'name' => $name,
                'weight' => $this->input->post('user_weight'),
                'height' => $this->input->post('user_height'),
                'age' => $this->input->post('user_age'),
                'gender' => $this->input->post('gender'),
                'DateTime' => date('Y-m-d')
            );
            $id = $this->stats_model->insert($data);
            $data['page'] = 'stats/stats_view';
            $this->load->view('stats/menu/content_view', $data);
        } 


    public function view_progress() {
        $name = $_SESSION['username'];
        $query = $this->db->query("SELECT weight as count FROM user_stats WHERE NAME = '$name' "); 
        $data['weight'] = json_encode(array_column($query->result(), 'count'),JSON_NUMERIC_CHECK);
        $query = $this->db->query("SELECT DateTime as count FROM user_stats WHERE NAME = '$name' "); 
        $data['dateTime'] = json_encode(array_column($query->result(), 'count'),JSON_NUMERIC_CHECK);
        if ($query->num_rows() > 0) {
            $this->load->view('stats/progress',$data);
        } else {
            $this->load->view('stats/error',$data);
        }

    }

    public function nutrition_info() {
        $result['data']=$this->stats_model->get_specific_data();
        $value = json_decode(json_encode($result['data']), true);
        if (empty($value)) {
            $this->load->view('stats/error');
        } else {
        if (($value[0]['weight']) != 0 && $value[0]['height'] != 0 && $value[0]['gender'] ) {
        $this->load->view('stats/nutrition_info',$result);
        } else {
            $this->load->view('stats/error');
        }
    }
    }



    public function clear_data() {
        $id = $this->stats_model->clear_data();
        $name = $_SESSION['username'];
        $this->load->view('stats/progress');
    }

}

/* End of file Stats.php */
/* Location: ./application/controllers/Stats.php */