<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Products_model");
        $this->load->model("Purchase_model");
    }

    public function index()
    {
        $data["product"] = $this->Products_model->get();
        $data['page'] = 'user/products_view';
        $this->load->view('user/menu/content_view', $data);
    }

    public function confirm_purchase()
    {
        $name = $_SESSION['username'];
        $data = array(
            'username' => $name,
            'product_id' => $this->input->post('product_id'),
            'product_price' => $this->input->post('product_price'),
            'product_name' => $this->input->post('product_name'),
            'date' => date('Y-m-d'),
        );
        $this->Purchase_model->insert($data);
        $data["product"] = $this->Purchase_model->get();
        $data['page'] = 'products/purchase_confirmed_view';
        $this->load->view('products/menu/content_view', $data);
    }

}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */