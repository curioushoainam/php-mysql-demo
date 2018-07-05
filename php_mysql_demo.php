<?php

// Set up a connection with a database 
$host = 'localhost';
$databaseName = 'php_demo';
$user = 'root';
$password = '';

try{	
	$dsn = "mysql:host=". $host ."; dbname=". $databaseName;
	// ket noi
	$conn = new PDO($dsn, $user, $password);	

	// thiet lap che do loi
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// thong bao thanh cong
	echo "Connected successfully with db  name: " . $databaseName;
} 
catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}



?>