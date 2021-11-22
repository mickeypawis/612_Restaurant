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
    <link rel="stylesheet" href="payment.css">
</head>

<body style="background-color: #b7e4c7;">
    <div class="title" style="font-size:300%; position: relative; text-align: center;">
        <span>Payment</span>
    </div>
    <div class="info" style="font-size:140%;">
    <form method="post"action="updateorderandpayment.php">
        <div>
            <span>Your Address:</span><?php echo $user["UserAddress"] ?>
        </div>
        <div>
            <span>Total Price:</span>
            <?php echo $_SESSION["totalprice"]; ?>
        </div>
        <div>
            <span>Dine In/Delivery:</span>
            <!-- <form action="payment.html"> -->
            <input type="radio" id="where" name="where" value="Dine In">
             <label for="Dine In">Dine In</label>
             <input type="radio" id="where" name="where" value="Delivery">
             <label for="Delivery">Delivery</label><br>
            <!-- </form> -->
        </div>
        <div>
            <span>Payment Method:</span>
            <!-- <form action="payment.html"> -->
            <input type="radio" id="payment" name="payment" value="cash">
             <label for="cash">Cash</label>
             <input type="radio" id="payment" name="payment" value="Online_Banking">
             <label for="Online_Banking">Online Banking</label><br>
            <!-- </form> -->
        </div>
        <div>
            <span>Upload Your Online Banking Slip</span>
            <input type="file" id="img" name="img" accept="image/*">
        </div>
 
        <div class="submit">
            <button name="confirm_order" type="submit" value="confirm_order" style="font-size:150%; position: relative; border: 2px solid #2D6A4F; border-radius: 10px;">Confirm
                Order</button>
            
        </div>
    </form>
</div>
</body>
</html>
