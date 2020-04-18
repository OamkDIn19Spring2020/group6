<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    // ------------------------------------------------------------------------

    public function index()
    {
        //
        $data['page'] = 'admin/dashboard_view';
        $this->load->view('admin/menu/content_view', $data);
    }

    // ------------------------------------------------------------------------

    // This links to the customers page in admin dashboard
    public function customers()
    {
        $data['members'] = $this->User_model->get_users();
        // print_r($data);
        $data['page'] = 'admin/customers_view';
        $this->load->view('admin/menu/content_view', $data);
    }

    // ------------------------------------------------------------------------

    // This links to the products page in admin dashboard
    public function products()
    {
        // TODO
        // $data['products'] = $this->User_model->get_products();
        // print_r($data);
        $data['page'] = 'admin/products_view';
        $this->load->view('admin/menu/content_view', $data);
    }

    // ------------------------------------------------------------------------
    public function edit_user()
    {
        $user_id = $this->input->post('user_id');
        $update_data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
        );
        // print_r($this->input->post());
        // print_r($update_data);
        $test = $this->User_model->update_user($user_id, $update_data);
        if ($test == 0) {
            $data['message'] = 'You can not update this user';
            $data['return_url'] = 'customers';
            $data['page'] = 'admin/feedback_modal';
            $this->load->view('admin/menu/content', $data);
        } else {
            // redirect('book/show_books');
            $data['message'] = 'User details updated successfully';
            $data['return_url'] = 'customers';
            $data['page'] = 'admin/feedback_modal';
            $this->load->view('admin/menu/content', $data);
        }
    }

    // ------------------------------------------------------------------------

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */