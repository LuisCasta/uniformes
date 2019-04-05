<?php
$ciclo = $_POST['ciclo'];
$etapas = "<option value='seleccione' selected>Seleccione una etapa</option>";	

try{
	require_once '../db_config.php'; 
	$stmt=$db_con->prepare("SELECT * FROM etapas WHERE ciclo = '$ciclo' ORDER BY numero ASC");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
	{ 
			$etapas .= "<option  value='".$row['numero']."'>".$row['numero']."</option>";
	}
	echo $etapas;
	}
catch(PDOException $e){
	echo $e->getMessage();
}
?>