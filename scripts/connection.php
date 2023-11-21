<?php
$server = "localhost";
$username = "root";
$pass = "";
$dbnome = "saw";

$con = new mysqli($server, $username, $pass, $dbnome);

if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
}


?>