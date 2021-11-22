<?php
  session_start();
  $mysqli = new mysqli("localhost", "root", "root", "612_Restaurant");
    $id = $_GET['idOrder'];
    $driver= $_POST['driver'];
    $status =$_POST['statuss'];
    //Update Database'
    $q="SELECT IdUsers From tbl_Order Where IdOrder='$id'";
    $update_result2 = $mysqli->query($q);
    $q1=$update_result2->fetch_array();
    $q2=$q1["IdUsers"];
    $update_sql = "UPDATE tbl_Order SET  order_status='$status' WHERE IdOrder='$id'";
    $update_result = $mysqli->query($update_sql);
    if ($update_result){
        $update_driver ="UPDATE Driver SET  DriverStatus=1 WHERE IdDriver='$driver'";
        // 
        if($mysqli->query($update_driver)== TRUE){
          $insert_Delivery="INSERT INTO Delivery(IdOrder,IdUsers,IdDriver) Values($id,$q2,$driver)";
          $update_Delivery = $mysqli->query($insert_Delivery);
    }
  }
    else{echo $mysqli->error;
        
    }
    header("location:staff_status.php"); 
?>    
