
    <!-- CONTENT STARTS HERE-->
    <div id="page">
    <div id="content">
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
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
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
}
        </script>
      </div>
        
    <div>
        <p class="bottom-text" style="font-size: 78px; margin-left: 400px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">JOIN US!<br>
             <span style="color: orangered; margin-left: 150px;">IMPROVE YOURSLEF!</span></p>
    </div>
    </div>

    <!--SIDE BAR STARTS HERE-->

    <div id="sideBar">
        <!--LOGIN FORM-->
        <div class="authorization">
            <div class="login">
                <p>Username<br> <input id="username"></p>
                <p>Password<br> <input id="password"></p>
                <p><button id="login-button">LOGIN</button><br></p>
                <p style="margin-left: 87px; font-size: 12px; margin-top: -8px;">Forgot password?</p>
            </div>
        <!--REGISTRATION FORM-->
            <div class="registration">
                <div class="reg-form">
                <h3 style="margin-left: 98px; font-size: 18px;">REGISTRATION</h3>
                <p>Username<br> <input id="reg-username"></p>
                <p>Password<br> <input id="reg-password"></p>
                <p>E-mail<br> <input id="reg-email" type="email"></p>
                <p><input type="date" style="color: white; font-family: 'Play', sans-serif; ;"></p>
                <p><button id="register-button">REGISTER</button><br></p>
            </div>
            </div>

<ul>
            <li><a href=<?php echo site_url('example/first'); ?>>first page</a></li>
            <li><a href=<?php echo site_url('example/second'); ?>>second page</a></li>
        </ul>