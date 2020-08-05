<?php include "templates/header.php"; ?>
<style>
body{
 text-align: center;
 font-size: 18px;
 background-color: rgb(245,227,203);
 font-family:"Verdana";
}
.newUser{
 width: 50%;
 margin:0;
 margin-left:90px;
 text-align:right;
 left:150px;
}
</style>

<body>
<h2>Add a user</h2>
    <form action="insert.php" method="post">
        <div class = "newUser">
	<p>Name: <input type="text" name="Name" /></p>
	<p>Email: <input type="text" name="Email" /></p>
        <p>Password: <input type="text" name="Password" /></p>
	<p>Bio: <input type="text" name="Bio" /></p>
	</div>
	<p><input type="submit" /></p>
    </form>
	 <a href="index.php">Back to home</a>
</body>
    <?php include "templates/footer.php"; ?>
