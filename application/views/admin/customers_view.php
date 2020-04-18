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
    echo '<td><button type="button" id="editBtn" class="btn btn-primary" data-toggle="modal"
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
</div>

<!-- editModal -->
<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit a Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action=<?php echo site_url('admin/edit_user'); ?> method="post">
                    <div class="form-group">
                        <input type="hidden" id="edit_user_id" id="user_id" value=""><br>
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
                <h5 class="modal-title">Delete a Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action=<?php echo site_url('admin/delete_book'); ?> method="post">
                    <div class="form-group">
                        <input type="hidden" id="delete_id_book" id="id_book" value=""><br>
                        <label for="delete_book_name">Book Name</label><br>
                        <input type="text" id="delete_book_name" name="name" value="" disabled><br>
                        <label for="delete_author">Author</label><br>
                        <input type="text" id="delete_author" name="author" value="" disabled><br>
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

$(document).on("click", '#deleteBtn', function(e) {
    console.log("delete modal open");
    var id_book = $(this).data('id_book');
    var name = $(this).data('name');
    var author = $(this).data('author');
    console.log('id_book = ' + id_book);

    $("#delete_id_book").val(id_book);
    $("#delete_book_name").val(name);
    $("#delete_author").val(author);
});
</script>