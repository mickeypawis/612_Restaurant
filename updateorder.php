<?php
  session_start();
  $mysqli = new mysqli("localhost", "root", "root", "612_Restaurant");
  $userid = $_SESSION['IdUsers'];
  foreach ($_SESSION["shopping_cart"] as $keys => $values){
      $details=$details.$values["item_name"].$_SESSION["item_quantity"]*$values["item_price"]."  ";
  }
  $totalprice=$_SESSION["totalprice"];
  $where=$_POST["where"];
  echo $where;
  echo $userid.$details.$totalprice;
    // $firstname = $_POST['fname'];
    // $lastname = $_POST['lname'];
    // $address = $_POST['Address'];
    // $passsword =$_POST['password'];
    // $email = $_POST['email'];
    $insert_order="INSERT INTO tbl_Order(IdUsers,Where2eat) values ($userid,'$where')";
    //$insert_sql = "INSERT INTO OrderDetails(IdOrder,IdUsers,Details,TotalPrice) Values ((Select max(tbl_Order.IdOrder) from tbl_Order where IdUsers=$userid),$userid,'$details',$totalprice)";
    
    if ($mysqli->query($insert_order) === TRUE) {
        echo "New record created successfully";
        $insert_sql = "INSERT INTO OrderDetails(IdOrder,IdUsers,Details,TotalPrice) Values ((Select max(tbl_Order.IdOrder) from tbl_Order where IdUsers=$userid),$userid,'$details',$totalprice)";
        if($mysqli->query($insert_sql)==TRUE){
          header("location:status.php");
        }
        
    }
    // else{echo $mysqli->error;}
    //     header("location: login.php");
    else {
        echo "Error: " . $insert_sql . "<br>" . $mysqli->error;
      }
?>
