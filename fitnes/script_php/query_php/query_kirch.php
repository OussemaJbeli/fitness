<?php
    if(isset($_GET['button_kirch'])){
        $bras="kirch";
        $task_name=$_GET["button_kirch"];
        insert_kirch_ass($bras,$task_name);
        header('location: ..\abdo.php');
    }
    if(isset($_GET['button_ass'])){
        $bras="ass";
        $task_name=$_GET["button_ass"];
        insert_kirch_ass($bras,$task_name);
        header('location: ..\abdo.php');
    }
    function insert_kirch_ass($side,$val){
        include 'connection.php';
        /**rigth default */
        $tab=select_kirch()["kirch_date"];
        /**if left */
        if($side=="ass")
        $tab=select_kirch()["ass_date"];

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
    function select_kirch(){
        include 'connection.php';
        // Select data from table
        $sql = "SELECT type,value,date
                FROM `body` 
                WHERE `type`='kirch' or `type`='ass'";
        $result = mysqli_query($conn, $sql);
        // Declare empty two-dimensional array
        $tab_kirch = array();
        $tab_kirch_date = array();
        $tab_ass = array();
        $tab_ass_date = array();
        $count1 = 0;$count2 = 0;
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                $type= $row["type"];
                $value= $row["value"];
                $date= $row["date"];
                if($type=="kirch"){
                    $tab_kirch[$count1]= $value;
                    $tab_kirch_date[$count1]= $date;
                    $count1++;
                }
                if($type=="ass"){
                    $tab_ass[$count2]= $value;
                    $tab_ass_date[$count2]= $date;
                    $count2++;
                }
                
            }
        } 
        else{
            $tab_kirch[0] = 0;
            $tab_ass[0] = 0;
        }
        $array = ["kirch" => $tab_kirch,"ass" => $tab_ass,"kirch_date" => $tab_kirch_date,"ass_date" => $tab_ass_date];                         
    return $array;
    }
?>