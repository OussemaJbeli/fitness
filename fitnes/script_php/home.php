<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "query_php\add_general_popup\add.php";
    ?>
    <div class="home_page">
        <div class="card">
            <div class="deteles">
                <p class="title_fitnes">fitness</p>
                <p class="paragraph">Build <span>Perfect</span> Body With <span>Clean</span> Mind</p>
                <div class="buttons">
                    <p class="but" id="add_value_quick">start</p>
                    <a href="script_php\upload_photos_home.php" class="but" id="upload_photos" target="_blank">upload</a>
                </div>
            </div>
            <div class="image_modole" id="image_modole">
            </div>
        </div>
    </div>
</body>
<script src="query_php\add_general_popup\script.js"></script>
</html>