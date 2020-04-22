<div class="row no-gutters">
    <div class="no-gutters" style="width: 20%; flex: 0 0 20%;max-width: 20%;"></div>
    <div class="col-md-5 no-gutters text-center ">
        <div id="logo" class="text-center ml-5 mt-2"><img src="<?=base_url()?>assets/img/logo_img/PULSEUP.png"></div>
        <div class="stats-main">
            <div id="stats-form">
            <form action="<?php echo site_url('stats/submit'); ?>" method="post">
                    <div class="gender-form">
                        <label for="gender">Gender</label><br>
                            <input type="radio" name="gender" value="male">Male &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="female">Female
                        </div>
                    <div class="age-weight-height">
                        <label for="weight">Weight</label><br>
                        <input class="stats-field" name="user_weight"><br>
                        <label for="weight">Height</label><br>
                        <input class="stats-field" name="user_height"><br>
                        <label for="age">Age</label><br>
                        <input class="stats-field" name="user_age">
                        <div ><button type="submit" name="submit" id="calculate-button"
                                value="calculate">SAVE</button></div>
                    </div>
                </form>
            </div>
            <div class="view-buttons"><button id="view-more" onclick="window.location='<?php echo site_url("stats/view_progress");?>'">TRACK PROGRESS</button></div>
            <div class="view-buttons"><button id="track-result" onclick="window.location='<?php echo site_url("stats/nutrition_info");?>'">VIEW NUTRITION INFO</button></div>
        </div>

    </div>
    <div class="col-md-3 no-gutters ml-4 mt-5 ">
        <div id="sideBar" style="margin-left: 60px;">
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
                        <div>Products</div>
                        <div>Purchase History</div>
                        <span class="mt-3"><a id="logout-button" href="<?=site_url('user/logout')?>"><img
                                    src="<?=base_url()?>assets/img/user_img/logout.png"></a></span>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-md-2 no-gutters ml-5 mt-5"></div>
</div>