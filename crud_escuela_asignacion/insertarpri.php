<?php
$tipo = $_POST['tipo'];
$t5 = $_POST['t5'];
$t6 = $_POST['t6'];
$t8 = $_POST['t8'];
$t10 = $_POST['t10'];
$t12 = $_POST['t12'];
$t14 = $_POST['t14'];
$t16 = $_POST['t16'];
$t18 = $_POST['t18'];
$t20 = $_POST['t20'];
$t22 = $_POST['t22'];
$t24 = $_POST['t24'];
$etapa = $_POST['etapa'];
$ciclo = $_POST['ciclo'];
$total = $_POST['total'];
$nivel = $_POST['nivel'];
$pedido = "";	
$primaria = "";	

if($tipo == "pedido"){
	$pedido = "pedido_etapa";
	$primaria = "etapa_primaria";
}
else if($tipo == "extra"){
	$pedido = "extrapedido_etapa";
	$primaria = "extraetapa_primaria";
}
	
try
{
	require_once '../db_config.php';
	$stmt=$db_con->prepare("SELECT * FROM $pedido WHERE etapa = '$etapa' AND nivel = '$nivel' AND ciclo = '$ciclo'");
	$stmt->execute();
	if($stmt->rowCount() > 0){
		echo "ya existe un pedido de ".$nivel." con los mismo datos en ciclo ".$ciclo." en la etapa ".$etapa;
	}
	else{
		$stmt=$db_con->prepare("INSERT INTO $pedido(ciclo,etapa,total,nivel,fecha_alta) VALUES('$ciclo','$etapa','$total','$nivel','".date("Y/m/d")."')");
		$stmt->execute();
		$stmt=$db_con->prepare("SELECT id FROM $pedido WHERE ciclo='$ciclo' AND etapa='$etapa' AND total='$total' AND nivel='$nivel'");
		$stmt->execute();
		if($fila=$stmt->fetch(PDO::FETCH_ASSOC))
			$id_pedido = $fila["id"];
		$stmt=$db_con->prepare("INSERT INTO $primaria(id_pedido_etapa,etapa,t5,t6,t8,t10,t12,t14,t16,t18,t20,t22,t24) VALUES('$id_pedido','$etapa','$t5','$t6','$t8','$t10','$t12','$t14','$t16','$t18','$t20','$t22','$t24')");
		$stmt->execute();
		echo "exito";
	}
}
	catch(PDOException $e){
	echo $e->getMessage();
}
?>