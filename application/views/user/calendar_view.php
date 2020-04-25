<div class="row no-gutters">
    <div class="no-gutters" style="width: 20%; flex: 0 0 20%;max-width: 20%;"></div>
    <div class="col-md-5 no-gutters">
        <div id="logo" class="text-center ml-5 mt-2"><img src="<?=base_url()?>assets/img/logo_img/PULSEUP.png"></div>
        <div class="table-responsive">
            <table class="table">
                <tbody>

                    <?php
for ($i = 1; $i <= 4; $i++) {
    echo '<tr>';
    foreach ($program as $row) {
        echo '<td>' . $row['day_number'] . '<br>
            ' . $row['title'] . '<br>
            <button style="margin-top: 10px;" class="myBtn" id="myBtn" data-toggle="modal" data-target="#myModal"  data-program_id=' . $row['program_id'] . ' data-day_number=' . $row['day_number'] . ' data-title=' . $row['title'] . ' data-workout_one=' . $row['workout_one'] . ' data-sets_one=' . $row['sets_one'] . ' data-workout_two=' . $row['workout_two'] . ' data-sets_two=' . $row['sets_two'] . ' data-workout_three=' . $row['workout_three'] . ' data-workout_four=' . $row['workout_four'] . ' data-workout_five=' . $row['workout_five'] . ' " >VIEW</button>
        </td>';

    }
}
?>
                </tbody>
            </table>
            <div class="modal fade  myModal" id="myModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modalcontent">
                        <div class="modal-body">
                            <h1 style="color: #ff5500;" class="modal-title"></h1>
                            <p style="margin-bottom: 0px;" class="workout-one"><strong></strong></p>
                            <p style="margin-bottom: 0px;" class="sets-one"><em></em></p>
                            <p style="margin-bottom: 0px;" class="workout-two"><strong></strong></p>
                            <p style="margin-bottom: 0px;" class="sets-two"><em></em></p>
                            <p style="margin-bottom: 0px;" class="workout-three"><strong></strong></p>
                            <p style="margin-bottom: 0px;" class="sets-one"><em></em></p>
                            <p style="margin-bottom: 0px;" class="workout-four"><strong></strong></p>
                            <p style="margin-bottom: 0px;" class="sets-one"><em></em></p>
                            <p style="margin-bottom: 0px;" class="workout-five"><strong></strong></p>
                            <p style="margin-bottom: 0px;" class="sets-two"><em></em></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeBtn" onClick="clear()" id="closeBtn"
                            data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
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
<script>
// This gets data attributes from php button "VIEW" clicked on screen
// It then appends each attribute to the matching classes in the modal
$(document).on("click", '#myBtn', function(e) {
    var program_id = $(this).attr('data-program_id');
    var title = $(this).attr('data-title');
    var day_number = $(this).attr('data-day_number');
    var workout_one = $(this).attr('data-workout_one');
    var workout_two = $(this).attr('data-workout_two');
    var workout_three = $(this).attr('data-workout_three');
    var workout_four = $(this).attr('data-workout_four');
    var workout_five = $(this).attr('data-workout_five');
    var sets_one = $(this).attr('data-sets_one');
    var sets_two = $(this).attr('data-sets_two');



    $("#program_id").val(program_id);
    $("#title").val(title);
    $("#workout_one").val(workout_one);

    $('.modal-title').append(title);
    $('.workout-one').append(workout_one);
    $('.workout-two').append(workout_two);
    $('.workout-three').append(workout_three);
    $('.workout-four').append(workout_four);
    $('.workout-five').append(workout_five);
    $('.sets-one').append(sets_one);
    $('.sets-two').append(sets_two);

});

// When modal is classed this clears the modal of data
$('#myModal').on('hidden.bs.modal', function() {
    $(this).find(
        ".modal-title, .workout-one, .workout-two, .workout-three, .workout-four, .workout-five, .sets-one, .sets-two"
    ).empty();

});
</script>