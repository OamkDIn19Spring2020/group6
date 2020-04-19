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
  <table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
    <th>Latest Weight</th>
    <th>Latest Height</th>
    <th>Date</th>
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
<?php 
            $weight = $row->weight;
            $height = $row->height;
            $age = $row->age;
            $gender = $row->gender;
            $bmi = ($weight / (($height / 100) * ($height / 100)));
            $bmr;
            echo "Your BMI ".round($bmi,1);
            if (isset($gender) && isset($age)) {
              if($gender == 'male') {
                $bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;
                echo " Your Basal Metabolic Rate ".round($bmr,1);
              } else if ($gender == 'female') {
                $bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) -161;
                echo " Your Basal Metabolic Rate ".round($bmr,1);
              }
            echo " Daily calorie requirement ".($bmr * 1.2);
            } else {
              echo "  You did not enter all required values";
            }
        ?>
        </div>
    </div>
</table>
</body>
</html>