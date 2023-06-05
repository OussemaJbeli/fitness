<?php
    if(isset($_GET['add_cat'])){
        $date1=$_GET['add_cat'];
        insert_cat($date1);
        header('location: ../upload_photos_home.php');
    }
    if(isset($_GET['delete_pictur'])){
        $path=$_GET['delete_pictur'];
        $date=$_GET['delete_date'];
        delete_photo($path,$date);
        header('location: ../upload_photo_galery.php ?date_header='.$date);
    }
    if (isset($_POST['save'])) {
        // Check if a file was uploaded
        if (isset($_FILES['file'])) {
            include 'query_php/query_upload.php';
            $date=$_POST['date_action'];
            $souceFilePath = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'].'oussema';
            $destirnationFilePath = 'C:/xampp/htdocs/fitnes/script_php/upload_img/'.$name;
            move_uploaded_file($souceFilePath, $destirnationFilePath);
            insert_path($name,$date);
            header('location: ../upload_photo_galery.php ?date_header='.$date);
        }
    }
    function delete_photo($path,$date){
        include 'connection.php';
        $sql = "DELETE FROM `upload` 
                WHERE path='$path' and date='$date'";
        $conn->execute_query($sql);
    }
    function insert_cat($date){
        include 'connection.php';
        $date2="'".select_cat()[count(select_cat())-1]."'";
        if($date2 !== $date){
            // $sql = "INSERT INTO `upload`(`date`,`path`) VALUES ('$date','null')";
            $sql = "INSERT INTO `upload`(`date`, `path`) VALUES ($date,'null')";
            $conn->execute_query($sql);
        }
    }
    function select_cat(){
        include 'connection.php';
        // Select data from table
        $sql = "SELECT DISTINCT date 
                FROM `upload`";
        $result = mysqli_query($conn, $sql);
        // Declare empty two-dimensional array
        $tab_date = array();
        $count1 = 0;
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                $date= $row['date'];
                $tab_date[$count1]= $date;
                $count1++;
            }
        } 
        else{
            $tab_date[0]= 0;
        }                       
    return $tab_date;
    }
    function insert_path($name,$date){
        include 'connection.php';
        // Select data from table
        $sql = "INSERT INTO `upload`(`date`, `path`) 
                VALUES ('$date','$name')";
        $conn->execute_query($sql);                      
    }
    function select_path($date){
        include 'connection.php';
        // Select data from table
        $sql = "SELECT path 
                from `upload` 
                where date='$date'";
        $result = mysqli_query($conn, $sql);
        // Declare empty two-dimensional array
        $tab_path = array();
        $count1 = 0;
        if (mysqli_num_rows($result) > 1) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                $test= $row["path"];
                if($test != 'null'){   
                    $tab_path[$count1]= $test;
                    $count1++;
                }
            }
        } 
        else{
            $tab_path[0]= 0;
        }      
        $array=["tab"=>$tab_path,"current_date"=>$date];
    return $array;
    }
?>