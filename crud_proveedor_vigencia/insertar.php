<?php
$id_proveedor = $_POST['id_proveedor'];
$id_ciclo = $_POST['id_ciclo'];
try
{
require_once '../db_config.php';
$stmt=$db_con->prepare("SELECT * FROM vigencia_proveedor WHERE id_proveedor = '$id_proveedor' AND id_ciclo = '$id_ciclo'");
$stmt->execute();
if($stmt->rowCount() > 0){
echo 'ya existe un registro con los mismos datos';
}
else{
$stmt=$db_con->prepare("INSERT INTO vigencia_proveedor(id_proveedor,id_ciclo) VALUES('$id_proveedor','$id_ciclo')");
$stmt->execute();
echo 'exito';
}
}
catch(PDOException $e){
echo $e->getMessage();
}
?>