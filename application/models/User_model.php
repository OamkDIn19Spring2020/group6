<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    // Refs: CRUD_model
    protected $_table = 'user_database';
    protected $_primary_key = 'user_id';

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------
    /**
     *
     * @usage inside the controller
     * All:$this->user_model->get();
     * Single:$this->user_model->get(2);
     *
     */
    // Used in Home controller login function for $admin_data
    public function get($user_id = null)
    {
        if ($user_id === null) {
            $query = $this->db->get('user_database');
        } elseif (is_array($user_id)) {
            $query = $this->db->get_where('user_database', $user_id);
        } else {
            $query = $this->db->get_where('user_database', ['user_id' => $user_id]);
        }
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
        $this->db->insert('user_database', $data);
        return $this->db->insert_id();

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
    // function used my admin on customer page
    public function update_user($user_id, $update_data)
    {
        if (!is_numeric($user_id) == 1) {
            $this->db->where('user_id', $user_id);
            $this->db->update('user_database', $update_data);
            return $this->db->affected_rows();
        }
    }

    // ------------------------------------------------------------------------

    /**
     * @usage $this->User_model->delete(2);
     *        $this->user_model->delete(array('name' => 'markus'))
     */
    public function delete_user($user_id)
    {
        if (!is_numeric($user_id) == 1) {
            if (is_numeric($user_id)) {
                $this->db->where($this->_primary_key, $user_id);
            } elseif (is_array($user_id)) {
                foreach ($user_id as $_key => $_value) {
                    $this->db->where($_key, $_value);
                }
            } else {
                die("You must pass a parameter to the DELETE() method.");
            }
            $this->db->delete($this->_table);
            return $this->db->affected_rows();
        }

    }

    // ------------------------------------------------------------------------

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */