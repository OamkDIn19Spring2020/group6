<div class="row no-gutters">
    <div class="no-gutters" style="width: 27%; flex: 0 0 27%;max-width: 27%;"></div>
    <div class="col-md-5 no-gutters text-center ">
        <div id="logo" class="text-center ml-5 mt-2"><img src="<?=base_url()?>assets/img/logo_img/PULSEUP.png"></div>
        <h1 class="display-4">Personal stats</h1>
        <div class="stats-main">
            <div id="stats-form">
                <form action="<?php echo site_url('stats/submit'); ?>" method="post">
                    <div class="age-weight-height">
                        <label for="weight">Weight</label><br>
                        <input class="stats-field" name="user_weight"><br>
                        <label for="weight">Height</label><br>
                        <input class="stats-field" name="user_height"><br>
                        <div><button type="submit" name="submit" id="calculate-button" value="calculate">SAVE</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="view-buttons"><button id="view-more"
                    onclick="window.location='<?php echo site_url("stats/view_progress"); ?>'">TRACK PROGRESS</button>
            </div>
            <div class="view-buttons"><button id="track-result"
                    onclick="window.location='<?php echo site_url("stats/nutrition_info"); ?>'">VIEW NUTRITION
                    INFO</button></div>
        </div>

    </div>
    <div class="col-md-3 no-gutters mt-5">
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
</div>