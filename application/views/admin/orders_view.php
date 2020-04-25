<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?=site_url('admin')?>">PulseUP</a>
    <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
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
                        <a class="nav-link" href="<?=site_url('admin/programs')?>">
                            Programs
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
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
foreach ($products as $row) {
    echo '<tr>';
    echo '<td>' . $row['username'] . '</td><td>' . $row['product_id'] . '</td><td>' . $row['product_name'] . '</td><td>' . $row['product_price'] . '</td>';
    echo '<td><button type="button" id="editBtn" class="btn btn-primary myBtn" data-toggle="modal"
            data-target="#editModal" data-purchase_id="' . $row['purchase_id'] . '" data-username="' . $row['username'] . '" data-product_name="' . $row['product_name'] . '">
            Edit
          </button></td>';
    echo '<td><button type="button" id="deleteBtn" class="btn btn-danger myBtn" data-toggle="modal" data-target="#deleteModal"
            data-purchase_id="' . $row['purchase_id'] . '" data-username="' . $row['username'] . '" data-product_name="' . $row['product_name'] . '">Delete</button></td>';
    echo '</tr>';
}

?>
                </tbody>
            </table>