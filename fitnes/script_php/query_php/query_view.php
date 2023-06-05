    <?php 
        function root(){
            $tab =select_them();
            echo "--main_color2:".$tab[4].";";
            echo "--main_color3:".$tab[2].";";
            echo "--main_font:".$tab[3].";";
            echo "--bg:url(".$tab[1].");";
            echo "--man:url(".$tab[0].");";
        }
    function select_them(){
        
        include 'connection.php';
        // Select data from table
        $sql = "SELECT * FROM `thems`";
        $result = mysqli_query($conn, $sql);
        // Declare empty two-dimensional array
        $tab = array();
        $count = 0;
        if (mysqli_num_rows($result) > 0) 
        {  
            while($row = mysqli_fetch_assoc($result)) 
            {    
                $test = $row["selected"];
                if($test == 1)
                {   
                    $tab[0] = $row["man_path"];
                    $tab[1] = $row["bg_path"];
                    $tab[2] = $row["border_color"];
                    $tab[3] = $row["font_family"];
                    $tab[4] = $row["card_color"];
                    $count++;
                }
            }
        }
    return $tab;
    }

    if(isset($_GET["color"])){
        $color=$_GET["color"];
        update_theme($color);
        header('location: ../../index.php?');
    }
    function update_theme($color1){
        $color2='red';
        if($color1=='red')
            $color2='blue';
        include 'connection.php';
        $sql = "UPDATE `thems` 
                SET `selected`= 1 
                WHERE color = '$color1'";
        $conn->execute_query($sql);

        $sql = "UPDATE `thems` 
                SET `selected`= 0 
                WHERE color = '$color2'";
        $conn->execute_query($sql);
    }        
    
?>