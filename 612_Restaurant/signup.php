<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>612 Restaurant</title>
</head>
<body style="background-color: #74c69d;">
    <div class="title">
        <span>Fill in your information</span>
    </div>
    <form role="form" method="post" action="signup.php">
        <div class="fillin">
            <div class="fname">
                <span>First name:</span>
                <input type="text" id="fname" name="fname">
            </div>
            <div class="lname">
                <span>Last name:</span>
                <input type="text" id="lname" name="lname">
            </div>
            <div class="Address">
                <span>Address:</span>
                <input type="text" id="Address" name="Address">
            </div>
            <div class="Password">
                <span>Email:</span>
                <input type="text" id="email" name="email">
            </div>
            <div class="Username">
                <span>Username:</span>
                <input type="text" id="username" name="username">
            </div>
            <div class="Password">
                <span>Password:</span>
                <input type="password" id="password" name="password">
            </div>
        <!-- <div class="Cpassword">
            <span>Confirm Password:</span>
            <input type="text" id="cpassword" name="cpassword">
        </div> -->
            <div class="submit">
                <button name="Signup" type= "submit" value="Signup">Sign up</button><br>
                <br>
                <br>
            </div>
        </div>
    </form>
    <?php
    $mysqli = new mysqli("localhost", "root", "root", "612_Restaurant");
    if (isset($_POST['Signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $email = $_POST['email'];
        $address=$_POST['Address'];

        // $query = "SELECT MAX(TRIM(LEADING 'U' FROM IdUsers)) as IdUsers FROM users;";
        // $result = $mysqli->query($query) or die('There was an error running the query [' . $mysqli->error . ']');
        // $row = $result->fetch_assoc();
        // $last_user_id = empty($row['IdUsers']) ? 0 : $row['IdUsers'];
        // $lastnumid = ltrim($last_user_id, "0");
        // $next_user_id = 'U' . str_pad($lastnumid + 1, 4, "0", STR_PAD_LEFT);

        $query1 = "INSERT INTO users (username,UserPassword,userfname,userlname,useremail,useraddress,usertype) 
        VALUES ('$username','$password','$firstname','$lastname','$email','$address','1')";

        $result2 = $mysqli->query($query1);
        header("location: login.php");

    }
    ?>
    
</body>
</html>