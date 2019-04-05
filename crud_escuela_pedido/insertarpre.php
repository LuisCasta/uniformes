<?php
$tipo = $_POST['tipo'];
$matricula = $_POST['matricula'];
$id_tallerp = $_POST['id_tallerp'];
$grado = $_POST['grado'];
$total = $_POST['total'];
$ciclo = $_POST['ciclo'];
$comentario1 = $_POST['comentario1'];
$comentario2 = $_POST['comentario2'];
$comentario3 = $_POST['comentario3'];
$comentario4 = $_POST['comentario4'];
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
	$pedido = "pedido";
	$preescolar = "preescolar";
}
else if($tipo == "extra"){
	$pedido = "extrapedido";
	$preescolar = "extrapreescolar";
}
try
{
	require_once '../db_config.php';
	$stmt=$db_con->prepare("SELECT * FROM $pedido WHERE matricula_escuela = '$matricula' AND nivel_academico = '$grado' AND ciclo = '$ciclo'");
	$stmt->execute();
	if($stmt->rowCount() > 0){
		echo "ya existe un pedido con los mismo datos en ciclo ".$ciclo;
	}
	else{
		$stmt=$db_con->prepare("INSERT INTO $pedido(matricula_escuela,id_tallerp,nivel_academico,total,ciclo,fecha_alta,comentario1,comentario2,comentario3,comentario4) VALUES('$matricula','$id_tallerp','$grado','$total','$ciclo','".date("Y/m/d")."','$comentario1','$comentario2','$comentario3','$comentario4')");
		$stmt->execute();
		$stmt=$db_con->prepare("SELECT id FROM $pedido WHERE matricula_escuela='$matricula' AND nivel_academico='$grado' AND total='$total' AND ciclo='$ciclo'");
		$stmt->execute();
		if($fila=$stmt->fetch(PDO::FETCH_ASSOC))
			$id_pedido = $fila["id"];
		$stmt=$db_con->prepare("INSERT INTO $preescolar(id_pedido,t3,t4,t5,t6,t8,t10) VALUES('$id_pedido','$t3','$t4','$t5','$t6','$t8','$t10')");
		$stmt->execute();
		echo "exito";
	}
}
	catch(PDOException $e){
	echo $e->getMessage();
}
?>