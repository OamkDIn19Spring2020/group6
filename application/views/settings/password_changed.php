<!DOCTYPE html>
<html>
<head>
	<title>PulseUP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/track_progress.css">
    <style>

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #ff5500;
  color: white;
  text-align: center;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #ff5500;
  color: white;
  text-align: left;
}

.back-button {
    color: #ff5500;
    font-family: "Play";
    font-weight: 700;
    font-size: 18px;
    text-align: center;
    justify-content: center;
    width: 200px;
    height: 36px;
    line-height: 1.2;
    border-radius: 4px;
    border: 2px solid #ff5500;
    background-color: white;
}
</style>
</head>
<body>

<div id="myModal" class="modal">

  <div class="modal-content">
    <div class="modal-header">
      <h2>CONFIRMATION</h2>
    </div>
    <div class="modal-body text-center">
    <img src="<?=base_url()?>assets/img/checkmark.png" style="width:50px; height:50px; margin-top:20px;"><p style="margin-bottom: 20px">Your password was successfully updated </p>
    </div>
    <div class="modal-footer">
    <button class="back-button" onclick="window.location='<?php echo site_url("settings/index");?>'">← Back</button>
    </div>
  </div>

</div>

<script>
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
window.onload = function() {
  modal.style.display = "block";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>






