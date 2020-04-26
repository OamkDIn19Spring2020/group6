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
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-sm btn-outline-add" data-toggle="modal"
                            data-target="#addModal">Add User</button>
                    </div>

                </div>
            </div>

            <h2>Customers</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
foreach ($customers as $row) {
    echo '<tr>';
    echo '<td>' . $row['user_id'] . '</td><td>' . $row['username'] . '</td><td>' . $row['email'] . '</td>';
    echo '<td><button type="button" id="editBtn" class="btn btn-primary myBtn" data-toggle="modal"
            data-target="#editModal" data-user_id="' . $row['user_id'] . '" data-username="' . $row['username'] . '" data-email="' . $row['email'] . '">
            Edit
          </button></td>';
    echo '<td><button type="button" id="deleteBtn" class="btn btn-danger myBtn" data-toggle="modal" data-target="#deleteModal"
            data-user_id="' . $row['user_id'] . '" data-name="' . $row['username'] . '" data-author="' . $row['email'] . '">Delete</button></td>';
    echo '</tr>';
}

?>
                    </tbody>
                </table>
                <!-- addModal -->
                <div class="modal fade" id="addModal" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modalcontent">
                            <div class="modal-header">
                                <h5 class="modal-title">Add a User</h5>
                            </div>
                            <div class="modal-body">
                                <form class="" action="<?php echo site_url('admin/add_user'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="add_username">User Name</label> <br>
                                        <input type="text" class="input" id="add_username" name="username" value="">
                                        <br>
                                        <label for="add_password">Password</label> <br>
                                        <input type="password" class="input" id="add_password" name="password" value="">
                                        <br>
                                        <label for="add_email">Email</label> <br>
                                        <input type="email" class="input" id="add_email" name="email" value=""> <br>
                                    </div>
                                    <input type="submit" class="btn" name="" value="Add">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- editModal -->
                <div class="modal fade  editModal" id="editModal" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modalcontent">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit User</h5>
                            </div>
                            <div class="modal-body">
                                <form class="" action="<?php echo site_url('admin/edit_user'); ?>" method="post">
                                    <div class="form-group">
                                        <input type="hidden" class="input" id="edit_user_id" name="user_id" value="">
                                        <label for="edit_username">Edit Username</label> <br>
                                        <input type="text" class="input" id="edit_username" name="username" value="">
                                        <br>

                                        <label for="edit_email">Edit Email</label> <br>
                                        <input type="text" class="input" id="edit_email" name="email" value=""> <br>
                                    </div>
                                    <input type="submit" class="btn" name="" value="Update">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- deleteModal -->
                <div class="modal fade" id="deleteModal" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modalcontent">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete User</h5>
                            </div>
                            <div class="modal-body">
                                <form class="" action=<?php echo site_url('admin/delete_user'); ?> method="post">
                                    <div class="form-group">
                                        <input type="hidden" id="delete_user_id" name="user_id" value=""><br>
                                        <h3>Are you sure you want to delete this User?</h3>
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
$(document).on("click", '#addModal', function(e) {
    console.log("Update modal open");
    var username = $(this).data('username');
    var email = $(this).data('email');
    console.log('user_id = ' + user_id);

    $("#add_username").val(username);
    $("#add_email").val(email);
});
$(document).on("click", '#editBtn', function(e) {
    console.log("Update modal open");
    var user_id = $(this).data('user_id');
    var username = $(this).data('username');
    var email = $(this).data('email');
    console.log('user_id = ' + user_id);

    $("#edit_user_id").val(user_id);
    $("#edit_username").val(username);
    $("#edit_email").val(email);
});
$(document).on("click", '#deleteBtn', function(e) {
    console.log("delete modal open");
    var user_id = $(this).data('user_id');
    var username = $(this).data('username');
    var email = $(this).data('email');
    console.log('user_id = ' + user_id);

    $("#delete_user_id").val(user_id);
    $("#delete_username").val(username);
    $("#delete_email").val(email);
});
</script>