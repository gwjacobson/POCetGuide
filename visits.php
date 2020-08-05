<?php include "templates/header.php"; 
session_start();
echo "Logged in as ".$_SESSION['User'];
?>

<br>

<?php
//require 'connection.php'
    $con = mysqli_connect("aa15iv5lmwnef3q.c1likrsahpej.us-west-2.rds.amazonaws.com","gwjacobson","un1verSe8","ebdb");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$Userid = $_SESSION['ID'];
$Name = $_SESSION['User'];
$BusinessId = $_POST['BusinessId'];
$BusinessName = $_POST['BusinessName'];
$Rating = $_POST['Rating'];
$Date = $_POST['Date'];

$sql = "INSERT INTO Visit (UserId,BusinessId,Rating,Date,Name,BusinessName) values ('$Userid','$BusinessId','$Rating','$Date','$Name','$BusinessName')";

echo $sql;

if(mysqli_query($con, $sql)) {
    echo "1 Record Added";
} else{
    echo "ERROR: Could not execute " .  $sql . " " . mysqli_error($con);
}

$con->close();

?>
<a href="search.php">Go Back to Search</a>

<?php include "templates/footer.php"; ?>
