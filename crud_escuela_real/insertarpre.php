<?php
$tipo = $_POST['tipo'];
$etapa = $_POST['etapa'];
$grado = $_POST['grado'];
$total = $_POST['total'];
$ciclo = $_POST['ciclo'];
$t3 = $_POST['t3'];
$t4 = $_POST['t4'];
$t5 = $_POST['t5'];
$t6 = $_POST['t6'];
$t8 = $_POST['t8'];
$t10 = $_POST['t10'];
$id_pedido = "0";
$pedido = "";	
$preescolar = "";	

if($tipo == "pedido"){
	$pedido = "pedido_real";
	$preescolar = "real_preescolar";
}
else if($tipo == "extra"){
	$pedido = "extrapedido_real";
	$preescolar = "extrareal_preescolar";
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
		$stmt=$db_con->prepare("INSERT INTO $preescolar(id_pedido,r3,r4,r5,r6,r8,r10) VALUES('$id_pedido','$t3','$t4','$t5','$t6','$t8','$t10')");
		$stmt->execute();
		echo "exito";
	}
}
	catch(PDOException $e){
	echo $e->getMessage();
}
?>