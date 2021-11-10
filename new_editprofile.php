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
        <span>User Profile</span>
    </div>
    <div class="fillin">
        <form method="post" action="update.php">
        <div class="fname">
            <span>First name:</span>
            <input type="text" name="fname" id="fname" value="<?php echo $user["UserFname"]?>">
            
        </div>
        <div class="lname">
            <span>Last name:</span>
            <input type="text" name="lname" id="lname" value="<?php echo $user["UserLname"]?>">
        </div>
        <div class="Address">
            <span>Address:</span>
            <input type="text" name="Address" id="Address" value="<?php echo $user["UserAddress"]?>">
        </div>
        <div class="Email">
            <span>Email:</span>
            <input type="text" name="email" id="email" value="<?php echo $user["UserEmail"]?>">
        </div>
        <div class="Password">
            <span>Password:</span>
            <input type="text" name="password" id="password" value="<?php echo $user["UserPassword"]?>">
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