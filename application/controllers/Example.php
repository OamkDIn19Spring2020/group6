<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Example extends CI_Controller
{

    public function index()
    {
        // echo 'I am the index method in Exampe-controller';
        // $this->load->view('menu/example');
    }
    //Before login page
    public function first()
    {
        $data['page'] = 'pages/first';
        $this->load->view('menu/content', $data);
    }
    //After login page
    public function second()
    {
        $data['page'] = 'pages/second';
        $this->load->view('menu/content', $data);
    }

}