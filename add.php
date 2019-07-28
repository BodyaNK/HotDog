<?php
    require "db.php"; 
?>
<?php
    
    if(isset($_POST['submit']))
    {
        $data=$_POST; 
        $name=$data['name'];
        $info=$data['info'];
        if(!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
            $src="images-hotdogs/img1.jpg";
        } else{
            $img_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            move_uploaded_file($tmp_name, "images-hotdogs/".$img_name);
            $src="images-hotdogs/".$img_name;
        }
        $query = "INSERT INTO hotdogs (name, info, image) VALUES ('$name', '$info', '$src')";
        $result = mysqli_query($connection, $query);
        if($result){
            header("Location: index.php"); exit();
        } else{
            echo "<div style='color:red'>Error!!!</div><hr>";
        }
    }
?>