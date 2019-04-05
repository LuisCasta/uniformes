<?php
$ciclo = $_POST['ciclo'];
$talleres = "<option value='seleccione' selected>Seleccione un taller</option>";	

try{
	require_once '../db_config.php'; 
	$stmt=$db_con->prepare("SELECT t.id as idt, t.nombre as nombret FROM taller t join vigencia v ON t.id = v.id_taller WHERE v.id_ciclo = '$ciclo'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
	{ 
			$talleres .= '<option value="'.$row["idt"].'">'.$row["idt"]." ".$row["nombret"].'</option>';
	}
	echo $talleres;
	}
catch(PDOException $e){
	echo $e->getMessage();
}
?>