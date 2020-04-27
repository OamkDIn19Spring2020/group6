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

    public function get_product_one($id = null, $order_by = null)
    {

        $query = $this->db->where(array('product_id' => '1'));

        if ($query) {
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

    /**
     * @usage $result = $this->user_model->update(['username' => 'Paggey], 3);
     *                  $this->user_model->update(['username' => 'Paggey], ['date_created' => '0']);
     */

    public function update($new_data, $where)
    {
        if (is_numeric($where)) {
            $this->db->where($this->_primary_key, $where);

        } elseif (is_array($where)) {
            foreach ($where as $_key => $_value) {
                $this->db->where($_key, $_value);
            }
        } else {
            die("You must pass a second parameter to the UPDATE() method.");
        }

        $this->db->update($this->_table, $new_data);
        return $this->db->affected_rows();
    }

    // ------------------------------------------------------------------------

    /**
     * if the record exists its going to update if not it will insert
     * @usage insert_update(['username' => 'ted'], )
     */

    public function insert_update($data, $id = false)
    {
        if (!$id) {
            die("You must pass a second parameter to the insertUPDATE() method.");

        }
        $this->db->select($this->_primary_key);
        $this->db->where($this->_primary_key, $id);
        $query = $this->db->get($this->_table);
        $result = $query->num_rows();
        if ($result == 0) {
            // Insert
            return $this->insert($data);
        }

        // Update
        return $this->update($data, $id);

    }

    // ------------------------------------------------------------------------

    /**
     * @usage $this->User_model->delete(2);
     *        $this->user_model->delete(array('name' => 'markus'))
     */
    public function delete($id)
    {
        if (is_numeric($id)) {
            $this->db->where($this->_primary_key, $id);
        } elseif (is_array($id)) {
            foreach ($id as $_key => $_value) {
                $this->db->where($_key, $_value);
            }
        } else {
            die("You must pass a parameter to the DELETE() method.");
        }
        $this->db->delete($this->_table);
        return $this->db->affected_rows();
    }

    // ------------------------------------------------------------------------

}

/* End of file Program_model.php */
/* Location: ./application/models/Program_model.php */