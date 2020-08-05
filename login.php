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
.logUser{
 width: 50%;
 margin:0;
 margin-left:8%;
 text-align:right;
}

</style>
<body>
<h2>Login</h2>

    <form action="auth.php" method="post">
     <div class = "logUser">
	<p>Email:<input type="text" name="Email" /></p>
        <p>Password:<input type="text" name="Password" /></p>
     </div>      
	<p><input type="submit" /></p>
    </form>

    <a href="index.php">Back to home</a>
</body>
    <?php include "templates/footer.php"; ?>

