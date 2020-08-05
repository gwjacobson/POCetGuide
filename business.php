<?php include "templates/header.php"; ?>
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
</style>
<body>
    <h2>Your Local Businesses</h2>

    <a href="bus_search.php">Search More Local Businesses</a>
    <br>
    <?php
    include 'connection.php';
    $result = $con->query('select * from Business');
    if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
                echo "".$row['BusinessId']." ".$row['BusinessName']." ".$row['Type']." ".$row['AverageRating']." ".$row['HoursOfOperation']." ".$row['Location']." ".$row['Owner']." ".$row['Website']."<br>";
	    }
    }else {
	    echo "0 Results";
    } 

    $con->close();
?>
</body>
<?php include "templates/footer.php"; ?>
