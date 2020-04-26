<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings_model extends CI_Model
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

    public function update($data) {
        extract($data);
        $name = $_SESSION['username'];

        if ($data['birthyear'] != NULL) {
            $this->db->where('username', $name);
            $this->db->update('user_database', array('birthyear' => $data['birthyear']));
        }
        if ($data['gender'] != NULL) {
            $this->db->where('username', $name);
            $this->db->update('user_database', array('gender' => $data['gender']));
        }
        if ($data['email'] != NULL) {
            $this->db->where('username', $name);
            $this->db->update('user_database', array('email' => $data['email']));
        }
        return true;
    }

    public function update_password($new) {
        $hashed_password = password_hash($new, PASSWORD_DEFAULT);
        $name = $_SESSION['username'];
        $this->db->where('username', $name);
        echo $new;
        $this->db->update('user_database', array('password' => $hashed_password));
    }

}