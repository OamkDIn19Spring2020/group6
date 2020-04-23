<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_model extends CRUD_model
{

    // ------------------------------------------------------------------------

    // Refs: CRUD_model
    protected $_table = 'purchase_database';
    protected $_primary_key = 'product_id, user_id';

    // ------------------------------------------------------------------------

}

/* End of file Purchase_model.php */
/* Location: ./application/models/Purchase_model.php */