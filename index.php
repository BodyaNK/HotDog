<?php
    require "db.php"; 
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
    <link rel="stylesheet" href="styles.css"/>
    <link href="https://fonts.googleapis.com/css?family=Fascinate&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
</head>
<body>
    
    <header>
        <div id="header-back">
            <div>
                <h1>THE BEST HOT DOGS<br> IN THE WORLD</h1>
            </div>
            <div class="scroll-downs">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
            </div>
        </div>
    </header>
    <div class="container container_add mt-5 mb-5"> 
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h1 class="display-4 my-5">You can add<br> your own hot dog</h1>
            </div>
            <div class="col-md-6 col-sm-12 form-group">
                <form action="add.php" method="POST" class="form-add" enctype="multipart/form-data">
                    <label for="Name" class="mt-2 col-form-label">Name</label>
                    <input class="form-control" id="Name" type="text" name="name" placeholder="Enter name of hot dog" required/>
                    <label for="textarea">Description</label>
                    <textarea class="form-control" id="textarea" rows="3" name="info" maxlength="50"></textarea>
                    <input type="file" class="mt-1" name="image"/><br/>
                    <input type="submit" name="submit" value="Add" style="width: 100px" class="mt-1 btn btn-primary"/>
                </form>
            </div>
        </div>
    </div>
    <div>
        <h1 style="text-align: center; font-family: 'Fascinate', cursive;" class="display-3">Hod dogs</h1>
    </div>
    <div class="container mt-5 mb-4">
            <div class="row">
                <?php
                    $query = "SELECT * FROM `hotdogs`";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_array($result);
                    do{
                        echo "<div class='col-md-4 col-sm-12 box-content' style='background: url(\"".$row['image']."\"); background-size: cover;'>".
                               "<div class='blocks-content'>".
                                    "<div class='row'>".
                                        "<div class='col-md-10 col-sm-12'>".
                                            "<span class='box-name'>".$row['name']."</span><br>".
                                            "<span class='box-info'>".$row['info']."</span>".
                                        "</div>".
                                        "<div class='col-md-2 col-sm-12'>".
                                            "<form action='edit.php' method='POST'>".
                                                "<input type='hidden' name='hidden_val' value='".$row['id']."'>".
                                                "<input class='edit-btn btn btn-info' type='submit' name='edit_btn' value='Edit'>".
                                            "</form>".
                                        "</div>".
                                    "</div>".
                                "</div>".
                              "</div>";
                    }while($row = mysqli_fetch_array($result));

                ?>
            </div>
    </div>  

    <footer class='container-fluid'>
        <p>This site was developed by Nikitchuk Bogdan as a test task for the ElifTech School 2019.</p>
        <p>If you want to contact me, you can write to me here: bohdan20152000@gmail.com</p>
    </footer>

</body>
</html>