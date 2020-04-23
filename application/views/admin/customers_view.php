Customers View Page
<a href="<?=site_url('admin')?>">Back</a>

<div class="table-container">
    <table class="table">
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
foreach ($members as $row) {
    echo '<tr>';
    echo '<td>' . $row['user_id'] . '</td><td>' . $row['username'] . '</td><td>' . $row['email'] . '</td>';
    echo '<td><button type="button" id="editBtn" class="btn btn-primary myBtn" data-toggle="modal"
            data-target="#editModal" data-user_id="' . $row['user_id'] . '" data-username="' . $row['username'] . '" data-email="' . $row['email'] . '">
            Edit
          </button></td>';
    echo '<td><button type="button" id="deleteBtn" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"
            data-user_id="' . $row['user_id'] . '" data-name="' . $row['username'] . '" data-author="' . $row['email'] . '">Delete</button></td>';
    echo '</tr>';
}

?>

        </tbody>
    </table>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
  Add User
</button>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" id="user_form" action="<?php echo site_url('admin/add_user'); ?>">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add User Info</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <label for="add_username">Username</label><br>
            <input type="text" id="add_username" name="username" value=""><br>
            <label for="add_email">Email</label><br>
            <input type="text" id="add_email" name="email" value=""><br>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="action" value="Add" />
        </div>
        </div>
    </form>
  </div>
</div>

<!-- editModal -->
<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit a Customer</h5>
            </div>
            <div class="modal-body">
                <form class="" action=<?php echo site_url('admin/edit_user'); ?> method="post">
                    <div class="form-group">
                        <input type="hidden" id="edit_user_id" name="user_id" value=""><br>
                        <label for="edit_username">Username</label><br>
                        <input type="text" id="edit_username" name="username" value=""><br>
                        <label for="edit_email">Email</label><br>
                        <input type="text" id="edit_email" name="email" value=""><br>
                    </div>
                    <input type="submit" class="btn btn-primary" name="" value="Update">
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
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure you want to delete this user?</h5>
            </div>
            <div class="modal-body">
                <form class="" action=<?php echo site_url('admin/delete_user'); ?> method="post">
                    <div class="form-group">
                        <input type="hidden" id="delete_user_id" name="user_id" value=""><br>
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
<script>
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

// $(document).on('submit', '$user_form', function(event){
//     event.preventDefault();
//     var userName = $('#username').val();
//     var eMail = $('#email').val();

//     if(userName != '' && eMail != ''){

//         $.ajax({
//             url:"<?php echo site_url('admin/add_user'); ?>",
//             method: 'POST';
//             data:new FormData(this),
//             contentType:false,
//             processData:false,
//             success:function(data){
//                 alert(data);
//                 $('user_form')[0].reset();
//                 $('#addModal').modal('hide');
//                 dataTable.ajax.reload();
//             }
//         });

//     }else{
//         alert("both fields are required");
//     }
// });

$(document).on("click", '#deleteBtn', function(e) {
    console.log("delete modal open");
    var userid = $(this).data('user_id');
    var username = $(this).data('username');
    var email = $(this).data('email');
    console.log('user_id = ' + userid);

    $("#delete_user_id").val(userid);
    $("#delete_username").val(username);
    $("#delete_email").val(email);
});
</script>