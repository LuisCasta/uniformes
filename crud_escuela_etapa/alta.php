<?php
$ciclo = $_POST['ciclo'];
$numero = $_POST['numero'];
$fecha = $_POST['fecha'];
$observacion = $_POST['observacion'];
	
try
{
	require_once '../db_config.php'; 
	$stmt=$db_con->prepare("SELECT * FROM etapas WHERE ciclo = '$ciclo' AND numero = '$numero'");
	$stmt->execute();
	if($stmt->rowCount() > 0){
		echo "ya existe una etapa ".$numero." en el ciclo ".$ciclo;
	}
	else{
	$stmt=$db_con->prepare("INSERT INTO etapas(ciclo,numero,fecha_entrega,fecha_alta,observacion) VALUES('$ciclo','$numero','$fecha','".date("Y/m/d")."','$observacion')");
	$stmt->execute();
	echo "exito";
	}
}
	catch(PDOException $e){
	echo $e->getMessage();
}
?>