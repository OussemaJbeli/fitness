<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>
<body>
    <?php
        include "query_bras.php";
        include "query_aktef.php";
        include "query_fits.php";
        include "query_kirch.php";
        include "query_date_lenght.php";
    // /****************************** test_tabs*/
    // echo "<pre>";
    // print_r(select_aktef());
    // echo "</pre>";
    // echo "<pre>";
    // print_r(select_bras());
    // echo "</pre>";
    // echo "<pre>";
    // print_r(select_fits());
    // echo "</pre>";
    // echo "<pre>";
    // print_r(select_kirch());
    // echo "</pre>";
    // echo "<pre>";
    // print_r(date_lenght());
    // echo "</pre>";
    // /****************************** */
        $data = array(
            select_bras(), // Line bras data points
            select_fits(), // Line fits data points
            select_aktef(), // Line ktaf data points
            select_kirch()["kirch"], // Line kirch data points
            select_kirch()["ass"]
        );
        $labels = date_lenght(); // Labels for X-axis
    ?>
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
                    label: 'BI-TRiCEPS',
                    data: data[0],
                    borderColor: '#1217b0',
                    fill: false
                },
                {
                    label: 'FEET',
                    data: data[1],
                    borderColor: '#16dcd4',
                    fill: false
                },
                {
                    label: 'SHOULDER',
                    data: data[2],
                    borderColor: '#7a1387',
                    fill: false
                },
                {
                    label: 'ABDO',
                    data: data[3],
                    borderColor: '#a37b0d',
                    fill: false
                },
                {
                    label: 'GLUTEUS',
                    data: data[4],
                    borderColor: '#ff6d41',
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
</body>
</html>