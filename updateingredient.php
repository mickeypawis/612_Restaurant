<?php
  session_start();
  $mysqli = new mysqli("localhost", "root", "root", "612_Restaurant");
    $id = $_POST['id'];
    $name = $_POST['Name'];
    $descrip = $_POST['descrip'];
    $quantity =$_POST['quantity'];
    //Update Database
    $update_sql = "UPDATE Ingredients SET  IdIngredient='$id', Name='$name', 
    Description='$descrip',Quantity=$quantity WHERE IdIngredient='$id'";
    $update_result = $mysqli->query($update_sql);
    if ($update_result){
    }
    else{echo $mysqli->error;}
    header("location: ingredient.php");
?>    
