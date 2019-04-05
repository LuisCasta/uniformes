<?php
$tipo = $_POST['tipo'];
$etapa = $_POST['etapa'];
$ciclo = $_POST['ciclo'];
$nivel = $_POST['nivel'];
$t12 = $_POST['t12'];
$t14 = $_POST['t14'];
$t16 = $_POST['t16'];
$t18 = $_POST['t18'];
$t20 = $_POST['t20'];
$t22 = $_POST['t22'];
$t24 = $_POST['t24'];
$t26 = $_POST['t26'];
$id_pedido = "";
$secundaria = "";		
$pedido = "";	

if($tipo == "pedido"){
	$secundaria = "etapa_secundaria";
	$pedido = "pedido_etapa";
}
else if($tipo == "extra"){
	$secundaria = "extraetapa_secundaria";
	$pedido = "extrapedido_etapa";
}
	
try
{
	require_once '../db_config.php';
	$stmt=$db_con->prepare("SELECT id FROM $pedido WHERE etapa='$etapa' AND ciclo='$ciclo' AND nivel='$nivel'");
		$stmt->execute();
		if($fila=$stmt->fetch(PDO::FETCH_ASSOC))
			$id_pedido = $fila["id"];
	$stmt=$db_con->prepare("UPDATE $secundaria 
							set r12='$t12',r14='$t14',r16='$t16',r18='$t18',r20='$t20',r22='$t22',r24='$t24',r26='$t26'
							WHERE id_pedido_etapa = '$id_pedido'");
	$stmt->execute();
	echo "exito";
}
	catch(PDOException $e){
	echo $e->getMessage();
}
?>