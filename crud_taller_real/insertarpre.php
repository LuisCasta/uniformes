<?php
$tipo = $_POST['tipo'];
$etapa = $_POST['etapa'];
$ciclo = $_POST['ciclo'];
$nivel = $_POST['nivel'];
$t3 = $_POST['t3'];
$t4 = $_POST['t4'];
$t5 = $_POST['t5'];
$t6 = $_POST['t6'];
$t8 = $_POST['t8'];
$t10 = $_POST['t10'];
$id_pedido = "";
$preescolar = "";	
$pedido = "";	

if($tipo == "pedido"){
	$preescolar = "etapa_preescolar";
	$pedido = "pedido_etapa";
}
else if($tipo == "extra"){
	$preescolar = "extraetapa_preescolar";
	$pedido = "extrapedido_etapa";
}
try
{
	require_once '../db_config.php';
	$stmt=$db_con->prepare("SELECT id FROM $pedido WHERE etapa='$etapa' AND ciclo='$ciclo' AND nivel='$nivel'");
		$stmt->execute();
		if($fila=$stmt->fetch(PDO::FETCH_ASSOC))
			$id_pedido = $fila["id"];
	$stmt=$db_con->prepare("UPDATE $preescolar 
							set r3='$t3',r4='$t4',r5='$t5',r6='$t6',r8='$t8',r10='$t10' 
							WHERE id_pedido_etapa = '$id_pedido'");
	$stmt->execute();
	echo "exito";
}
	catch(PDOException $e){
	echo $e->getMessage();
}
?>