<?php
    if(isset($_GET['button_left_bras'])){
        $bras="left_bra";
        $task_name=$_GET["button_left_bras"];
        insert_bras($bras,$task_name);
        header('location: ..\bi_tri.php');
    }
    if(isset($_GET['button_rigth_bras'])){
        $bras="rigth_bra";
        $task_name=$_GET["button_rigth_bras"];
        insert_bras($bras,$task_name);
        header('location: ..\bi_tri.php');
    }
    function insert_bras($side,$val){
        include 'connection.php';
        /**rigth default */
        $tab=select_left_rigth()["right_date"];
        /**if left */
        if($side=="left_bra")
        $tab=select_left_rigth()["left_date"];

        $labels = $tab[count($tab)-1];
        $date = date("d-m");
        if($labels == $date){
            $sql = "UPDATE `body` 
                    SET `value`=$val
                    WHERE `date`='$labels' and `type`='$side'";
        }
        else{
            $sql = "INSERT INTO `body`(`type`, `value`, `date`) 
                    VALUES ('$side',$val,'$date')";
        }
        $conn->execute_query($sql);
    }
    function select_bras(){
        include 'connection.php';
        // Select data from table
        $sql = "SELECT sum(value) 
                FROM `body` 
                WHERE `type`='rigth_bra' or `type`='left_bra' 
                GROUP BY date";
        $result = mysqli_query($conn, $sql);
        // Declare empty two-dimensional array
        $tab = array();
        $count = 0;
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                $tab[$count] = $row["sum(value)"];
                $count++;
            }
        }
        else
            $tab[0]=0;
    return $tab;
    }
    function select_left_rigth(){
        include 'connection.php';
        // Select data from table
        $sql = "SELECT type,value,date
                FROM `body` 
                WHERE `type`='rigth_bra' or `type`='left_bra'";
        $result = mysqli_query($conn, $sql);
        // Declare empty two-dimensional array
        $tab_left = array();
        $tab_left_date = array();
        $tab_rigth = array();
        $tab_rigth_date = array();
        $count1 = 0;$count2 = 0;
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                $type= $row["type"];
                $value= $row["value"];
                $date= $row["date"];
                if($type=="rigth_bra"){
                    $tab_rigth[$count1]= $value;
                    $tab_rigth_date[$count1]= $date;
                    $count1++;
                }
                if($type=="left_bra"){
                    $tab_left[$count2]= $value;
                    $tab_left_date[$count2]= $date;
                    $count2++;
                }
                
            }
        }  
        else{
            $tab_left[] = 0;
            $tab_rigth[] = 0;
        }
        $array = ["left" => $tab_left,"right" => $tab_rigth,"left_date" => $tab_left_date,"right_date" => $tab_rigth_date];                         
    return $array;
    }
?>