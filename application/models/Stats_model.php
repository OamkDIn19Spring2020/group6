<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stats_model extends CI_Model
{

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------
    public function index()
    {
        //
    }

    // ------------------------------------------------------------------------

    public function insert($data)
    {
        $this->db->insert('user_stats', $data);
        return $this->db->insert_id();
    }

    public function upddata($data) {
        extract($data);
        $this->db->where('name', $data['name']);
        $this->db->update('user_stats', array('weight' => $data['weight']));
        $this->db->where('name', $data['name']);
        $this->db->update('user_stats', array('height' => $data['height']));
        $this->db->where('name', $data['name']);
        $this->db->update('user_stats', array('age' => $data['age']));
        return true;
    }

    public function get_data() {
        $name = $_SESSION['username'];
        $this->db->from("user_stats");
        $this->db->where('name', $name);
        $query = $this->db->get();  
        return $query->result();
    }

    public function get_specific_data() {
        $name = $_SESSION['username'];
        $this->db->from("user_stats");
        $this->db->where('name', $name);
        $this->db->order_by('stats_id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();  
        return $query->result();
    }

    public function clear_data() {
        $name = $_SESSION['username'];
        $this->db->where('name', $name);
        $this->db->delete('user_stats');
    }


}

/* End of file Registration_model_model.php */
/* Location: ./application/models/Registration_model_model.php */