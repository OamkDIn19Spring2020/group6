<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_accounts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['page'] = 'pages/user_account';
        $this->load->view('menu/content', $data);
    }

}

/* End of file User_accounts.php */
/* Location: ./application/controllers/User_accounts.php */