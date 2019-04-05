<?php
$ciclo = $_POST['ciclo'];
$proveedor = $_POST['proveedor'];
$taller = $_POST['taller'];
$actividad = $_POST['actividad'];
$tipo_uniforme = $_POST['tipo_uniforme'];
$fecha = $_POST['fecha'];
$kits = $_POST['kits'];
try
{
require_once '../db_config.php';
$stmt=$db_con->prepare("SELECT * FROM produccion WHERE id_ciclo = '$ciclo' AND id_proveedor = '$proveedor' AND id_taller = '$taller' AND actividad = '$actividad' AND tipo_uniforme = '$tipo_uniforme' AND fecha = '$fecha'");
$stmt->execute();
if($stmt->rowCount() > 0){
echo 'ya existe un registro con los mismos datos';
}
else{
$stmt=$db_con->prepare("INSERT INTO produccion(id_ciclo,id_proveedor,id_taller,kits,actividad,tipo_uniforme,fecha) VALUES('$ciclo','$proveedor','$taller','$kits','$actividad','$tipo_uniforme','$fecha')");
$stmt->execute();
echo 'exito';
}
}
catch(PDOException $e){
echo $e->getMessage();
}
?>