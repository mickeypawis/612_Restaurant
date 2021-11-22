<?php
  session_start();
  $mysqli = new mysqli("localhost", "root", "root", "612_Restaurant");
  $userid = $_SESSION['IdUsers'];
  $feedback=$_POST["commend"];

  $insert_commend ="INSERT INTO Feedback(IdUsers,Commend) Values ($userid,'$feedback')";
          // $insert_payment ="INSERT INTO Payment(IdUsers,IdOrder,PaymentMethod,PaymentStatus,Payment_Slip) Values ($userid,(select max(tbl_Order.IdOrder) from tbl_Order where IdUsers=$userid),'$payment','Pending','$slip')";
          // if($mysqli->query($insert_payment)==TRUE){
            if($mysqli->query($insert_commend)== TRUE){
            header("location:feedback.php"); 
          }
            else {
        echo "Error: " . $insert_sql . "<br>" . $mysqli->error;
      }
?>
