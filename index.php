
<?php include "templates/header.php"; ?>

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
.centerlogin{
 width:96%;
 margin:0;
 text-align:center;
 margin-left = 15%;
}

</style>
<body>
    <h2>Home</h2>
<ul>
    <a href="create.php"><strong>Create</strong></a> - Add a new User
    <br></br>
    <a href="bus_search.php"><strong>Search Businesses</strong></a> - Find a Business
    <br></br>
<div class = "centerlogin">
    <a href="login.php">Log In</a>
</div>
</ul>
</body>
<?php include "templates/footer.php"; ?>
