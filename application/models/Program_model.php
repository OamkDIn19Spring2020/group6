<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program_model extends CI_Model
{

    // ------------------------------------------------------------------------

    // Refs: CRUD_model
    protected $_table = 'program_database';
    protected $_primary_key = 'program_id';

    // ------------------------------------------------------------------------
    /**
     *
     * @usage inside the controller
     * All: $this->user_model->get();
     * Single: $this->user_model->get(2);
     * Custom: $this->user_model->get(array('any' => 'param') );
     *
     */
    public function get($id = null, $order_by = null)
    {

        if (is_numeric($id)) {
            $this->db->where($this->_primary_key, $id);
        }
        if (is_array($id)) {
            foreach ($id as $_key => $_value) {
                $this->db->where($_key, $_value);
            }
        }
        // _table is referenced at beginning of the class
        $query = $this->db->get($this->_table);
        return $query->result_array();

    }

    // ------------------------------------------------------------------------

    /**
     * @param array $data
     * @usage In User controller register function
     * $result = $this->user_model->insert(['username' => 'John']);
     */
    public function insert($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();

    }

    // ------------------------------------------------------------------------

}

/* End of file Program_model.php */
/* Location: ./application/models/Program_model.php */