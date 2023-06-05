<?php
if(isset($_GET['button_choulder'])){
    $bras="ktaf";
    $task_name=$_GET["button_choulder"];
    insert_aktef($bras,$task_name);
    header('location: ..\choulder.php');
}
function insert_aktef($side,$val){
    include 'connection.php';
    $labels = select_aktef_date()[count(select_aktef_date())-1];
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
function select_aktef(){
    include 'connection.php';
    // Select data from table
    $sql = "SELECT * FROM `body` WHERE `type`='ktaf'";
    $result = mysqli_query($conn, $sql);
    // Declare empty two-dimensional array
    $tab = array();
    $count = 0;
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            $tab[$count] = $row["value"];
            $count++;
        }
    }
    else
        $tab[0]=0;                       
return $tab;
}
function select_aktef_date(){
    include 'connection.php';
    // Select data from table
    $sql = "SELECT * FROM `body` WHERE `type`='ktaf'";
    $result = mysqli_query($conn, $sql);
    // Declare empty two-dimensional array
    $tab = array();
    $count = 0;
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            $tab[$count] = $row["date"];
            $count++;
        }
    }
    else
        $tab[0]=0;                       
return $tab;
}
?>