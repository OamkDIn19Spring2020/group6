<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?=site_url('admin')?>">PulseUP</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?=site_url('user/logout')?>">Sign out</a>
        </li>
    </ul>
</nav>
<div class="container-fluid" style="margin-top:50px;">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar ">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?=site_url('admin')?>">
                            Customers <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('admin/orders')?>">
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('admin/programs')?>">
                            Programs
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mb-5">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Admin Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                </div>
            </div>
            <h2>Programs</h2>
            <div class="orders-container">
                <form id="program_form" action="<?=site_url('admin/insert_program');?>" method="post">
                    <div class="form-group">
                        <h4 style="text-align: center;">CREATE NEW WORKOUT PLAN</h4>
                        <hr class="line">
                    </div>
                    <div class="form-row pb-4 mx-4">
                        <div class="col-sm-2">
                            <input type="text" id="week_number" name="week_number"
                                value="<?php echo set_value('week_number'); ?>" placeholder="Week">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" id="day_number" name="day_number"
                                value="<?php echo set_value('day_number'); ?>" placeholder="Day">
                        </div>

                        <div class="col-sm-4">
                            <input type="text" id="title" name="title" placeholder="Workout Title">
                        </div>
                    </div>
                    <div class="form-row pb-2 mx-4">
                        <div class="col-sm-4">
                            <select id="product_id" name="product_id">
                                <option value="">Categories</option>
                                <option value="1">Weights</option>
                                <option value="2">Cardio</option>
                                <option value="3">MMA</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="workout_one" name="workout_one" placeholder="Exercise 1">
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="sets_one" name="sets_one" placeholder="Sets Range 1">
                        </div>
                    </div>
                    <div class="form-row pb-3 mx-4">
                        <div class="col-sm-4">
                            <?php echo form_error('week_number', '<span class="bg-danger text-white">', '</span>') ?>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="workout_two" name="workout_two" placeholder="Exercise 2">
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="sets_two" name="sets_two" placeholder="Sets Range 2">
                        </div>
                    </div>
                    <div class="form-row pb-3 mx-4">
                        <div class="col-md-4">
                            <?php echo form_error('week_number', '<span class="bg-danger text-white">', '</span>') ?>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="workout_three" name="workout_three" placeholder="Exercise 3">
                        </div>
                    </div>
                    <div class="form-row pb-3 mx-4">
                        <div class="col-sm-4"></div>
                        <div class="col-md-4">
                            <input type="text" id="workout_four" name="workout_four" placeholder="Exercise 4">
                        </div>
                    </div>
                    <div class="form-row pb-3 mx-4">
                        <div class="col-sm-4"></div>
                        <div class="col-md-4">
                            <input type="text" id="workout_five" name="workout_five" placeholder="Exercise 5">
                        </div>
                    </div>
                    <hr class="line">
                    <div class="row">
                        <input type="submit" class="btn btn-outline-add" value="Add Program">
                    </div>
                </form>
            </div>