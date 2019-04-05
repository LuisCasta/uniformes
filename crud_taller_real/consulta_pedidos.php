<?php
$tipo = $_POST['tipo'];
$ciclo = $_POST['ciclo'];
$etapa = $_POST['etapa'];
$pedidos = "<option  value='seleccione' selected>Seleccione un pedido</option>";	

$pedido = "";	

if($tipo == "pedido"){
	$pedido = "pedido_etapa";
}
else if($tipo == "extra"){
	$pedido = "extrapedido_etapa";
}

try{
	require_once '../db_config.php'; 
	$stmt=$db_con->prepare("SELECT * FROM $pedido WHERE ciclo = '$ciclo' AND etapa = '$etapa'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
	{ 
			$pedidos .= "<option  value='".$row['id']."'>".$row['etapa']." ".$row['total']."</option>";
	}
	echo $pedidos;
	}
catch(PDOException $e){
	echo $e->getMessage();
}
?>