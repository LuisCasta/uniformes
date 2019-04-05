<?php
$programa = $_POST['programa'];
$tipo_documento = $_POST['tipo_documento'];
$titulo = $_POST['titulo'];
$link = $_POST['link'];
try
{
require_once '../db_config.php';
$stmt=$db_con->prepare("SELECT * FROM link WHERE titulo = '$titulo'");
$stmt->execute();
if($stmt->rowCount() > 0){
echo 'ya existe un registro con los mismos datos';
}
else{
$stmt=$db_con->prepare("INSERT INTO link(programa,tipo_documento,titulo,link) VALUES('$programa','$tipo_documento','$titulo','$link')");
$stmt->execute();
echo 'exito';
}
}
catch(PDOException $e){
echo $e->getMessage();
}
?>