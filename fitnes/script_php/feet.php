<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php
            include "query_php/query_view.php";
        ?>
        :root{
            --main_color1:#000;
            --font_color:#fff;
            <?php root();?>
        }
    </style>
    <link rel="stylesheet" href="style/style_stat_feet.css">
    <link rel="icon" type="icon" href="icons\home4.png"> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- popup*********** -->
    <link rel="stylesheet" href="query_php/add_popup/style.css">
    <title>Document</title>
</head>
<body>
    <?php
        include "query_php\query_fits.php";
        include "query_php\query_date_lenght.php";
        // <!-- popup*********** -->
        include "query_php\add_popup\add.php";
        $data = array(
            select_left_rigth_feet()["left"], // Line bras data points
            select_left_rigth_feet()["right"], // Line fits data points
        );
        $labels = date_lenght(); // Labels for X-axis
    ?>
    <!-- ********************* -->
    <div class="feet_page">
        <!-- ****************************bras **************-->
        <div class="feet_imge">
            <div class="card_img" id="img_left_bras">
                <img src="icons/1-1.jpg" alt="">
                <div class="detels_bras_img" id="detels_feet_img_left">
                    <p class="button_bras" id="button_left_feet">add</p>
                    <?php
                        $tab = select_left_rigth_feet()["left"];
                        echo "<p>".$tab[count($tab)-1]." cm</p>";
                    ?>
                </div>
            </div>
            <div class="card_img" id="img_rigth_bras">
                <img src="icons/1-2.jpg" alt="">
                <div class="detels_bras_img">
                    <p class="button_bras" id="button_rigth_feet">add</p>
                    <?php
                        $tab = select_left_rigth_feet()["right"];
                        echo "<p>".$tab[count($tab)-1]." cm</p>";
                    ?>
                </div>
            </div>
        </div>
        <!-- ****************************statestic **************-->
        <div class="stat_bras">
            <div class="card_stat" id="stat_bras">
                <canvas id="myChart" style="width:100%;height:100%;"></canvas>
                <script>
                    var data = <?php echo json_encode($data); ?>;
                    var labels = <?php echo json_encode($labels); ?>;

                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'left BI-TRiCEPS',
                                data: data[0],
                                borderColor: '#a37b0d',
                                fill: false
                            },
                            {
                                label: 'rigth BI-TRiCEPS',
                                data: data[1],
                                borderColor: '#7a1387',
                                fill: false
                            }
                        // Add more datasets for additional lines...
                        ]
                    },
                    options: {
                        responsive: true,
                        scales: {
                        x: {
                            display: true,
                            title: {
                            display: true,
                            text: 'times'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                            display: true,
                            text: 'Values'
                            }
                        }
                        }
                    }
                    });
                </script>
            </div>
        </div>
    </div>
</body>
<!-- popup*********** -->
<script src="query_php/add_popup/script.js"></script>
</html>