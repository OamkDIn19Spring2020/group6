<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PulseUp extends CI_Controller
{

    public function index()
    {
        $data['page'] = 'pages/first';
        $this->load->view('menu/content', $data);
    }
    //Before login page
    public function first()
    {

    }
    //After login page
    public function second()
    {
        $data['page'] = 'pages/second';
        $this->load->view('menu/content', $data);
    }

}