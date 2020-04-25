<!DOCTYPE html>
<html>
<head>
	<title>PulseUP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/nutrition_info.css">
</head>
<body>
<div class="container">
<div id="logo" class="text-center ml-5 mt-2"><img src="<?=base_url()?>assets/img/logo_img/PULSEUP.png"></div>

<div class="row">
  <div class="column text-center">
  <table class="table">
  <tr style="background:#ff5500;">
    <th>Your current Weight</th>
    <th>Your current Height</th>
    <th>Date updated</th>
  </tr>
  <?php
  foreach($data as $row)
  {
  echo "<tr>";
  echo "<td>".$row->weight.' kg'."</td>";
  echo "<td>".$row->height.' cm'."</td>";
  echo "<td>".$row->DateTime."</td>";
  echo "</tr>";
  }
   ?>
</table>

<?php 
            $weight = $row->weight;
            $height = $row->height;
            $age = $row->age;
            $gender = $row->gender;
            $bmi = ($weight / (($height / 100) * ($height / 100)));
            $bmr;
            if (isset($gender) && isset($age)) {
              if($gender == 'male') {
                $bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;
              } else if ($gender == 'female') {
                $bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) -161;
              }
            } else {
              echo "  You did not enter all required values";
            }
        ?>
</div>

<h1 class="text-center">Daily calorie requirements</h1>
<table class="kkal-table table" cellspacing="10">

              <tr>
                <td class="kkal-name">If you are sedentary <br> (little or no exercise)</td>
                <td class="kkal-amount"><?php echo round(($bmr * 1.2))."kkal"; ?></td>
              </tr>
              <tr>
                <td class="kkal-name">If you are lightly active <br> (light exercise/sports 1-3 days/week) </td>
                <td class="kkal-amount"><?php echo round(($bmr * 1.375))."kkal"; ?></td>
              </tr>
              <tr>
                <td class="kkal-name">If you are moderately active <br> (moderate exercise/sports 3-5 days/week</td>
                <td class="kkal-amount"><?php echo round(($bmr * 1.55))."kkal"; ?></td>
              </tr>
              <tr>
                <td class="kkal-name">If you are extra active <br>  (very hard exercise/sports & physical job or 2x training)</td>
                <td class="kkal-amount"><?php echo round(($bmr *  1.9))."kkal"; ?></td>
              </tr>
            </table>
</div>
<button class="back-button" onclick="window.location='<?php echo site_url("stats/index");?>'">← Back</button>


</body>

</html>

