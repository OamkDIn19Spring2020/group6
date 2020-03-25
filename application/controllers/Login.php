<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_controller{

    public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function index()
  {
    $data['page']='first';
    $this->load->view('menu/content',$data);
  }
  public function login(){
    $given_username=$this->input->post('username');
    $given_password=$this->input->post('password');

    $real_username='admin';
    $real_password='admin';
    if($given_username===$real_username && $given_password===$real_password){
           $_SESSION['logged_in']=true;
           $_SESSION['username']=$given_username;
           redirect('example/second');
         }
  }

}



/* End of file filename.php */
