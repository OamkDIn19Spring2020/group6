<div class="container registration-container">
    <div class="span6">
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
                <h3>Sign Up</h3>
                <p>Please fill in this form to create an account.</p>
                <hr class="line">
            </div>

            <legend>Login Details</legend>
            <div class="form-group">
                <input type="text" name="reg_username" class="form-control"
                    value="<?php echo set_value('reg_username'); ?>" placeholder="Enter Username">
                <?php echo form_error('reg_username', '<span class="text-danger">', '</span>') ?>
            </div>

            <div class="form-group">
                <input type="password" name="reg_password" class="form-control"
                    value="<?php echo set_value('reg_password') ?>" placeholder="Enter Password">
                <!-- <span class="text-danger"><?php echo form_error('reg_password') ?></span> -->
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" class="form-control"
                    value="<?php echo set_value('confirm_password') ?>" placeholder="Confirm Password">
                <span class="text-danger"><?php echo form_error('confirm_password') ?></span>
            </div>
            <hr class="line">
            <legend>User Details</legend>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" name="firstname"
                        value="<?php echo set_value('firstname') ?>" placeholder="First Name (optional)">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" name="lastname" value="<?php echo set_value('lastname') ?>"
                        placeholder="Last Name (optional)">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="reg_email"
                        value="<?php echo set_value('reg_email') ?>" placeholder="Enter Email">
                    <span class="text-danger"><?php echo form_error('reg_email') ?></span>
                </div>
                <div class="col-md-2">
                    <label for="birthyear" class="date-of-birth">Enter Age:</label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="birthyear"
                        value="<?php echo set_value('birthyear') ?>">
                    <span class="text-danger"><?php echo form_error('birthyear') ?></span>

                </div>
            </div>
            <div class="form-row mt-3">
                <div class="col-md-3 custom-control custom-radio custom-control-inline">
                    <label for="gender">Gender:</label>
                </div>
                <div class="col-md-3 custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="customRadioInline1" name="gender"
                        value="<?php echo set_value('male') ?>">
                    <label class="custom-control-label" for="customRadioInline1">Male</label>
                </div>
                <div class="col-md-3 custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="customRadioInline2" name="gender"
                        value="<?php echo set_value('female') ?>">
                    <label class="custom-control-label" for="customRadioInline2">Female</label>
                </div>
            </div>
            <hr class="line">
            <div class="form-row my-3">
                <a href="<?=site_url('/')?>" class="btn btn-primary ml-3 mr-2" id="back-btn">Back</a>
                <button type="submit" class="btn btn-primary ml-2 mr-2" id="register-button-regpage" name="register"
                    value="Register">Register</button>
            </div>
        </form>

    </div>
</div>

<script>
// TODO not working correctly yet
// code to toggle the gender checkbox
$('.custom-control-input').prop('indeterminate', true);
</script>