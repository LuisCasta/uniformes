<?php
$fecha = $_POST['fecha'];
$id_proveedor = $_POST['id_proveedor'];
$id_taller = $_POST['id_taller'];
$id_ciclo = $_POST['id_ciclo'];
$monto = $_POST['monto'];
try
{
require_once '../db_config.php';
$stmt=$db_con->prepare("SELECT * FROM pago WHERE fecha = '$fecha'AND id_proveedor = '$id_proveedor' AND id_taller = '$id_taller' AND id_ciclo = '$id_ciclo'");
$stmt->execute();
if($stmt->rowCount() > 0){
echo 'ya existe un registro con los mismos datos';
}
else{
$stmt=$db_con->prepare("INSERT INTO pago(fecha,id_proveedor,id_taller,id_ciclo,monto) VALUES('$fecha','$id_proveedor','$id_taller','$id_ciclo','$monto')");
$stmt->execute();
echo 'exito';
}
}
catch(PDOException $e){
echo $e->getMessage();
}
?>