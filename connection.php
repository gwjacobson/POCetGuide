<?php
$dbhost = 'aa15iv5lmwnef3q.c1likrsahpej.us-west-2.rds.amazonaws.com';
$dbport = '3306';
$dbname = 'ebdb';
$charset = 'utf8' ;

$dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset={$charset}";
$username = 'gwjacobson';
$password = 'un1verSe8';

$con = new mysqli($dbhost, $username, $password, $dbname);
if ($con->connect_error) {
	die('Connection Error: '. $con->connect_error );
}
?>
