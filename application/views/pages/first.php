
            <div class="slideshow">
                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <img src="<?php echo base_url('images/fit.png'); ?>">
                </div>
                <div class="mySlides fade">
                    <img src="<?php echo base_url('images/fit2.png'); ?>">
                </div>
                <div class="mySlides fade">
                    <img src="<?php echo base_url('images/fit3.png'); ?>">
                </div>
                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
                <script>
                    var slideIndex = 1;
                    var timer = null;
                    showSlides(slideIndex);

                    function plusSlides(n) {
                    clearTimeout(timer);
                    showSlides(slideIndex += n);
                    }

                    function currentSlide(n) {
                    clearTimeout(timer);
                    showSlides(slideIndex = n);
                    }

                    function showSlides(n) {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("dot");
                    if (n==undefined){n = ++slideIndex}
                    if (n > slides.length) {slideIndex = 1}
                    if (n < 1) {slideIndex = slides.length}
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex-1].style.display = "block";
                    dots[slideIndex-1].className += " active";
                    timer = setTimeout(showSlides, 5000);
                    } 
</script>
            </div>

            <div>
                <p class="bottom-text"
                    style="font-size: 78px; margin-left: 400px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
                    JOIN US!<br>
                    <span style="color: orangered; margin-left: 150px;">IMPROVE YOURSELF!</span></p>
            </div>
        </div>

        <!--SIDE BAR STARTS HERE-->

        <div id="sideBar" class="sidebar">
            <!--LOGIN FORM-->
            <div class="authorization">
                <div class="login">

                    <form class="login_form" action="<?php echo site_url('homepage/login'); ?>" method="post">
                        <p>Username<br> <input type='text' name='username' id="username"></p>
                        <p>Password<br> <input type='password' name='password' id="password"></p>
                        <p><input type='submit' id="login-button" value='LOGIN'><br></p>
                        <!-- TODO need path for href -->
                        <a href="#">
                            <p style="margin-left: 87px; font-size: 12px; margin-top: -8px;">Forgot password?</p>
                        </a>
                    </form>
                </div>
                <!--REGISTRATION FORM-->
                <div class="registration">
                    <div class="reg-form">
                        <?php
if ($this->session->flashdata('message')) {
    echo '
                                                        <div class="alert alert-success>
                                                            ' . $this->session->flashdata("message") . '
                                                        </div>
                                                        ';
}
?>

                        <!-- TODO CSS FOR FIRST PAGE -->
                        <h3 style="margin-left: 98px; font-size: 16px;">REGISTRATION</h3>
                        <form action="<?php echo site_url('homepage/validation'); ?>" method="post">
                            <div class="form-group">
                                <label>Enter Your Name</label>
                                <input type="text" name="reg_username" class="form-control"
                                    value=<?php echo set_value('reg_username'); ?>>
                                <span class="text-danger"><?php echo form_error('reg_username') ?></span>
                            </div>
                            <div class="form-group">
                                <label>Enter Email</label>
                                <input type="text" name="reg_email" class="form-control"
                                    value=<?php echo set_value('reg_email') ?>>
                                <span class="text-danger"><?php echo form_error('reg_email') ?></span>
                            </div>
                            <div class="form-group">
                                <label>Enter Password</label>
                                <input type="password" name="reg_password" class="form-control"
                                    value=<?php echo set_value('reg_password') ?>>
                                <span class="text-danger"><?php echo form_error('reg_password') ?></span>
                            </div>
                            <div class="form-group">
                                <!-- <input type="submit" id="register-button" name="register" value="Register"
                                class="btn btn-info"> -->
                                <button type="submit" id="register-button" name="register"
                                    value="Register">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- TODO this is WIP Work In Progress -->
<!-- reg modal -->
<!-- <div class="modal" id="feedbackModal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="message">
            "You have registerd successfully"
        </p>

    </div>
    <script>
    // Get the modal
    var modal = document.getElementById("feedbackModal");

    // Get the button that opens the modal
    var btn = document.getElementById("register-button");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
</div> -->