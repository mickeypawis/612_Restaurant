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
    <link rel="stylesheet" href="menu.css">
    <title>Status</title>
</head>
<body style="background-color: #b7e4c7;">
    <div class="topnav">
        <a href="staff_menu.php">Menu</a>
        <a href="userprofile.php">Profile</a>
        <a href="staff_status.php">Status</a>
        <a href="edit_menu.php">Edit Menu</a>
        <a href="see_feedback.php">See Feedback</a>
        <a class="active"href="ingredient.php">Ingredient</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="title">
        <span>Ingredient</span>
    </div>
    <div class="detail" style="background-color: white;">
        <div class="showdetail">
            <table style="width:100%">
                <tr>
                    <th>Ingredient ID </th>
                    <th>Ingredient Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $sql2 = "SELECT * FROM Ingredients";
                $result2=$mysqli->query($sql2);
                 while($ingredient=$result2->fetch_array()){
                    echo"<tr>";
                    echo'<th>Ingredient ID:' .$ingredient["IdIngredient"]."</th>";
                    echo'<th>'.$ingredient["Name"]."</th>";
                    echo'<th>'.$ingredient["Description"]."</th>";
                    echo'<th>'.$ingredient['Quantity']."</th>";?>
                    <th> <a href='edit_ingredient.php?id=<?=$ingredient["IdIngredient"]?>'>Edit</a></th>
                    <th> <a href='delete_ingredient.php?id=<?=$ingredient["IdIngredient"]?>'>Delete</a></th>
                    </tr>
                    <?php } ?>
            </table>    
        </div>
        <a href="add_ingredient.php">Add Ingredient</a>  
    </div>
</body>
</html>
