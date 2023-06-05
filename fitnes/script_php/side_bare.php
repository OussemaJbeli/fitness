<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include "script_php/query_php/weather_api.php";
    ?>
    <style>
        .sid_bar .cont_panel{
            background-image: linear-gradient(<?php echo time_color();?>,var(--main_color2));
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="sid_bar" id="sid_bar">
        <!-- contant -->
        <div class="contant">
            <div class="cont_panel">
                <div class="today">
                    <?php
                    $temp;
                        if(API_data()!=null){
                            echo '<div class="discrip_weather">';
                                echo "<p class='date'>".API_data()['date']."</p>";
                                echo "<p class='description'>".API_data()['desc']."</p>"; 
                            echo '</div>';

                            echo '<div class="pict_weather">';
                            echo "<img src='script_php/weather_icons/".API_data()['path']."'>";
                            echo '</div>';
                            $temp=API_data()['temp'];
                        }
                        else{
                            echo "<img src='script_php/weather_icons/connection_error.png'>";
                            $temp="error";
                        }
                    ?>                      
                </div>
                <div class="time_panel">
                    <?php
                        $time = date('H:i');
                        echo '<div class="country">';
                            echo "<p class='time'>".$time."</p>";
                            echo "<p class='city_name'>Béja</p>";
                            echo "<p class='timcountry_code'>TN</p>";
                        echo '</div>';
                    ?>
                </div>
                <div class="tomorrow"></div>
            </div>
            <div class="color_changer">
                <p>view</p>
                <div class="color">
                    <a href="script_php/query_php/query_view.php ? color=blue" id="blue" class="color_but">blue</a>
                    <a href="script_php/query_php/query_view.php ? color=red" id="red" class="color_but">red</a>
                </div>
            </div>
        </div>
        <!-- button -->
        <div class='open_close' id='open_close'>
            <?php 
                if($temp=="error")
                    echo "<img src='script_php/weather_icons/error.png'>";
                else
                    echo $temp."°";
            ?>
        </div>
    </div>
</body>
</html>