<?php
$nombre = $_POST['nombre'];
$rfc = $_POST['rfc'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$cp = $_POST['cp'];
$direccion = $_POST['direccion'];
$titular = $_POST['titular'];
$numero_empleados = $_POST['numero_empleados'];
$zona = $_POST['zona'];
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
	
try
{
	require_once '../db_config.php'; 
	$stmt=$db_con->prepare("SELECT * FROM taller WHERE rfc = '$rfc'");
	$stmt->execute();
	if($stmt->rowCount() > 0){
		echo "ya existe un taller con el mismo rfc";
	}
	else{
	$stmt=$db_con->prepare("INSERT INTO taller(nombre,rfc,ciudad,estado,cp,direccion,titular,fecha_alta,numero_empleados,zona,latitud,longitud) VALUES('$nombre','$rfc','$ciudad','$estado','$cp','$direccion','$titular','".date("Y/m/d")."','$numero_empleados','$zona','$latitud','$longitud')");
	$stmt->execute();
	echo "exito";
	}
}
	catch(PDOException $e){
	echo $e->getMessage();
}
?>