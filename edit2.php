<?php
    require "db.php"; 

    if (isset($_POST['submit'])) {
        $id = $_POST['hidden'];
        $name=$_POST['name_text'];
        $info=$_POST['info_text'];
        $query_2 = "UPDATE hotdogs SET name='$name', info='$info' WHERE id='$id'";
        $result_2 = mysqli_query($connection, $query_2);
        if($result_2){
            echo "Records were updated successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }

?>