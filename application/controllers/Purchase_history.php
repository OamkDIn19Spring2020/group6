<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_history extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Products_model");
        $this->load->model("Purchase_model");
        $this->load->model("User_model");
    }

    // ------------------------------------------------------------------------

    public function index()
    {

        $data["product"] = $this->Purchase_model->get_purchase_data();

        // If the user has not purchased anything yet they are redirected to products page
        if (empty($data["product"])) {
            $data['page'] = 'products/no_purchase_view';
            $this->load->view('products/menu/content_view', $data);
        } else {
            // Else they can view their purchase history
            $data['page'] = 'products/purchase_history_view';
            $this->load->view('products/menu/content_view', $data);
        }
    }

    // ------------------------------------------------------------------------

}

/* End of file Purchase_history.php */
/* Location: ./application/controllers/Purchase_history.php */