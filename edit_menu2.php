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
                $sql2 = "SELECT * FROM tbl_product where id=$id" ;
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
        <span>Edit Menu</span>
    </div>
    <div class="fillin">
        <form method="post" action="updatemenu.php">
        <div class="fname">
            <span>Menu ID:</span>
            <input type="text" name="id" id="id" value="<?php echo $result2["id"]?>">
            
        </div>
        <div class="lname">
            <span>Name:</span>
            <input type="text" name="Name" id="Name" value="<?php echo $result2["name"]?>">
        </div>
        <div class="Address">
            <span>Image:</span>
            <input type="text" name="image" id="image" value="<?php echo $result2["image"]?>">
        </div>
        <div class="Email">
            <span>Price:</span>
            <input type="text" name="price" id="price" value="<?php echo $result2["price"]?>">
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