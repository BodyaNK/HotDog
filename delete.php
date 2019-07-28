<?php
    require "db.php"; 

    if (isset($_POST['action'])) {
        $val = $_POST['action'];
        $query = "DELETE FROM hotdogs WHERE id = '$val'";
        $result = mysqli_query($connection, $query);
        header("Location: index.php"); exit();
    }
    
?>