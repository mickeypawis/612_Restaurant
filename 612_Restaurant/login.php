<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Login.css">
    <title>612 Restaurant</title>
</head>
<body style="background-color: #74c69d;">
    <div class="title">
        <span>612 Restaurant</span>
    </div>
    <div class="Container" style="background-color: #95d5b2; text-align: center;">
    <form method="post" action="login.php">
        <div class="username">
            <span>Username:</span>
            <input type="text" id="username" name="username" required placeholder="Username"><br>
        </div>
        <div class="Password">
            <span>Password:</span>
            <input type="text" id="password" name="password" placeholder="Password" required>

        </div>
        <div class="submit">
            <button name="Login" type= "submit" value="Login">Login</button><br>
    
        </div>
    </form>
    <div class="Signup">
        <span>Do not have an account?</span>
        <!--Register-->
        <form role="form" name="formregister" method="post"action="login.php">
            <a href="signup.php">Sign Up here</a>
            <!-- <input type="submit" value="signup" name="Sign UP"> -->
        </form>
        <div class="as_guest">
            <a href="new_menu.php">Login as Guest</a> <!--ต้องใส่ลิ้ง-->
        </div>

    </div>
    </div>
    <?php
    $mysqli = new mysqli("localhost", "root", "root", "612_Restaurant");
    if (isset($_POST['Login'])) {
        //รับค่า user & password
        $username = $_POST['username'];
        $password = $_POST['password'];

        //query 
        $sql = "SELECT * FROM users WHERE username = '$username' AND UserPassword = '$password'";
        $result = $mysqli->query($sql);

        // หาจำนวนเรกคอร์ดข้อมูล
        if (mysqli_num_rows($result) > 0) {
            session_start();
            $uid_sql="SELECT IdUsers,UserType FROM users WHERE username = '$username' AND UserPassword = '$password'";
            $result2 = $mysqli->query($uid_sql);
            $item = $result2->fetch_array();
            $_SESSION['IdUsers'] = $item['IdUsers'];
            if($item['UserType']==0){
                header("location: new_menu.php");
            }
            else{
                header("location: staff_menu.html");
            }
             //ไปไปตามหน้าที่คุณต้องการ

        } else {
            $code_error = "<BR><FONT COLOR=\"red\">Incorrect Username or Password</FONT>";
            echo ($code_error);
            header("location: login.php"); //ไม่ถูกต้องให้กับไปหน้าเดิม
        }
    }
    ?>
</body>
</html>