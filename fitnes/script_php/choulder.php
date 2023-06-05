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
    <link rel="stylesheet" href="style/style_stat-aktef.css">
    <link rel="icon" type="icon" href="icons\home4.png"> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- popup*********** -->
    <link rel="stylesheet" href="query_php/add_popup/style.css">
    <title>Document</title>
</head>
<body>
    <?php
        include "query_php\query_aktef.php";
        include "query_php\query_date_lenght.php";
        // <!-- popup*********** -->
        include "query_php\add_popup\add.php";
        $data = array(
            select_aktef(), // Line bras data points
        );
        $labels = date_lenght(); // Labels for X-axis
    ?>
    <div class="aktef_page">
        <!-- ****************************bras **************-->
        <div class="aktef_imge">
            <div class="card_img" id="img_aktef">
                <img src="icons/3-1.jpg" alt="">
                <div class="detels_aktef_img" id="detels_aktef_img">
                    <p class="button_bras" id="button_choulder">add</p>
                    <?php
                        echo "<p>".select_aktef()[count(select_aktef())-1]." cm</p>";
                    ?>s
                </div>
            </div>
        </div>
        <!-- ****************************statestic **************-->
        <div class="stat_aktef">
            <div class="card_stat" id="stat_aktef">
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