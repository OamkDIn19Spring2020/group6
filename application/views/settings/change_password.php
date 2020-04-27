<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pulse UP</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet">
    <script src="<?=base_url()?>assets/js/jquery.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/settings.css">
</head>

<body>
<div class="row no-gutters">
    <div class="no-gutters" style="width: 20%; flex: 0 0 20%;max-width: 20%;"></div>
    <div class="col-md-6 no-gutters">
        <div id="logo" class="text-center ml-5 mt-2"><img src="<?=base_url()?>assets/img/logo_img/PULSEUP.png"></div>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Change Password</h1>
        </div>
        <form action="<?php echo site_url('settings/change_pass'); ?>" method="post">
        <div class='text-center'>
                            
                            <label for="age" style="margin-right: 7px; margin-bottom: 15px;">OLD PASSWORD:</label><input type="password" class="input-old" name="old_password"><br><?php echo form_error('old_password', '<span class="text-danger">', '</span>') ?><br>
                            <label for="age" style="margin-bottom: 15px;">NEW PASSWORD:</label><input type="password" class="input-new" name="new_password"><br><?php echo form_error('new_password', '<span class="text-danger">', '</span>') ?><br>
                            <label for="age" style="margin-right:35px;">CONFIRM NEW PASSWORD:</label><input type="password" id="input-confirm" name="confirm_new_password"><br><?php echo form_error('confirm_new_password', '<span class="text-danger">', '</span>') ?><br>
                            <button type="submit" name="submit" id="calculate-button" value="calculate">SAVE</button>
                            </div>
        </form>
</body>
