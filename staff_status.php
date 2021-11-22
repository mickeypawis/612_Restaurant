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
        <a  href="staff_menu.php">Menu</a>
        <a href="userprofile.php">Profile</a>
        <a class="active" href="staff_status.php">Status</a>
        <a href="edit_menu.php">Edit Menu</a>
        <a href="see_feedback.php">See Feedback</a>
        <a href="ingredient.php">Ingredient</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="title">
        <span>Status</span>
    </div>
    <div class="detail" style="background-color: white;">
        <div class="showdetail">
            <table style="width:100%">
                <tr>
                    <th>Order ID </th>
                    <th>Date</th>
                    <th>Dine In/Take Away</th>
                    <th>Status</th>
                    <!-- <th>Deilvered By</th> -->
                    <th>Edit</th>
                    <!-- <th>Delete</th> -->
                </tr>
                <?php
                $sql2 = "SELECT * FROM tbl_Order ";
                $result2=$mysqli->query($sql2);
                 while($order=$result2->fetch_array()){
                    echo"<tr>";
                    echo'<th> <a href="edit_status.php">Order ID:' .$order["IdOrder"]."</a></th>";
                    echo'<th>'.$order["CreationDate"]."</th>";
                    echo'<th>'.$order["Where2eat"]."</th>";
                    echo'<th>'.$order['order_status']."</th>";?>
                    <!-- <th></th> -->
                    <th> <a href='edit_order.php?id=<?=$order["IdOrder"]?>'>Edit</a></th>
                    </tr>
                    <?php } ?>
            </table>    
        </div>
    </div>
</body>
</html>
