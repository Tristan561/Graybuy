<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}

$_SESSION;

$serverAddress = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbName = "graybuydatabase";

$sqlConnection = new mysqli($serverAddress, $dbusername, $dbpassword, $dbName);

if($sqlConnection->connect_error){
die("Connection Failed");
}

?>