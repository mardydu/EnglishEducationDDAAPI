<?php
$username = "robloxed";
$password = "";
try{
	$pdo = new PDO('mysql:host=localhost;dbname=robloxed','root','');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo "Error: ";
}
?>