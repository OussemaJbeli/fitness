<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- display absolut -->
        <div class="add_cat_frame" id="add_cat_frame">
            <div class="add_cat_panel">
                <div class="exit" id="exit_button">
                </div>
                <form action="script_php\query_php\query_insert_all.php" method="get">
                    <input  class="val" placeholder="add value" type="text" name="l_bras_val" id="l_bras_val" required>
                    <input  class="val" placeholder="add value" type="text" name="r_bras_val" id="r_bras_val" required>
                    <input  class="val" placeholder="add value" type="text" name="choulder_val" id="choulder_val" required>
                    <input  class="val" placeholder="add value" type="text" name="abdo_val" id="abdo_val" required>
                    <input  class="val" placeholder="add value" type="text" name="ass_val" id="ass_val" required>
                    <input  class="val" placeholder="add value" type="text" name="l_feet_val" id="l_feet_val" required>
                    <input  class="val" placeholder="add value" type="text" name="r_feet_val" id="r_feet_val" required>
                    <input type="submit" name="save_all_value" value="save" id="save_cat">
                </form>
            </div>
        </div>
</body>
</html>