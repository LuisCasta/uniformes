<?php 
$ciclo = $_POST['ciclo'];
$tabla = "";  
$header = "";  

try{
                   $header .= '<tr><th>Fecha</th>';
                   $header .= '<th>Matricula Escuela</th>';
                   $header .= '<th>Nombre</th>';
                   $header .= '<th>Nivel</th>';
                   $header .= '<th>Grado</th>';
                   $header .= '<th>Ruta</th>';
                   $header .= '<th>Kits</th></tr>';
                require_once '../db_config.php'; 
                $stmt=$db_con->prepare("SELECT secundaria_entregas.fecha_alta as fecha1,secundaria_entregas.escuela as escuela1,escuela.nombre as nombre1,secundaria_entregas.grado as grado1,secundaria_entregas.ruta as ruta1,secundaria_entregas.kits as kits1 FROM secundaria_entregas LEFT JOIN escuela ON secundaria_entregas.escuela = escuela.matricula WHERE ciclo = '2018'");
                $stmt->execute();
                while($fila=$stmt->fetch(PDO::FETCH_ASSOC)) 
                { 

                   $tabla .= '<tr><td>'.$fila["fecha1"].'</td>';
                   $tabla .= '<td>'.$fila["escuela1"].'</td>';
                   $tabla .= '<td>'.$fila["nombre1"].'</td>';
                   $tabla .= '<td>secundaria</td>';
                   $tabla .= '<td>'.$fila["grado1"].'</td>';
                   $tabla .= '<td>'.$fila["ruta1"].'</td>';
                   $tabla .= '<td>'.$fila["kits1"].'</td></tr>';
                }                   
                $arreglo = '{"tabla": "'.$tabla.'", "header": "'.$header.'"}';

                json_encode($arreglo); 
                echo $arreglo;
    }
catch(PDOException $e){
  echo $e->getMessage();
}
?>