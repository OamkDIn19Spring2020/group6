<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?=site_url('admin')?>">PulseUP</a>
    <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
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
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-sm btn-outline-add">Add Program</button>
                    </div>

                </div>
            </div>

            <h2>Programs</h2>
            <div class="orders-container">
                <form action="<?=site_url('admin/insert_program');?>" method="post">
                    <div class="row">
                        <div class="col-25">
                            <label for="wnum">Week Number</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="wnum" name="wnum">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="day">Day</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="day" name="day">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="program">Program</label>
                        </div>
                        <div class="col-75">
                            <select id="program" name="program">
                                <option value="weights">Weights</option>
                                <option value="cardio">Cardio</option>
                                <option value="mma">MMA</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="workout">Workout</label>
                        </div>
                        <div class="col-75">
                            <textarea id="workout" name="workout" style="height:200px"></textarea>
                        </div>
                    </div>
                    <hr class="line">
                    <div class="row">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>