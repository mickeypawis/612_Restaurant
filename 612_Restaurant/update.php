<?php
  session_start();
  $mysqli = new mysqli("localhost", "root", "root", "612_Restaurant");
  $userid = $_SESSION['IdUsers'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $address = $_POST['Address'];
    $passsword =$_POST['password'];
    $email = $_POST['email'];

    //Update Database
    $update_sql = "UPDATE users SET  UserFname='$firstname', UserLname='$lastname', 
    UserAddress='$address',UserEmail='$email' WHERE IdUsers='$userid'";
    $update_result = $mysqli->query($update_sql);
    if ($update_result){
    }
    else{echo $mysqli->error;}
    header("location: userprofile.php");
?>    
