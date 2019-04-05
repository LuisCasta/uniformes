<?php
$matricula = $_POST['matricula'];

try{
	require_once '../db_config.php'; 
	$stmt=$db_con->prepare("SELECT nombre FROM escuela WHERE matricula = '$matricula'");
	$stmt->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	echo $row['nombre'];
	}
catch(PDOException $e){
	echo $e->getMessage();
}
?>