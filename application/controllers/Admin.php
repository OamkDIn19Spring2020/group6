<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Purchase_model');
        $this->load->model('Program_model');
    }

    // ------------------------------------------------------------------------

    public function index()
    {
        // This links to the customers/main page in admin dashboard
        $data['customers'] = $this->User_model->get_users();
        $data['page'] = 'admin/customers_view';
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
    public function orders()
    {
        $data['products'] = $this->Purchase_model->get();
        $data['page'] = 'admin/orders_view';
        $this->load->view('admin/menu/content_view', $data);
    }

    // ------------------------------------------------------------------------

    // This links to the programs page in admin dashboard
    public function programs()
    {

        $data['page'] = 'admin/programs_view';
        $this->load->view('admin/menu/content_view', $data);
    }

    // ------------------------------------------------------------------------

    // This is used in calendar_view
    // It is called after user closes the purchase_confirmed modal inside views/products
    public function show_programs()
    {
        // TODO needs to load when user buys product
        // if ($_SESSION['program'] == 0) {
        //     $data['page'] = 'user/user_view';
        //     $this->load->view('user/menu/content_view', $data);
        // } else {
        // }

        $data["program"] = $this->Program_model->get();
        $data['page'] = 'user/calendar_view';
        $this->load->view('user/menu/content_view', $data);
    }

    // ------------------------------------------------------------------------

    // Used on Programs_view page
    public function insert_program()
    {
        $data = array(
            'week_number' => $this->input->post('wnum'),
            'day_number' => $this->input->post('day'),
            'program_name' => $this->input->post('program'),
            'program_plan' => $this->input->post('workout'),
        );
        $result = $this->Program_model->insert($data);
        $data = $this->Program_model->get($result);
        // echo '<pre>';
        // print_r($data[0]['program_id']);
        // $this->output->enable_profiler(true);

        $program = $data[0]['program_plan'];
        // echo '<pre>';
        // print_r($program_id);
        // $this->output->enable_profiler(true);

        if ($result > 0) {
            $data['message'] = $program;
            $data['return_url'] = 'programs';
            $data['page'] = 'admin/example_program_view';
            $this->load->view('admin/menu/content_view', $data);
        }

        // $data['page'] = 'admin/programs_view';
        // $this->load->view('admin/menu/content_view', $data);
    }

    // ------------------------------------------------------------------------

    // Used on Customers_view page
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
            $this->load->view('admin/menu/content_view', $data);
        } else {
            $data['message'] = 'User details updated successfully';
            $data['return_url'] = 'customers';
            $data['page'] = 'admin/feedback_modal';
            $this->load->view('admin/menu/content_view', $data);
        }
    }

    function add_user(){
        
        $insert_data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email')
        );
        $this->User_model->insert($insert_data);
        // echo 'Data Inserted';

    
    }
    function delete_user(){
    $user_id=$this->input->post('user_id');
    $test=$this->User_model->delete_user($user_id);
    if($test==0){
        $data['message']='You can not delete this user';
        $data['return_url']='customers';
        $data['page']='admin/feedback_modal';
        $this->load->view('admin/menu/content_view',$data);
    }
    else{
        $data['message']='User deleted succesfully';
        $data['return_url']='customers';
        $data['page']='admin/feedback_modal';
        $this->load->view('admin/menu/content_view',$data);
    }
    }

    // ------------------------------------------------------------------------

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */