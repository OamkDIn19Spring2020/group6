<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->model('Purchase_model');
        $this->load->model('Program_model');
    }

    // ------------------------------------------------------------------------

    public function index()
    {
        // This links to the customers/main page in admin dashboard
        $data['customers'] = array_slice($this->User_model->get_users(), 1);
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
    // This links to the workouts page in admin dashboard
    public function workouts()
    {
        $data['workout'] = $this->Program_model->get(array('product_id' => '2'));
        $data['page'] = 'admin/workouts_view';
        $this->load->view('admin/menu/content_view', $data);
    }

    // ------------------------------------------------------------------------

    public function edit_workout()
    {
        $program_id = $this->input->post('program_id');
        $data = array(
            'title' => $this->input->post('title'),
            'workout_one' => $this->input->post('workout_one'),
            'workout_two' => $this->input->post('workout_two'),
            'workout_three' => $this->input->post('workout_three'),
            'sets_one' => $this->input->post('sets_one'),
        );
        $result = $this->Program_model->insert_update($data, $program_id);
        if ($result == 0) {
            $data['message'] = 'You can not update this workout program';
            $data['return_url'] = 'index';
            $data['page'] = 'admin/workouts_view';
            $this->load->view('admin/menu/content_view', $data);
        } else {
            $data['workout'] = $this->Program_model->get(array('product_id' => '2'));
            $data['page'] = 'admin/workouts_view';
            $this->load->view('admin/menu/content_view', $data);
        }

    }

    // ------------------------------------------------------------------------

    // Used on Programs_view page
    public function insert_program()
    {
        $this->form_validation->set_rules('week_number', 'Week', 'numeric');
        $this->form_validation->set_rules('day_number', 'Day', 'numeric');
        if ($this->form_validation->run() == false) {
            $data['message'] = 'Error workout not added.';
            $data['return_url'] = 'programs';
            $data['page'] = 'admin/admin_error';
            $this->load->view('admin/menu/content_view', $data);
        } else {
            $data = array(
                'week_number' => $this->input->post('week_number'),
                'day_number' => $this->input->post('day_number'),
                'product_id' => $this->input->post('product_id'),
                'title' => $this->input->post('title'),
                'workout_one' => $this->input->post('workout_one'),
                'workout_two' => $this->input->post('workout_two'),
                'workout_three' => $this->input->post('workout_three'),
                'workout_four' => $this->input->post('workout_four'),
                'workout_five' => $this->input->post('workout_five'),
                'sets_one' => $this->input->post('sets_one'),
                'sets_two' => $this->input->post('sets_two'),
            );
            $result = $this->Program_model->insert($data);
            if ($result > 0) {
                $data['message'] = 'New Workout Added To Database';
                $data['return_url'] = 'workouts';
                $data['page'] = 'admin/feedback_modal';
                $this->load->view('admin/menu/content_view', $data);
            }
        }
    }

    // ------------------------------------------------------------------------

    public function add_user()
    {
        $plain_password = $this->input->post('password');
        $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $hashed_password,
            'email' => $this->input->post('email'),
        );
        $test = $this->User_model->insert($data);
        if ($test == 0) {
            $data['message'] = 'User Was Not Added';
            $data['return_url'] = 'index';
            $data['page'] = 'admin/feedback_modal';
            $this->load->view('admin/menu/content_view', $data);
        } else {
            $data['message'] = 'User has been added';
            $data['return_url'] = 'index';
            $data['page'] = 'admin/feedback_modal';
            $this->load->view('admin/menu/content_view', $data);
        }
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

        $test = $this->User_model->update_user($user_id, $update_data);
        if ($test == 0) {
            $data['message'] = 'You can not update this user';
            $data['return_url'] = 'index';
            $data['page'] = 'admin/feedback_modal';
            $this->load->view('admin/menu/content_view', $data);
        } else {
            $data['message'] = 'User details updated successfully';
            $data['return_url'] = 'index';
            $data['page'] = 'admin/feedback_modal';
            $this->load->view('admin/menu/content_view', $data);
        }
    }

    // ------------------------------------------------------------------------

    public function delete_user()
    {
        $user_id = $this->input->post('user_id');
        $test = $this->User_model->delete_user($user_id);
        if ($test == 0) {
            $data['message'] = 'You can not delete this user';
            $data['return_url'] = 'index';
            $data['page'] = 'admin/feedback_modal';
            $this->load->view('admin/menu/content_view', $data);
        } else {
            $data['message'] = 'User Deleted';
            $data['return_url'] = 'index';
            $data['page'] = 'admin/feedback_modal';
            $this->load->view('admin/menu/content_view', $data);
        }
    }

    // ------------------------------------------------------------------------
    // Used on workouts_view page
    public function delete_workout()
    {
        $program_id = $this->input->post('program_id');
        $test = $this->Program_model->delete($program_id);
        if ($test == 0) {
            $data['message'] = 'You can not delete this workout';
            $data['return_url'] = 'workouts';
            $data['page'] = 'admin/feedback_modal';
            $this->load->view('admin/menu/content_view', $data);
        } else {
            $data['message'] = 'Workout Deleted';
            $data['return_url'] = 'workouts';
            $data['page'] = 'admin/feedback_modal';
            $this->load->view('admin/menu/content_view', $data);
        }
    }

    // ------------------------------------------------------------------------

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */