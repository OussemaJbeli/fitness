<?php
    include "connection.php";
    if(isset($_GET['save_all_value'])){
        $tab = array();
        /** */
        $tab[0][0]='left_bra';
        $tab[0][1]=$_GET['l_bras_val'];
        /** */
        $tab[1][0]='rigth_bra';
        $tab[1][1]=$_GET['r_bras_val'];
        /** */
        $tab[2][0]='ktaf';
        $tab[2][1]=$_GET['choulder_val'];
        /** */
        $tab[3][0]='kirch';
        $tab[3][1]=$_GET['abdo_val'];
        /** */
        $tab[4][0]='ass';
        $tab[4][1]=$_GET['ass_val'];
        /** */
        $tab[5][0]='left_fit';
        $tab[5][1]=$_GET['l_feet_val'];
        /** */
        $tab[6][0]='rigth_fit';
        $tab[6][1]=$_GET['r_feet_val'];

        insert_all_values($tab);
        header('location: ../../index.php');
    }
    function insert_all_values($tab){
        include 'connection.php';
        $date = date("d-m");
        for($i=0;$i<=6;$i++){
            $sql = "INSERT INTO `body`(`type`, `value`, `date`) 
                    VALUES ('".$tab[$i][0]."',".$tab[$i][1].",'$date')";
            $conn->execute_query($sql);
        }
    }
?>