<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_model extends CI_Model
{

    // ------------------------------------------------------------------------

    // Refs: CRUD_model
    protected $_table = 'purchase_database';
    protected $_primary_key = 'purchase_id';

    // ------------------------------------------------------------------------
    /**
     *
     * @usage inside the controller
     * All: $this->user_model->get();
     * Single: $this->user_model->get(2);
     * Custom: $this->user_model->get(array('any' => 'param') );
     *
     */
    // Used in Admin controller
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
     *
     * @param array $data
     *
     * @usage In User controller register function
     * $result = $this->user_model->insert(['username' => 'John']);
     *
     */

    public function insert($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();

    }

    // ------------------------------------------------------------------------

    public function get_purchase_data()
    {
        $name = $_SESSION['username'];
        $this->db->from($this->_table);
        $this->db->where('username', $name);
        $query = $this->db->get();
        return $query->result_array();
    }

    // ------------------------------------------------------------------------

}

/* End of file Purchase_model.php */
/* Location: ./application/models/Purchase_model.php */