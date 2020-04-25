<div class="row no-gutters">
    <div class="no-gutters" style="width: 20%; flex: 0 0 20%;max-width: 20%;"></div>
    <div class="col-md-5 no-gutters">
        <?php
if ($this->session->flashdata('message')) {
    echo '
                            <div class="alert alert-success>
                                ' . $this->session->flashdata("message") . ' test
                            </div>
                            ';
}
?>
        <div id="logo" class="text-center ml-5 mt-2"><img src="<?=base_url()?>assets/img/logo_img/PULSEUP.png"></div>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Products</h1>
        </div>
        <div class="card-deck mb-1 text-center">

            <?php
$new_page = site_url('products/confirm_purchase');
foreach ($product as $row) {
    echo '<div class="card mb-2 shadow-sm">
    <div class="card-header">
        <h4 class="my-0 font-weight-normal">' . $row['product_name'] . '</h4>
    </div>
    <div class="card-body">
                <h1 class="card-title pricing-card-title">€' . $row['product_price'] . ' <small class="text-muted">/ mo</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>' . $row['description_one'] . '</li>
                    <li>' . $row['description_two'] . '</li>
                    <li>' . $row['description_three'] . '</li>
                    <li>' . $row['description_four'] . '</li>
                </ul>
                <form action="' . $new_page . '" method="post">
                <input type="text" hidden name="product_id" value="' . $row['product_id'] . '">
                <input type="text" hidden name="product_price" value="' . $row['product_price'] . '">
                <input type="text" hidden name="product_name" value="' . $row['product_name'] . '">
                <button type="submit" id="productBtn"
        class="btn btn-lg btn-block btn-primary add_product" name="add_product"
        data-product_name=" ' . $row['product_name'] . '" data-product_price="' . $row['product_price'] . '"
        data-product_id="' . $row['product_id'] . '">' . $row['product_name'] . '
    </button>
    </form>
        </div>
    </div>';
}

?>
        </div>
    </div>
    <div class="col-md-3 no-gutters ml-5 mt-5">
        <div id="sideBar align-items-center">
            <div id="sideBar">
                <div class="userDetails">
                    <div id="avatar">
                        <img src="<?=base_url()?>assets/img/user_img/avatar.png">
                    </div>
                    <div id="username">
                        <?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    echo ucwords($_SESSION['username']);
} else {
    echo 'Guest';
}
?>
                    </div>
                    <div class="navigation">
                        <div><a href="<?=site_url('user')?>">Calendar</a></div>
                        <div>Manage Account</div>
                        <div><a href="<?=site_url('stats')?>">Stats</a></div>
                        <div><a href="<?=site_url('products')?>">Products</a></div>
                        <div><a href="<?=site_url('purchase_history')?>">Purchase history</a></div>
                        <span class="mt-3"><a id="logout-button" href="<?=site_url('user/logout')?>"><img
                                    src="<?=base_url()?>assets/img/user_img/logout.png"></a></span>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-md-2 no-gutters ml-5 mt-5"></div>
</div>