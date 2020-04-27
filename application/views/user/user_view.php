<div class="row no-gutters">
    <div class="no-gutters" style="width: 20%; flex: 0 0 20%;max-width: 20%;"></div>
    <div class="col-md-6 no-gutters">
        <div id="logo" class="text-center ml-5 mt-2"><img src="<?=base_url()?>assets/img/logo_img/PULSEUP.png"></div>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td>DAY 1<br>
                            CHEST<br>
                            <button id="myBtn" style="margin-top: 10px;">VIEW</button>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td id="weeks">
                            <div>Week 1&2</div> <br>
                            <div>Week 3&4</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1 style="color: #ff5500;">CHEST WORKOUT</h1>
                <p><strong>Bench Press </strong><br>
                    <i>3-4 sets of 8-10 reps</i><br>
                    <strong>Incline Bench Press </strong><br>
                    <i>3-4 sets of 8-10 reps</i><br>
                    <strong>Decline Bench </strong><br>
                    <i>3-4 sets of 8-10 reps</i><br>
                    <strong>Flat Dumbbell Bench Press </strong><br>
                    <i>3-4 sets of 8-10 reps</i><br>
                    <strong>Incline Dumbbell Bench Press </strong><br>
                    <i>3-4 sets of 8-10 reps</i><br>
            </div>
            <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            </script>
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
                        <div><a href="<?=site_url('settings')?>">Manage Account</a></div>
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