<?php
$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$colonia = $_POST['colonia'];
$cp = $_POST['cp'];
$municipio = $_POST['municipio'];
$estado = $_POST['estado'];
$num_alumnos = $_POST['num_alumnos'];
$director = $_POST['director'];
$longitud = $_POST['longitud'];
$latitud = $_POST['latitud'];
$ruta = $_POST['ruta'];
	
try
{
	require_once '../db_config.php'; 
	$stmt=$db_con->prepare("SELECT * FROM escuela WHERE matricula = '$matricula'");
	$stmt->execute();
	if($stmt->rowCount() > 0){
		echo "ya existe una escuela con la misma matricula";
	}
	else{
	$stmt=$db_con->prepare("INSERT INTO escuela(matricula,nombre,calle,numero,colonia,cp,municipio,estado,numero_alumnos,director,fecha_alta,longitud,latitud,ruta) VALUES('$matricula','$nombre','$calle','$numero','$colonia','$cp','$municipio','$estado','$num_alumnos','$director','".date("Y/m/d")."','$longitud','$latitud','$ruta')");
	$stmt->execute();
	echo "exito";
	}
}
	catch(PDOException $e){
	echo $e->getMessage();
}
?>