        <div class="stats-main">
            <div id="stats-form">
                <form action="<?php echo site_url('stats/validation'); ?>" method="post">
                    <div class="gender-form">
                        <label for="gender">Gender</label><br>
                        <input type="radio">Male &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio">Female
                    </div>
                    <div class="age-weight-height">
                        <label for="weight">Weight</label><br>
                        <input class="stats-field" name="user_weight" value="">

                        <label for="weight">Height</label><br>
                        <input class="stats-field" name="user_height" value=<?php ?>>
                        <label for="age">Age</label><br>
                        <input class="stats-field" name="user_age" value=<?php echo set_value('user_age'); ?>><br>
                        <div id="calculate-button"><button type="submit" name="calculate"
                                value="calculate">Calculate</button></div>
                    </div>
                </form>
            </div>
            <div id="stats-table">
                <div>BMI<br>
                    <input class="stats-field"></div>
                <table class="kkal-table">
                    <tr>
                        <td class="kkal-name">Maintain Weight</td>
                        <td class="kkal-amount">2300kkal</td>
                    </tr>
                    <tr>
                        <td class="kkal-name">Mild weight loss</td>
                        <td class="kkal-amount">2175kkal</td>
                    </tr>
                    <tr>
                        <td class="kkal-name">Weight loss</td>
                        <td class="kkal-amount">1925kkal</td>
                    </tr>
                    <tr>
                        <td class="kkal-name">Extreme weight loss</td>
                        <td class="kkal-amount">1400kkal</td>
                    </tr>
                </table>
            </div>

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
                <a id="logout-button" href=<?php echo site_url('homepage/index') ?>><img
                        src=<?php echo base_url('images/logout.png'); ?>></a>
            </div>

        </div>

    </div>
</div>