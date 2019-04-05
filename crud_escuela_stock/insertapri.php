<?php
$ciclo = $_POST['ciclo'];
$escuela = $_POST['escuela'];
$grado = $_POST['grado'];
$ruta = $_POST['ruta'];
$kits = $_POST['kits'];
$turno = $_POST['turno'];
$sexo = $_POST['sexo'];
$folio = $_POST['folio'];
	
try
{
	require_once '../db_config.php';
	$stmt=$db_con->prepare("SELECT * FROM primaria_entregas WHERE escuela = '$escuela' AND ciclo = '$ciclo'");
	$stmt->execute();
	if($stmt->rowCount() > 0){
		echo "ya existe una entrega para esta escuela con los mismo datos en ciclo ".$ciclo;
	}
	else{
		$stmt=$db_con->prepare("INSERT INTO primaria_entregas(ciclo,fecha_alta,escuela,grado,ruta,kits,turno,sexo,folio) VALUES('$ciclo','".date("Y/m/d")."','$escuela','$grado','$ruta','$kits','$turno','$sexo','$folio')");
		$stmt->execute();
		echo "exito";
	}
}
	catch(PDOException $e){
	echo $e->getMessage();
}
?>