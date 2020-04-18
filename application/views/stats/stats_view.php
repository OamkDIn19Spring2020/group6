<div class="row no-gutters">
    <div class="no-gutters" style="width: 20%; flex: 0 0 20%;max-width: 20%;"></div>
    <div class="col-md-5 no-gutters text-center ">
        <div id="logo" class="text-center ml-5 mt-2"><img src="<?=base_url()?>assets/img/logo_img/PULSEUP.png"></div>
        <div class="stats-main">
            <div id="stats-form">
                <form>
                    <div class="gender-form">
                        <label for="gender">Gender</label><br>
                        <input type="radio">Male &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio">Female
                    </div>
                    <div class="age-weight-height">
                        <label for="weight">Weight</label><br>
                        <input class="stats-field"><br>
                        <label for="weight">Height</label><br>
                        <input class="stats-field"><br>
                        <label for="weight">Age</label><br>
                        <input class="stats-field"><br>
                        <div id="calculate-button"><button type="submit">Submit</button></div>
                    </div>
                </form>
            </div>
            <div class="view-buttons"><button id="view-more">VIEW DETAILED STATS</button></div>
            <div class="view-buttons"><button id="track-result">TRACK YOUR RESULTS</button></div>
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