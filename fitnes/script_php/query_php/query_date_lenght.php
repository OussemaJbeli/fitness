<?php
    function date_lenght(){
        include 'connection.php';
        // Select data from table
        $sql = "SELECT date FROM `body` GROUP BY date";
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
    return $tab;
    }
?>