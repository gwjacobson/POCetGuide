<?php include "../templates/header.php";?>

<style>
body{
 text-align:center;
 font-size: 18px;
 background-color: rgb(245,227,203);
 font-family:"Verdana";
}
h2{
text-align:center;
}
ul{
 width: 50%;
 margin:0;
 margin-left:23%;
 text-align:center;
}
</style>

<?php
$con = mysqli_connect("aa15iv5lmwnef3q.c1likrsahpej.us-west-2.rds.amazonaws.com","gwjacobson","un1verSe8","ebdb");

if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// get the id user entered
$id = $_POST['BusinessId'];

// for getting all businesses attributes
$sql = "select * from Attributes";
// for getting the user's chosen business
$sql2 = "select * from Attributes where BusinessId = '$id'";

// execute query 
$set = mysqli_query($con,$sql);
$toFind = mysqli_query($con,$sql2);

// get current business array
$current = $toFind->fetch_array(MYSQLI_NUM);

// get details of chosen business
$sqlTemp = "select * from Business where BusinessId = '$id'";
$tempCurr = mysqli_query($con,$sqlTemp);
$toPrint = $tempCurr->fetch_array(MYSQLI_NUM);
?>

<h2> Your Chosen Business: 
</h2>

<?php
// print chosen business
echo " ".$toPrint[0]." ".$toPrint[1]." ".$toPrint[2]." ".$toPrint[3]." ".$toPrint[4]." ".$toPrint[5]." ".$toPrint[6]." ".$toPrint[7]."<br>";
?>
<h2>Similar Businesses:</h2>
<?php

// initialize attribute  array
$result = array();

// create numberic array from $set row by row
while ($row = $set->fetch_array(MYSQLI_NUM)) {
	$result[] = $row;
}

// ignore
// $result = $con->query($sql);
//print_r($result);
//$result = mysqli_fetch_array($set,MYSQLI_NUM);
// $result2 = $result->fetch_assoc();
// $current = array(5,"Restaurant","Mixed","Off-Campus","Off-Green","Women Owned");

// initialize final result array
$similar = array();

// double for loop to get similar businesses, don't touch
for ($i = 0; $i < count($result); $i++) {
	$count = 0;
	$countDistinct = 0;
	$attributes = array();
	for($x = 1; $x < count($current); $x++) {
		if (($result[$i][$x]==$current[$x])==true) {
        		$count++;
    		}
    		if (($result[$i][$x]==$current[$x])==false) {
        		$countDistinct = $countDistinct + 2;
    		}
	}
	$countDistinct = $countDistinct + $count;
	$index = $count/$countDistinct;
	
	// threshold is 0.6 = so atleast 4 attributes have to match
	if ($index > 0.6 && $index <  1) {
		$var = $result[$i][0];
		// if above threshhold, add to final results array
    		array_push($similar,$var);
    	}
}
// ignore
// array_shift($similar);
// print_r($similar);

// printing results
for($j = 0; $j < count($similar);$j++) {
	$sqlFinal = "select * from Business where BusinessId = '$similar[$j]'";
	$temp = mysqli_query($con,$sqlFinal);
	$output = $temp->fetch_array(MYSQLI_NUM);
	echo "".$output[0]." ".$output[1]." ".$output[2]." ".$output[3]." ".$output[4]." ".$output[5]." ".$output[6]." ".$output[7]."<br><br>";
}

$con->close();

?>
    <a href="/../index.php">Back to home</a>
    <a href="/../search.php">Back to your Business Search</a>

<?php include "templates/footer.php"; ?>
