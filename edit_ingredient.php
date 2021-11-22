<?php
                session_start();
                $mysqli = new mysqli("localhost", "root", "root", "612_Restaurant");
                $userid = $_SESSION['IdUsers'];

                $sql = "SELECT * FROM users WHERE IdUsers = '$userid'";
                $result = $mysqli->query($sql);
                if (!$result) {
                    echo "Select failed!<br/>";
                    echo $mysqli->error;
                } else {
                    $user = $result->fetch_array();
                }
                $id = $_GET['id'];
                $sql2 = "SELECT * FROM Ingredients where IdIngredient=$id" ;
                $menu=$mysqli->query($sql2);
                $result2=$menu->fetch_array();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit_user_profile.css">
    <title>612 Restaurant</title>
</head>
<body style="background-color: #74c69d;">
    <div class="title">
        <span>Edit Ingredient</span>
    </div>
    <div class="fillin">
        <form method="post" action="updateingredient.php">
        <div class="fname">
            <span>Ingredient ID:</span>
            <input type="text" name="id" id="id" value="<?php echo $result2["IdIngredient"]?>">
            
        </div>
        <div class="lname">
            <span>Name:</span>
            <input type="text" name="Name" id="Name" value="<?php echo $result2["Name"]?>">
        </div>
        <div class="Address">
            <span>Description:</span>
            <input type="text" name="descrip" id="descrip" value="<?php echo $result2["Description"]?>">
        </div>
        <div class="Email">
            <span>Quantity:</span>
            <input type="text" name="quantity" id="quantity" value="<?php echo $result2["Quantity"]?>">
        </div>
        <div class="edit">
            <!-- <form action="update.php"> -->
                <input type="submit" name="save" id="save" value="save">
                <br>
            <!-- </form> -->
        <br>
        <br>
        
        </div>
        </form>
    </div>

</body>
</html>