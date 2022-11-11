<?php
session_start();
$host = 'localhost';
$db_name = 'twancosmetics';
$user_name = 'root';
$password = '';

try{
	$db = new PDO("mysql:host=$host;dbname=$db_name", $user_name, $password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->exec("set names utf8mb4");
	//echo "database is connected";
}
catch( PDOException $e ){
	echo "database is not connected";
}
?>