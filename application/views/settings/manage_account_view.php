<div class="row no-gutters">
    <div class="no-gutters" style="width: 20%; flex: 0 0 20%;max-width: 20%;"></div>
    <div class="col-md-6 no-gutters">
        <div id="logo" class="text-center ml-5 mt-2"><img src="<?=base_url()?>assets/img/logo_img/PULSEUP.png"></div>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Manage Account</h1>
        </div>
        <form action="<?php echo site_url('settings/submit'); ?>" method="post">
        <div class='text-center'>GENDER: <input type="radio" name="gender" value="male" class='ml-4'>Male &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"
                            name="gender" value="female">Female<br>
                            
                            <label for="age">AGE:</label><input class="input-age" name="user_age"><br>
                            <label for="age">EMAIL:</label><input class="input-email" name="user_email"><br>
                            <button type="submit" name="submit" id="calculate-button" value="calculate">SAVE</button>
                            </div>
        </form>
        <div class='text-center mt-5'>
        <button class="mr-5 ml-5" onclick="window.location='<?php echo site_url("settings/change_password_view"); ?>'" >CHANGE PASSWORD</button>
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