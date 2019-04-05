<?php 
$ciclo = $_POST['ciclo'];
$options = "";
$options .= '<option value="seleccione">Seleccione un proveedor</option>';
try{
                require_once '../db_config.php'; 
                $stmt=$db_con->prepare("SELECT v.id_proveedor as idproveedor, p.id_taller as idtaller FROM vigencia_proveedor v INNER JOIN proveedor p ON v.id_proveedor = p.id WHERE v.id_ciclo = '$ciclo'");
                $stmt->execute();
                while($fila=$stmt->fetch(PDO::FETCH_ASSOC)) 
                {
                  $stmt2=$db_con->prepare("SELECT t.nombre as nombretaller, t.rfc as rfctaller, t.ciudad as ciudadtaller FROM proveedor p INNER JOIN taller t ON p.id_taller = t.id WHERE t.id = ".$fila['idtaller']);
                  $stmt2->execute();
                  $row=$stmt2->fetch(PDO::FETCH_ASSOC);
                   $options .= '<option value="'.$fila["idproveedor"].'">'.$row["nombretaller"].'</option>';
                }                   

                echo $options;
    }
catch(PDOException $e){
  echo $e->getMessage();
}
?>