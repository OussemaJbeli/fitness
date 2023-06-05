<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php
            include "script_php/query_php/query_view.php";
        ?>
        :root{
            --main_color1:#000;
            --font_color:#fff;
            <?php root();?>
        }
    </style>
    <link rel="stylesheet" href="script_php/style/style.css">
    <link rel="stylesheet" href="script_php/style/style_home.css">
    <link rel="stylesheet" href="script_php/style/style_statestic.css">
    <link rel="stylesheet" href="script_php/style/style_categoris.css">
    <link rel="stylesheet" href="script_php/query_php/add_general_popup/style.css">
    <link rel="stylesheet" href="script_php/style/style_side_bare.css">
    <link rel="icon" type="icon" href="script_php\icons\home4.png"> 
    <title>Document</title>
</head>
<body>
    <div class="body">
        <div id="fitnes_content">
            <!-- bg-imge -->
            <div class="bg_home" id="bg_home">
            </div>
            <!--*************************************home*********************-->
            <?php
                include "script_php/home.php";
            ?>
            <!--*************************************statestic_page*********************-->
            <?php
                include "script_php/statestic.php";
            ?>
            <!-- ************************************categoris************* -->
            <?php
                include "script_php/categoris.php";
            ?>
            <!-- sid-bar -->
            <?php
                include "script_php/side_bare.php";
            ?>
        </div>
    </div>
</body>
<script src="script_js/script_side_bare.js"></script>
<script src="script_js/script_statestics.js"></script>
<script src="script_php/query_php/add_general_popup/script.js"></script>
</html>