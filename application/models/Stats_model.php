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


}

/* End of file Registration_model_model.php */
/* Location: ./application/models/Registration_model_model.php */