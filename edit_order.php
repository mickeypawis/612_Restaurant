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
$id = $_GET['id']; //
$sql3 = "SELECT tbl_Order.IdOrder,tbl_Order.IdUsers,tbl_Order.Where2eat,tbl_Order.CreationDate,tbl_Order.order_status, OrderDetails.Details,OrderDetails.TotalPrice,tbl_Order.PaymentSlip FROM tbl_Order,OrderDetails where tbl_Order.IdOrder=$id AND OrderDetails.IdOrder=$id" ;
$Detail=$mysqli->query($sql3);
$result3=$Detail->fetch_array();
$idOrder=$result3["IdOrder"];
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
        <span>Editing Order Status</span>
    </div>
    <div class="info" style="font-size:140%;">
    <form method="post"action="update_main.php?idOrder=<?php echo $idOrder?>">
        <div>
            
            <span>Order ID:<?php echo $result3["IdOrder"]?></span>
        </div>
        <div>
            <span>Total Price:<?php echo $result3["TotalPrice"]?></span>
        </div>
        <div>
            <span>Dine In/Delivery:<?php echo $result3["Where2eat"]?></span>
        </div>
        <div>
            <span>Payment Details:</span><br>
            <img src="<?php echo $result3["PaymentSlip"]?>" alt="Slip" style="width:300px; height=:300px;">
        </div>
        <!-- <div class="textbox">
            <span>Coupon Code:</span>
            <input type="text" id="coupon_code" name="coupon_code" style="font-size:120%; position: relative; border-radius: 10px;">
        </div> -->
        <div>
        <!-- <form action="/action_page.php"> -->
            <label for="driver">Delivery By:</label>
            <select name="driver" id="driver">
            <option value=0>---</option>
            <?php
            $sql2 = "SELECT * FROM Driver where DriverStatus=0";
            $result2=$mysqli->query($sql2);
            while($driver=$result2->fetch_array()){
              echo'<option value="'.$driver["IdDriver"].'">'.$driver["Name"].'</option>';}?>
            </select>
            
        </div>
        <div>
        <!-- <form action="/action_page.php"> -->
            <label for="statuss">Status:</label>
            <select name="statuss" id="statuss">
              <option value="pending">Pending</option>
              <option value="Purchased">Purchased</option>
              <option value="Delivered">Delivered</option>
              <option value="Completed">Completed</option>
            </select>
          <!-- </form> -->
        </div>
        <div>
            <input type="submit" name="save" id="save" value="save">
            <!-- style="font-size:150%; position: relative; border: 2px solid #2D6A4F; border-radius: 10px;">Confirm -->
                <!-- </button> -->
            
        </div>
    </form>
</div>
</body>
</html>

