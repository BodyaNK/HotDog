<?php
    require "db.php"; 
?>
<?php
    $id = $_POST['hidden_val'];
    $query = "SELECT id, name, info, image FROM `hotdogs` WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    
    if (isset($_POST['submit'])) {
        $id = $_POST['hidden'];
        $name=$_POST['name_text'];
        $info=$_POST['info_text'];

        $img_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        if(!empty($img_name) || !empty($tmp_name)){
            move_uploaded_file($tmp_name, "images-hotdogs/".$img_name);
            $src="images-hotdogs/" . $img_name;
            $query_2 = "UPDATE hotdogs SET image ='$src' WHERE id='$id'";
            $result_2 = mysqli_query($connection, $query_2);
        }

        $query_2 = "UPDATE hotdogs SET name='$name', info='$info' WHERE id='$id'";
        $result_2 = mysqli_query($connection, $query_2);
        if($result_2){
            header("Location: index.php"); exit();
        } else{
            echo "ERROR: Could not able to execute $query_2. " . mysqli_error($connection);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="edit.css"/>
</head>
<body>

    <h1 class="mt-5">Admin page</h1>
    <div class="container">
        <form action="edit.php" method="POST" class="mx-5 mb-5" enctype="multipart/form-data">
            <div class="form-group form-row">
                <div class="col-md-6 col-sm-12">
                    <label for="Name" class="mt-2 col-form-label">Edit name</label>
                    <input class="form-control" id="Name" type='text' name='name_text' value='<?php echo $row['name']?>'/><br>
                    <label for="textarea">Description</label>
                    <textarea class="form-control" id="textarea" rows="3" name="info_text" maxlength="50"><?php echo $row['info']?></textarea><br>
                </div>
                <div class="col-md-6 col-sm-12">
                    <img class="mt-4 image" src='<?php echo $row['image']?>' width='200px' height='200px' alt=''/><br>
                    <input class="mt-1 file_input" type="file" name="image" value='<?php echo $row['image']?>'/>
                    <input type='hidden' name='hidden' value='<?php echo $row['id']?>'>
                </div>
                <input class="btn btn-warning mt-2 ml-2 mb-2" type="submit" name="submit" value="Edit"/>
                <button class='btn btn-danger mt-2 ml-2 mb-2 deleteuser' id='<?php echo $row['id']?>'>DELETE</button>
                <button class="btn btn-primary mt-2 ml-2 mb-2"><a href="index.php">Back to home</a></button>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.deleteuser').on('click', function(e)
            {
                e.preventDefault();
                var result = confirm("Do you really want to remove this?");
                if(result==true){
                    var clickBtnValue = $(this).attr('id');
                    var ajaxurl = 'delete.php',
                    data =  {'action': clickBtnValue};
                    $.post(ajaxurl, data, function (response) {
                        location.href = 'index.php';
                    });
                }
            });
        });
   </script>
</body>
</html>