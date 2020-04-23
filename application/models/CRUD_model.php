<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CRUD_model extends CI_Model
{

    // This means child class can access this model (eg: user_model)
    protected $_table = null;
    protected $_primary_key = null;

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------
    /**
     *
     * @usage inside the controller
     * All: $this->user_model->get();
     * Single: $this->user_model->get(2);
     * Custom: $this->user_model->get(array('any' => 'param') );
     *
     */
    // Used in Home controller login function for $admin_data
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

    // Used in Home controller login function for $db_password
    public function get_password($given_username)
    {
        $this->db->select('password');
        $this->db->from('user_database');
        $this->db->where('username', $given_username);
        return $this->db->get()->row('password');
    }

    // ------------------------------------------------------------------------

    // Used in Purchase_history controller
    public function get_purchase_data()
    {
        $name = $_SESSION['username'];
        $this->db->from($this->_table);
        $this->db->where('username', $name);
        $query = $this->db->get();
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

    // Function called in admin controller
    public function get_users()
    {
        $this->db->select('user_id, username, email');
        $this->db->from('user_database');
        // $query = $this->db->get('user_database');
        return $this->db->get()->result_array();
    }

    // ------------------------------------------------------------------------
    // Function called in Purchase_history controller
    public function get_products()
    {
        $this->db->select('product_id, product_name, product_price');
        $this->db->from($this->_table);
        return $this->db->get()->result_array();
    }

    // ------------------------------------------------------------------------
    // function used my admin on customer page
    public function update_user($user_id, $update_data)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('user_database', $update_data);
        return $this->db->affected_rows();
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

}

/* End of file CRUD_model.php */
/* Location: ./application/models/CRUD_model.php */