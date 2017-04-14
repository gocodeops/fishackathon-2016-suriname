<?php
	// config
	// $servername = "192.168.8.104";
	// $username 	= "root";
	// $password 	= "root";
	// $db 		= "fishackathon_2016";

	// mitchel local server
	// $servername = "localhost";
	// $username 	= "root";
	// $password 	= "root";
	// $db 		= "fishackathon_2016";

	// 000webhost server
	$servername = "mysql11.000webhost.com";
	$username 	= "a3825068_fishack";
	$password 	= "fishackathon2016";
	$db 		= "a3825068_fishack";

	// connect
	try { 
		$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	} catch(PDOException $e) { 
		die($e->getMessage()); 
	}
?>