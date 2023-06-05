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
    <link rel="stylesheet" href="style/style_upload_galery.css">
    <title>galery</title>
</head>
<?php
?>
<body>
    <!-- frame -->
    <div class="galery_frame">
        <?php
            if (isset($_GET['date_ext']) || isset($_GET['date_header'])) {
                @$date_ext=$_GET['date_header'];
                if(isset($_GET['date_ext']))
                    $date_ext=$_GET['date_ext'];
            }
            echo "<p class='title'>$date_ext</p>"
        ?>
        <div class="frame" id="card_pictur">
            <div class="panel">
                <?php
                    include 'query_php/query_upload.php';
                    $tab=@select_path($date_ext)["tab"];
                    if($tab[0]==0){
                        echo"<div class='empty'></div>";
                    }
                    else{
                        for($i=0;$i<=count($tab)-1;$i++){
                            echo "<div class='card' id='".$tab[$i]."'>";
                            echo "<img src='upload_img/".$tab[$i]."' alt=''>";
                            echo "</div>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- position abs -->
    <div class="add_but" id="add_but">
    </div>
    <div class="add_pict_frame" id="add_pict_frame">
        <div class="add_pict_panel">
            <div id="exit_add"></div>
            <form action="query_php/query_upload.php" method="post" enctype="multipart/form-data">
                <input type="text" name='date_action' readonly class="date_temp" <?php echo "value='$date_ext'"?>>
                <input type="file" name='file' id="shoser" class="file_shoser" accept="image/*" required>
                <input type="submit" name="save" value="save" id="save_photo" class="butt">
            </form>
        </div>
    </div>
    <div class="image_player" id="image_player">
        <a <?php echo"href='$date_ext'"?> alt="" class="delete" id="delete"></a>
        <div class="im">
            <img src="" alt="" id="image">
        </div>
        <img src="icons/add.png" alt="" class="exite" id="exite">
    </div>
</body>
<script src="../script_js/script_galery.js"></script>
</html>