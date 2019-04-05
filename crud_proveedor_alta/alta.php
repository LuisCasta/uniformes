<?php
$id_taller = $_POST['id_taller'];
$contrato = $_POST['contrato'];
$periodo = $_POST['periodo'];
	
try
{
	require_once '../db_config.php'; 
	$stmt=$db_con->prepare("SELECT * FROM proveedor WHERE id_taller = '$id_taller'");
	$stmt->execute();
	if($stmt->rowCount() > 0){
		echo "el taller ya esta dado de alta en los de proveedores";
	}
	else{
	$stmt=$db_con->prepare("INSERT INTO proveedor(id_taller,contrato,fecha_contrato,fecha_alta) VALUES('$id_taller','$contrato','$periodo','".date("Y/m/d")."')");
	$stmt->execute();
	echo "exito";
	}
}
	catch(PDOException $e){
	echo $e->getMessage();
}
?>