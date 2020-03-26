<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pulse Up</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet">
</head> 
<?php
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
    echo 'You have succesfully logged in. Welcome '.$_SESSION['username'];
  }
  else {
    echo 'You have not provided valid login credentials. Welcome Guest';
  }
?>
<!-- login test -->
<!-- <ul>
    <li><a href=<?php echo site_url('example/first'); ?>>first page</a></li>
    <li><a href=<?php echo site_url('example/second'); ?>>second page</a></li>
    <li><a href=<?php echo site_url('example'); ?>>log out</a></li>
</ul> -->
  <div id="page">
    <div id="content">
      <div>
        <table id="calendar">
          <tr>
            <td>
              DAY 1<br>
              CHEST<br>
              <button id="myBtn" style="margin-top: 10px;">VIEW</button>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td id="weeks">
            <a href="#"><div>Week 1&2</div></a> <br>
              <a href="#"><div>Week 3&4</div></a>
            </td>
          </tr>
        </table>
      </div>
      <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <h1 style="color: #ff5500;">CHEST WORKOUT</h1>
          <p><strong>Bench Press </strong><br>
            <i>3-4 sets of 8-10 reps</i><br>
            <strong>Incline Bench Press </strong><br>
            <i>3-4 sets of 8-10 reps</i><br>
            <strong>Decline Bench </strong><br>
            <i>3-4 sets of 8-10 reps</i><br>
            <strong>Flat Dumbbell Bench Press </strong><br>
            <i>3-4 sets of 8-10 reps</i><br>
            <strong>Incline Dumbbell Bench Press </strong><br>
            <i>3-4 sets of 8-10 reps</i><br>
        </div>
        <script>
          // Get the modal
          var modal = document.getElementById("myModal");
          
          // Get the button that opens the modal
          var btn = document.getElementById("myBtn");
          
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
      </div>
    </div>
    <div id="sideBar">
      <div class="userDetails">
          <div id="avatar">
              <img src="<?php echo base_url('images/avatar.png'); ?>">
          </div>
          <div id="usernameDisplayed">
            Nikola
          </div>
          <div class="navigation">
            <div><a href ="#">Calendar</a></div>
            <div><a href ="#">Manage Account</a></div>
            <div><a href ="#">Stats</a></div>
            <div><a href ="#">Products</a></div>
            <div><a href ="#">Purchase History</a></div>
            <a id="logout-button" href="<?php echo site_url('PulseUp/index') ?>"><img src="<?php echo base_url('images/logout.png'); ?>"></a>
        </div>
          
        </div>

    </div>
  </div>
