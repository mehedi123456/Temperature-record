<?php

$URL = 'https://api.openweathermap.org/data/2.5/forecast?q=Dhaka&appid=7e99d7002e7fb42f8721812156cc63c6&units=metric';
$contents = file_get_contents($URL);
$clima = json_decode($contents);


$allday = $clima->list;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<h3 style="text-align: center;">5 day weather forecast</h3>
<div class="container">
    <div class="row">
        <div class="col-sm">
            Date
        </div>
        <div class="col-sm">
            Maximum Temperature
        </div>
        <div class="col-sm">
            Minimum Temperature
        </div>
        <div class="col-sm">
            Temp
        </div>
        <div class="col-sm">
          Humidity
        </div>
        <?php
            for($i=0;$i<40;$i++)
            {
                echo'<div class="row">';
                echo'<div class="col-sm">';
                
                $date = $allday[$i]->dt;
                $date = date('F j, Y, g:i a',$date);
                echo  $date;
                
                echo'</div>';
                echo'<div class="col-sm">';
                
                $temp_max = $allday[$i]->main->temp_max;
                echo  $temp_max . "&deg;C";
                
                echo'</div>';
                echo'<div class="col-sm">';
                
                $temp_min = $allday[$i]->main->temp_min;
                echo  $temp_min . "&deg;C";
                
                echo'</div>';
                echo'<div class="col-sm">';
                $temp = $allday[$i]->main->temp;
                echo $temp . "&deg;C";
                echo'</div>';

                echo'<div class="col-sm">';
                $weather = $allday[$i]->main->humidity;
                echo $weather;
                echo'</div>';

                echo'</div>';
            }
        ?>
    </div>
    
</div>

</body>

</html>