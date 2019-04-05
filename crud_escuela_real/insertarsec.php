<?php
$tipo = $_POST['tipo'];
$etapa = $_POST['etapa'];
$grado = $_POST['grado'];
$total = $_POST['total'];
$ciclo = $_POST['ciclo'];
$t12 = $_POST['t12'];
$t14 = $_POST['t14'];
$t16 = $_POST['t16'];
$t18 = $_POST['t18'];
$t20 = $_POST['t20'];
$t22 = $_POST['t22'];
$t24 = $_POST['t24'];
$t26 = $_POST['t26'];
$id_pedido = "0";
$pedido = "";	
$secundaria = "";	

if($tipo == "pedido"){
	$pedido = "pedido_real";
	$secundaria = "real_secundaria";
}
else if($tipo == "extra"){
	$pedido = "extrapedido_real";
	$secundaria = "extrareal_secundaria";
}
	
try
{
	require_once '../db_config.php'; 
	$stmt=$db_con->prepare("SELECT * FROM $pedido WHERE etapa = '$etapa' AND nivel = '$grado' AND ciclo = '$ciclo'");
	$stmt->execute();
	if($stmt->rowCount() > 0){
		echo "ya existe un pedido de ".$grado." en el ciclo ".$ciclo." en la etapa ".$etapa;
	}
	else{
		$stmt=$db_con->prepare("INSERT INTO $pedido(etapa,nivel,total,ciclo,fecha_alta) VALUES('$etapa','$grado','$total','$ciclo','".date("Y/m/d")."')");
		$stmt->execute();
		$stmt=$db_con->prepare("SELECT id FROM $pedido WHERE etapa='$etapa' AND nivel='$grado' AND total='$total' AND ciclo='$ciclo'");
		$stmt->execute();
		if($fila=$stmt->fetch(PDO::FETCH_ASSOC))
			$id_pedido = $fila["id"];
		$stmt=$db_con->prepare("INSERT INTO $secundaria(id_pedido,r12,r14,r16,r18,r20,r22,r24,r26) VALUES('$id_pedido','$t12','$t14','$t16','$t18','$t20','$t22','$t24','$t26')");
		$stmt->execute();
		echo "exito";
	}
}
	catch(PDOException $e){
	echo $e->getMessage();
}
?>