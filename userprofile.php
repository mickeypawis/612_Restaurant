
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
        <div class="fname">
            <span>First name:</span>
            <?php echo $user["UserFname"]?>
            
        </div>
        <div class="lname">
            <span>Last name:</span>
            <?php echo $user["UserLname"]?>
        </div>
        <div class="Address">
            <span>Address:</span>
            <?php echo $user["UserAddress"]?>
        </div>
        <div class="Email">
            <span>Email:</span>
            <?php echo $user["UserEmail"]?>
        </div>
        <div class="edit">
            <form action="new_editprofile.php">
            <!-- <button name="Edit" type= "submit " value="Edit">Edit</button> -->
                <a href="new_editprofile.php">Edit</a>
            <br>
            </form>
        <br>
        <br>
        
        </div>
    </div>
    
    
</body>
</html>