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
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('admin/programs')?>">
                            Programs
                        </a>
                    </li> -->
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
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a href="<?=site_url('admin/programs')?>"><button type="button"
                                class="btn btn-sm btn-outline-add" data-toggle="modal" data-target="#addModal">Add
                                Workout</button></a>
                    </div>

                </div>
            </div>

            <h2>Workouts</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Exercise 1</th>
                            <th>Exercise 2</th>
                            <th>Exercise 3</th>
                            <th>Sets / Reps</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
foreach ($workout as $row) {
    echo '<tr>';
    echo '<td>' . $row['title'] . '</td><td>' . $row['workout_one'] . '</td><td>' . $row['workout_two'] . '</td><td>' . $row['workout_three'] . '</td><td>' . $row['sets_one'] . '</td>';
    echo '<td><button type="button" id="editBtn" class="btn btn-primary myBtn" data-toggle="modal"
            data-target="#editModal" data-program_id="' . $row['program_id'] . '" data-title="' . $row['title'] . '" data-workout_one="' . $row['workout_one'] . '" " data-workout_two="' . $row['workout_two'] . '" " data-workout_three="' . $row['workout_three'] . '" " data-sets_one="' . $row['sets_one'] . '">
            Edit
          </button></td>';
    echo '<td><button type="button" id="deleteBtn" class="btn btn-danger myBtn" data-toggle="modal" data-target="#deleteModal"
            data-program_id="' . $row['program_id'] . '" data-title="' . $row['title'] . '" data-workout_one="' . $row['workout_one'] . '" " data-workout_two="' . $row['workout_two'] . '" " data-workout_three="' . $row['workout_three'] . '" " data-sets_one="' . $row['sets_one'] . '">Delete</button></td>';
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
                                <h5 class="modal-title">Edit Workout</h5>
                            </div>
                            <div class="modal-body">
                                <form class="" action="<?php echo site_url('admin/edit_workout'); ?>" method="post">
                                    <div class="form-group">
                                        <input type="hidden" class="input" id="edit_program_id" name="program_id"
                                            value="">
                                        <input type="text" id="edit_title" name="title" placeholder="Title">
                                        <input type="text" id="edit_workout_one" name="workout_one"
                                            placeholder="Exercise 1">
                                        <input type="text" id="edit_workout_two" name="workout_two"
                                            placeholder="Exercise 2">
                                        <input type="text" id="edit_workout_three" name="workout_three"
                                            placeholder="Exercise 3">
                                        <input type="text" id="sets_one" name="sets_one" placeholder="Sets / Reps">
                                        <br>
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
                                <h5 class="modal-title">Delete Workout</h5>
                            </div>
                            <div class="modal-body">
                                <form class="" action=<?php echo site_url('admin/delete_workout'); ?> method="post">
                                    <div class="form-group">
                                        <input type="hidden" id="delete_program_id" name="program_id" value=""><br>
                                        <h3>Are you sure you want to delete this Workout?</h3>
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
                    var program_id = $(this).data('program_id');
                    var title = $(this).data('title');
                    var workout_one = $(this).data('workout_one');
                    var workout_two = $(this).data('workout_two');
                    var workout_three = $(this).data('workout_three');
                    var sets_one = $(this).data('sets_one');
                    console.log('program_id = ' + program_id);

                    $("#edit_program_id").val(program_id);
                    $("#edit_title").val(title);
                    $("#edit_workout_one").val(workout_one);
                    $("#edit_workout_two").val(workout_two);
                    $("#edit_workout_three").val(workout_three);
                    $("#edit_sets_one").val(sets_one);
                });
                $(document).on("click", '#deleteBtn', function(e) {
                    console.log("delete modal open");
                    var program_id = $(this).data('program_id');
                    var title = $(this).data('title');
                    var workout_one = $(this).data('workout_one');
                    var workout_two = $(this).data('workout_two');
                    var workout_three = $(this).data('workout_three');
                    var sets_one = $(this).data('sets_one');
                    console.log('program_id = ' + program_id);

                    $("#delete_program_id").val(program_id);
                    $("#delete_title").val(title);
                    $("#delete_workout_one").val(workout_one);
                    $("#delete_workout_two").val(workout_two);
                    $("#delete_workout_three").val(workout_three);
                    $("#delete_sets_one").val(sets_one);
                });
                </script>