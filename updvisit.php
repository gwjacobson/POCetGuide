<?php include "templates/header.php";
session_start();
echo "Logged in as: ".$_SESSION['User'];
?>
<?php
//require 'connection.php'
    $con = mysqli_connect("aa15iv5lmwnef3q.c1likrsahpej.us-west-2.rds.amazonaws.com","gwjacobson","un1verSe8","ebdb");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$UserId = $_SESSION['ID'];
$BusinessId = $_POST['BusinessId'];
$NewRate = $_POST['Rating'];
$NewDate = $_POST['date'];

$sql = "UPDATE Visit SET Rating = '$NewRate', Date = '$NewDate' WHERE UserId = '$UserId' AND BusinessId = '$BusinessId'";

if(mysqli_query($con, $sql)) {
    echo "Record Updated";
} else{
    echo "ERROR: Could not execute " .  $sql . " " . mysqli_error($con);
}

$con->close();

?>

<a href="search.php">Go Back to Search</a>
<?php include "templates/footer.php"; ?>

