<div id="page">
    <div id="content">
        <div>
            <p>Manage Accounts page</p>
        </div>


    </div>
    <div id="sideBar">
        <div class="userDetails">
            <div id="avatar">
                <img src="<?php echo base_url('images/avatar.png'); ?>">
            </div>
            <div id="usernameDisplayed">
                <?php echo $_SESSION['username'] ?>
            </div>
            <div class="navigation">
                <div><a href=<?php echo site_url('homepage/second') ?>>Calendar</a></div>
                <div><a href=<?php echo site_url('user_accounts/index') ?>>Manage Account</a></div>
                <div><a href=<?php echo site_url('stats/index') ?>>Stats</a></div>
                <div><a href=<?php echo site_url('products/index') ?>>Products</a></div>
                <div><a href=<?php echo site_url('purchase_history/index') ?>>Purchase History</a></div>
                <a id="logout-button" href="<?php echo site_url('homepage/index') ?>"><img
                        src="<?php echo base_url('images/logout.png'); ?>"></a>
            </div>
        </div>
    </div>
</div>