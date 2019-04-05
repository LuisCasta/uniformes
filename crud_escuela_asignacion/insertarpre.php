<?php
$tipo = $_POST['tipo'];
$t3 = $_POST['t3'];
$t4 = $_POST['t4'];
$t5 = $_POST['t5'];
$t6 = $_POST['t6'];
$t8 = $_POST['t8'];
$t10 = $_POST['t10'];
$etapa = $_POST['etapa'];
$ciclo = $_POST['ciclo'];
$total = $_POST['total'];
$nivel = $_POST['nivel'];
$pedido = "";	
$preescolar = "";	

if($tipo == "pedido"){
	$pedido = "pedido_etapa";
	$preescolar = "etapa_preescolar";
}
else if($tipo == "extra"){
	$pedido = "extrapedido_etapa";
	$preescolar = "extraetapa_preescolar";
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
		$stmt=$db_con->prepare("INSERT INTO $preescolar(id_pedido_etapa,etapa,t3,t4,t5,t6,t8,t10) VALUES('$id_pedido','$etapa','$t3','$t4','$t5','$t6','$t8','$t10')");
		$stmt->execute();
		echo "exito";
	}
}
	catch(PDOException $e){
	echo $e->getMessage();
}
?>