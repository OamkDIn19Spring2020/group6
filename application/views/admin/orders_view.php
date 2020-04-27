<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?=site_url('admin')?>">PulseUP</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?=site_url('user/logout')?>">Sign out</a>
        </li>
    </ul>
</nav>
<div class="container-fluid" style="margin-top:50px;">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar ">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?=site_url('admin')?>">
                            Customers <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('admin/orders')?>">
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('admin/workouts')?>">
                            Workouts
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mb-5">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Admin Dashboard</h1>
            </div>

            <h2>Orders</h2>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Monthly Subscription €</th>
                        <!-- <th>Edit</th> -->
                        <!-- <th>Delete</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
foreach ($products as $row) {
    echo '<tr>';
    echo '<td>' . $row['username'] . '</td><td>' . $row['product_id'] . '</td><td>' . $row['product_name'] . '</td><td>' . $row['product_price'] . '</td>';
    // echo '<td><button type="button" id="editBtn" class="btn btn-primary myBtn" data-toggle="modal"
    //         data-target="#editModal" data-purchase_id="' . $row['purchase_id'] . '" data-username="' . $row['username'] . '" data-product_name="' . $row['product_name'] . '">
    //         Edit
    //       </button></td>';
    // echo '<td><button type="button" id="deleteBtn" class="btn btn-danger myBtn" data-toggle="modal" data-target="#deleteModal"
    //         data-purchase_id="' . $row['purchase_id'] . '" data-username="' . $row['username'] . '" data-product_name="' . $row['product_name'] . '">Delete</button></td>';
    echo '</tr>';
}

?>
                </tbody>
            </table>
            <!-- editModal -->
            <div class="modal fade  editModal" id="editModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modalcontent">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit User</h5>
                        </div>
                        <div class="modal-body">
                            <form class="" action="<?php echo site_url('admin/edit_product'); ?>" method="post">
                                <div class="form-group">
                                    <input type="hidden" id="edit_purchase_id" name="purchase_id" value="">
                                    <label for="edit_product_name">Edit Product Name</label> <br>
                                    <input type="text" id="edit_product_name" name="product_name" value=""> <br>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label for="edit_product_id">Edit Product Id</label> <br>
                                        <input type="text" id="edit_product_id" class="form-control" name="product_id"
                                            value="">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-6">
                                        <label for="edit_product_price">Edit Monthly Subscription</label> <br>
                                        <input type="text" id="edit_product_price" class="form-control"
                                            name="product_price" value="">
                                    </div>
                                </div>
                                <div class="form-row my-3">
                                    <input type="submit" class="btn" name="" value="Update">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- deleteModal -->
            <!-- TODO THIS IS TEMPLATE -->
            <div class="modal fade" id="deleteModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modalcontent">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Product</h5>
                        </div>
                        <div class="modal-body">
                            <form class="" action=<?php echo site_url('admin/delete_product'); ?> method="post">
                                <div class="form-group">
                                    <input type="hidden" id="delete_purchase_id" name="purchase_id" value=""><br>
                                    <h3>Are you sure you want to delete this Product?</h3>
                                </div>
                                <input type="submit" class="btn btn-danger" name="" value="Delete">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>
</div>
</div>
<script>
$(document).on("click", '#editBtn', function(e) {
    console.log("Update modal open");
    var purchase_id = $(this).data('purchase_id');
    var product_id = $(this).data('product_id');
    var product_name = $(this).data('product_name');
    var product_price = $(this).data('product_price');
    console.log('product_id = ' + product_id);
    $("#edit_purchase_id").val(purchase_id);
    $("#edit_product_id").val(product_id);
    $("#edit_product_name").val(product_name);
    $("#edit_product_price").val(product_price);
});
$(document).on("click", '#deleteBtn', function(e) {
    console.log("delete modal open");
    var purchase_id = $(this).data('purchase_id');
    console.log('purchase_id = ' + purchase_id);

    $("#delete_purchase_id").val(purchase_id);
});
</script>