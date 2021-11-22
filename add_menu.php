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
    <title>612 Restaurant</title>
    <link rel="stylesheet" href="menu.css">
</head>

<body style="background-color: #b7e4c7;">
    <div class="topnav">
        <a href="staff_menu.php">Menu</a>
        <a href="userprofile.php">Profile</a>
        <a href="staff_status.php">Your Order</a>
        <a class="active" href="edit_menu.php">Edit Menu</a>
        <a href="ingredient.php">Ingredient</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="title" style="font-size:300%; position: relative; text-align: center;">
        <span>Add Menu</span>
    </div>
    <br><br>  
    <div class="info" style="font-size:140%;">
    <form method="post"action="add_menu.php">
        <!-- <div class="textbox">
            <span>Menu ID:</span>
            <input type="text" id="menu_id" name="menu_id" style="font-size:120%; position: relative; border-radius: 10px;">
        </div> -->
        <div class="textbox">
            <span>Menu Name:</span>
            <input type="text" id="menu_name" name="menu_name" style="font-size:120%; position: relative; border-radius: 10px;">
        </div>
        <div class="textbox">
            <span>Menu Price:</span>
            <input type="text" id="menu_price" name="menu_price" style="font-size:120%; position: relative; border-radius: 10px;">
        </div>
        <div>
            <span>Upload Your Menu Picture:</span>
            <input type="file" id="img" name="img" accept="image/*">
        </div>
        <div>
        <div class="submit">
            <button name="confirm" type="submit" value="confirm" style="font-size:150%; position: relative; border: 2px solid #2D6A4F; border-radius: 10px; ">Confirm
                </button>
            
        </div>
    </form>
</div>
</body>
</html>
<?php
    $MenuID=$_POST["menu_id"];
    $Price=$_POST["menu_price"];
    $Name=$_POST["menu_name"];
    $slip=$_POST["img"];
    $img='image/'.$slip;
    if (isset($_POST["confirm"])){
        //query
        $sql="INSERT INTO tbl_product(name,image,price) values ('$Name','$img',$Price)";
        if($mysqli->query($sql)==TRUE){
            header("location: edit_menu.php");
        }
        else{
            echo "Error: " . $insert_sql . "<br>" . $mysqli->error;
        }

    }
?>