<div class="row mx-auto" style="width: 380px;">
    <div class=" span6">
        <?php
if ($this->session->flashdata('message')) {
    echo '
                            <div class="alert alert-success>
                                ' . $this->session->flashdata("message") . ' test
                            </div>
                            ';
}
?>
        <form id="register_form" action="<?=site_url('user/register');?>" method="post">
            <div class="form-group">
                <label>Enter Username</label>
                <input type="text" name="reg_username" class="form-control"
                    value=<?php echo set_value('reg_username'); ?>>
                <span class="text-danger"><?php echo form_error('reg_username') ?></span>
            </div>
            <div class="form-group">
                <label>Enter Email</label>
                <input type="text" name="reg_email" class="form-control" value=<?php echo set_value('reg_email') ?>>
                <span class="text-danger"><?php echo form_error('reg_email') ?></span>
            </div>
            <div class="form-group">
                <label>Enter Password</label>
                <input type="password" name="reg_password" class="form-control"
                    value=<?php echo set_value('reg_password') ?>>
                <span class="text-danger"><?php echo form_error('reg_password') ?></span>
            </div>
            <!-- <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control"
                    value=<?php echo set_value('confirm_password') ?>>
                <span class="text-danger"><?php echo form_error('confirm_password') ?></span>
            </div> -->
            <div class="form-group">
                <!-- <input type="submit" id="register-button" name="register" value="Register"
                                class="btn btn-info"> -->
                <button type="submit" class="btn btn-primary" id="register-button" name="register"
                    value="Register">Register</button>
            </div>
        </form>
        <a href="<?=site_url('/')?>">Back</a>
    </div>
</div>