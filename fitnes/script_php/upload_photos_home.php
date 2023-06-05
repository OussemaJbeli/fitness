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
    <link rel="stylesheet" href="style/style_upload_home.css">
    <title>Document</title>
</head>
<body>
    <?php 
        include "query_php\query_upload.php"
    ?>
    <div class="upload_page">
        <!-- categoris -->
        <div class="upload_cat">
            <p class="title">upload your pictur</p>
            <div class="cat_fram">
                <div class="cat_panel">
                    <?php 
                        if(select_cat()[0]==0){
                            echo"<div class='empty'></div>";
                        }
                        else{
                            for($i=0;$i<=count(select_cat())-1;$i++){
                                echo '<a class="card" href="upload_photo_galery.php ?date_ext='.select_cat()[$i].'"  target="_blank">';
                                echo "<p>date</p>";
                                echo "<p class='date'>".select_cat()[$i]."</p>";
                                echo "</a>";
                            }
                        }
                    ?>    
                </div>
                <?php 
                    $date = date("d/m/y");
                    echo<<<link
                            <a href="query_php/query_upload.php? add_cat='$date'" class="add"></a>
                    link;
                ?>
            </div>
        </div>
        <!-- logo -->
        <div class="upload_logo">
            <div class="log"></div>
        </div>
        <!-- separateur _ abs -->
        <div class="separateur">

        </div>
    </div>
</body>
</html>