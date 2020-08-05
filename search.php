<?php include "templates/header.php"; 
session_start();
echo nl2br("\n Logged in as: ") .$_SESSION['User'];
?>
<br></br>
<?php
//require "connection.php"
	$con = mysqli_connect("aa15iv5lmwnef3q.c1likrsahpej.us-west-2.rds.amazonaws.com","gwjacobson","un1verSe8","ebdb");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$query = $_POST['search'];

$sql = "SELECT * FROM Business WHERE BusinessName LIKE '%$query%' OR Type LIKE '%$query%'";

$result = $con->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "".$row['BusinessId']." ".$row['BusinessName']." ".$row['Type']." ".$row['AverageRating']." ".$row['HoursOfOperation']." ".$row['Location']." ".$row['Owner']." ".$row['Website']."<br>";
	}
}else {
	echo "0 Results";
}

$con->close();

?>
<br>
<style>
body{
 text-align: center;
 font-size: 18px;
 background-color: rgb(245,227,203);
 font-family:"Verdana";
}
h2{
 text-align: center;
}
.inputCol1{
 margin:0;
 margin-right:11%;
 text-align:right;
}
.inputCol2{
 margin:0;
 text-align:right;
 margin-right:11%;
}
.col{
 float:left;
 width:30%;
 padding:10px;
 height: 300px;
}
.row:after{
 display:table;
 clear:both;
}
</style>
<body>
<h2>Find Similar Businesses to your Search!</h2>
<form action="testing/attribute.php" method="post">
        <p>BusinessId:<input type="number" name="BusinessId" /></p>
	<p><input type="submit" /></p>
</form>

<br>
<h2>Average Ratings of Local Businesses</h2>
<?php
//require "connection.php"
        $con = mysqli_connect("aa15iv5lmwnef3q.c1likrsahpej.us-west-2.rds.amazonaws.com","gwjacobson","un1verSe8","ebdb");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql = "SELECT b.BusinessName, AVG(v.Rating) FROM Business b JOIN Visit v ON b.BusinessId = v.BusinessId GROUP BY b.BusinessName ORDER BY b.BusinessId";

$result = $con->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "".$row['BusinessName']." | Average Rating: ".$row['AVG(v.Rating)']."<br>";
        }
}else {
        echo "0 Results";
}
$con->close();

?>
<br>
<h2>Ratings from Local Supporters</h2>
<?php
//require "connection.php"
        $con = mysqli_connect("aa15iv5lmwnef3q.c1likrsahpej.us-west-2.rds.amazonaws.com","gwjacobson","un1verSe8","ebdb");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql = "SELECT * FROM Visit";

$result = $con->query($sql);
if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
                echo "".$row['BusinessName']." | ".$row['Name']." | Rating: ".$row['Rating']."<br>";
        }
}else {
        echo "0 Results";
}
$con->close();
?>
<br>
<a href='bus_search.php'>Search Another Business</a>
<br></br>
<div class="row">
<div class="col">
<h2>Add a rating to a Business</h2>

<form action="visits.php" method="post">
	<div class = "inputCol1">
	<p>BusinessId:<input type="number" name="BusinessId" /></p>
        <p>Business Name:<input type='text' name='BusinessName' /></p>
        <p>Ratings:<input type="number" name="Rating" /></p>
	<p>Date:<input type="date" name="Date" /></p>
	</div>
        <p><input type="submit" /></p>
    </form>
</div>
<div class="col">
<h2>Delete your visit from a Business</h2>

<form action="delvisit.php" method="post">
        <p>BusinessId:<input type="number" name="BusinessId" /></p>
        <p><input type="submit" /></p>
    </form>
</div>
<div class="col">
<h2>Update your experience on a Business</h2>

<form action="updvisit.php" method="post">
	<div class = "inputCol2">       
	<p>BusinessId:<input type="number" name="BusinessId" /></p>
        <p>New Rating:<input type="number" name="Rating" /></p>
	<p>Date:<input type="date" name="date" /></p>
	</div>
	<p><input type="submit" /></p>
    </form>
</div>
</div>
</body>
<?php include "templates/footer.php"; ?>
