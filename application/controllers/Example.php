<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Example extends CI_Controller
{

    public function index()
    {
        // echo 'I am the index method in Exampe-controller';
        // $this->load->view('menu/example');
    }
    public function first()
    {
        echo 'I am the first method in Example-controller';
        $data['page'] = 'example/first';
        $this->load->view('menu/content', $data);
    }
    public function second()
    {
        $data['page'] = 'example/second';
        $this->load->view('menu/content', $data);
    }

}