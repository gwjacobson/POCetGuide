<?php include "templates/header.php";
session_start();
echo nl2br( "\n Welcome ") .$_SESSION['User'];
?>
<style>
body{
 text-align: center;
 font-size: 18px;
 background-color: rgb(245,227,203);
 font-family:"Verdana";
}
h5{
 text-align: center;
}
</style>
<body>
    <h2>Find a Local Business</h2>

    <form action="search.php" method="post">
	<p>Business Name or Type:<input type="text" name="search" /></p>
        <p><input type='submit'/></p>
    </form>

    <a href="index.php">Back to home</a>
    <a href="businesshtml.php">Check out Business</a>
</body>
    <?php include "templates/footer.php"; ?>
