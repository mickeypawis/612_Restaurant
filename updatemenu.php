<?php
  session_start();
  $mysqli = new mysqli("localhost", "root", "root", "612_Restaurant");
    $id = $_POST['id'];
    $name = $_POST['Name'];
    $Image = $_POST['image'];
    $price =$_POST['price'];
    echo $id;
    echo $price;
    //Update Database
    $update_sql = "UPDATE tbl_product SET  id='$id', name='$name', 
    image='$Image',price=$price WHERE id='$id'";
    $update_result = $mysqli->query($update_sql);
    if ($update_result){
    }
    else{echo $mysqli->error;}
    header("location: edit_menu.php");
?>    
