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
	$id = $_GET['id'];
    echo $id;
	if (isset($id)) {
	    
			$q = "delete from Ingredients where IdIngredient = $id";
			if(!$mysqli->query($q)){
					echo "delete failed. Error: ".$mysqli->error;
		 	}
	
		  $mysqli->close();
		  //redirect
		  header("Location: ingredient.php");
	}