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
    <link rel="stylesheet" href="menu.css">
</head>

<body style="background-color: #b7e4c7;">
     <div class="topnav">
          <a href="new_menu.php">Menu</a>
          <form method="post" action="userprofile.php"></form>
          <a href="userprofile.php">Profile</a>
          <a href="status.php">Your Order</a>
          <a class="active "href="feedback.php">Feedback</a>
          <a href="logout.php">Logout</a>
     </div>
    <div class="title" style="font-size:300%; position: relative; text-align: center;">
        <span>Feedback</span>
    </div>
    <div class="info" style="font-size:140%;">
    <form method="post"action="updatefeedback.php">
    <div class="textbox">
        <span>Reccomendation:</span>
        <input type="text" id="commend" name="commend" size="70" style="font-size:120%; position: relative; border-radius: 10px;">
    </div>
    <div class="submit">
        <button name="confirm" type="submit" value="confirm" style="font-size:50%; position: relative; border: 2px solid #2D6A4F; border-radius: 10px;">Confirm</button>
            
    </div>