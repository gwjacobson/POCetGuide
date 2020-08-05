<?php
session_start();
//require 'connection.php'
    $con = mysqli_connect("aa15iv5lmwnef3q.c1likrsahpej.us-west-2.rds.amazonaws.com","gwjacobson","un1verSe8","ebdb");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$Email = $_POST['Email'];
$Password = $_POST['Password'];

$sql = "SELECT * FROM User WHERE Email='$Email' AND Password='$Password'";

$result=mysqli_query($con, $sql);

if($row = mysqli_fetch_assoc($result)) {
	$_SESSION['User']=$row['Name'];
	$_SESSION['ID']=$row['UserId'];
	header("location:bus_search.php");
}
else {
	header("location:index.php?Invalid= Email or Password Incorrect");
}

$con->close();


?>
