<?php
  session_start();
  $mysqli = new mysqli("localhost", "root", "root", "612_Restaurant");
  $userid = $_SESSION['IdUsers'];
  foreach ($_SESSION["shopping_cart"] as $keys => $values){
      $details=$details.$values["item_name"].$_SESSION["item_quantity"]*$values["item_price"]."  ";
  }
  $totalprice=$_SESSION["totalprice"];
  $where=$_POST["where"];
  $payment =$_POST["payment"];
  $slip=$_POST["img"];
  $img='image/'.$slip;
  // echo $payment;
  // echo $where;
  // echo $userid.$details.$totalprice;
  // echo $slip;
    // $firstname = $_POST['fname'];
    // $lastname = $_POST['lname'];
    // $address = $_POST['Address'];
    // $passsword =$_POST['password'];
    // $email = $_POST['email'];
    $insert_order="INSERT INTO tbl_Order(IdUsers,Where2eat,order_status,PaymentSlip) values ($userid,'$where','pending','$img')";
    if ($mysqli->query($insert_order) === TRUE) {
        //echo "New record created successfully";
        $insert_sql = "INSERT INTO OrderDetails(IdOrder,IdUsers,Details,TotalPrice) Values ((Select max(tbl_Order.IdOrder) from tbl_Order where IdUsers=$userid),$userid,'$details',$totalprice)";
        if($mysqli->query($insert_sql)==TRUE){
            $insert_payment ="INSERT INTO Payment(IdUsers,IdOrder,PaymentMethod,PaymentStatus,Payment_Slip,TotalPrice) Values ($userid,(select max(tbl_Order.IdOrder) from tbl_Order where IdUsers=$userid),'$payment','Completed','$img',$totalprice)";
          // if($mysqli->query($insert_payment)==TRUE){
            if($mysqli->query($insert_payment)== TRUE){
            header("location:status.php"); 
          }
          
        }
      }
    // else{echo $mysqli->error;}
    //     header("location: login.php");
    else {
        echo "Error: " . $insert_sql . "<br>" . $mysqli->error;
      }
?>
