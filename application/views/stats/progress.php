<!DOCTYPE html>
<html>
<head>
	<title>PulseUP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/progress.css">
</head>
<body>
  
<script type="text/javascript">
  
$(function () { 
    
    var data_weight = <?php echo $weight; ?>;
    var data_dateTime = <?php echo $dateTime; ?>;
    Highcharts.setOptions({
        colors: ['#ff5500']
    });
    Highcharts.setOptions({
        chart: {
            style: {
                fontFamily: 'Play'
            }
        }
    });

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Changes in your weight'
        },
        xAxis: {
            categories: data_dateTime
        },
        yAxis: {
            title: {
                text: 'Weight'
            }
        },
        series: [{
            name: 'Weight',
            data: data_weight
        }]
    });
})
;
  
</script>
  
<div class="container">
<div id="logo" class="text-center ml-5 mt-2"><img src="<?=base_url()?>assets/img/logo_img/PULSEUP.png"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <div id="container"></div>
                    <button>CLEAR ALL DATA</button>
                </div>
            </div>
        </div>
    </div>
    <a href="<?=site_url('stats')?>">Back</a>
</div>

</body>
</html>






