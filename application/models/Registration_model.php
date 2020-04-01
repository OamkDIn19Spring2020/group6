<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration_model extends CI_Model
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
        $this->db->insert('register_user', $data);
        return $this->db->insert_id();
    }

    public function addUser($insert_data)
    {
        $this->db->db_debug = false;
        // insert(table name, data to be sent)
        $this->db->insert('register_user', $insert_data);
        return $this->db->affected_rows();

    }

    public function getPassword($reg_username)
    {
        $this->db->select('password');
        $this->db->from('register_user');
        $this->db->where('name', $reg_username);
        return $this->db->get()->row('password');
    }

}

/* End of file Registration_model_model.php */
/* Location: ./application/models/Registration_model_model.php */