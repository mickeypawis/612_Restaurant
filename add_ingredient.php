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
        <a href="new_menu.php">Menu</a>
        <a href="userprofile.php">Profile</a>
        <a href="staff_status.php">Order</a>
        <a href="edit_menu.php">Edit Menu</a>
        <a class="active" href="ingredient.php">Ingredient</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="title" style="font-size:300%; position: relative; text-align: center;">
        <span>Add Ingredient</span>
    </div>
    <br><br>  
    <div class="info" style="font-size:140%;">
    <form method="post"action="add_ingredient.php">
        <div class="textbox">
            <span>Ingredient ID:</span>
            <input type="text" id="Ingredient_ID" name="Ingredient_ID" style="font-size:120%; position: relative; border-radius: 10px;">
        </div>
        <div class="textbox">
            <span>Ingredient Name:</span>
            <input type="text" id="name" name="name" style="font-size:120%; position: relative; border-radius: 10px;">
        </div>
        <div class="textbox">
            <span>Description:</span>
            <input type="text" id="description" name="description" style="font-size:120%; position: relative; border-radius: 10px;">
        </div>
        <div class="textbox">
            <span>Quantity:</span>
            <input type="text" id="Quantity" name="Quantity" style="font-size:120%; position: relative; border-radius: 10px;">
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
    $ID=$_POST["Ingredient_ID"];
    $name=$_POST["name"];
    $descrip=$_POST["description"];
    $quantity=$_POST["Quantity"];
    if (isset($_POST["confirm"])){
        //query
        $sql="INSERT INTO Ingredients(IdIngredient,`Name`,`Description`,Quantity) values ('$ID','$name','$descrip',$quantity)";
        if($mysqli->query($sql)==TRUE){
            header("location: ingredient.php");
        }
        else{
            echo "Error: " . $insert_sql . "<br>" . $mysqli->error;
        }

    }