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
<div class="statestic_page">
    <div class="statestics_sous_page">
        <!-- *****title*************** -->
        <p class="title"> statestic's body</p>
        <div class="statistics">
            <!-- *****courbe **************-->
            <div class="statistics_courbe" id="statistics_courbe">
                <?php
                    include "query_php\general_chart.php";
                ?>
            </div>
            <!-- *********body **************-->
            <div class="statistics_body" id="statistics_body">
                <div class="card" id="statistics_aktef">
                    <?php
                        echo "<p>".select_aktef()[count(select_aktef())-1]." cm</p>";
                    ?>
                </div>
                <div class="card" id="statistics_bi_tri">
                    <?php
                        echo "<p>".select_bras()[count(select_bras())-1]." cm</p>";
                    ?>
                </div>
                <div class="card" id="statistics_FEET">
                    <?php
                        echo "<p>".select_fits()[count(select_fits())-1]." cm</p>";
                    ?>
                </div>
                <div class="card" id="statistics_GLUTEUS">
                    <?php
                        echo "<p>".select_kirch()["ass"][count(select_kirch()["ass"])-1]." cm</p>";
                    ?>
                </div>
                <div class="card" id="statistics_ABDO">
                    <?php
                        echo "<p>".select_kirch()["kirch"][count(select_kirch()["kirch"])-1]." cm</p>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>