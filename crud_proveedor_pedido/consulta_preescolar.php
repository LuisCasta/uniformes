<?php 
$etapa = $_POST['etapa'];
$preescolar = "";  
$preescolar_h = "";  

try{
                $suma = 0;
                   $preescolar_h .= '<tr><th>etapa</th>';
                   $preescolar_h .= '<th>nivel</th>';
                   $preescolar_h .= '<th>3</th>';
                   $preescolar_h .= '<th>4</th>';
                   $preescolar_h .= '<th>5</th>';
                   $preescolar_h .= '<th>6</th>';
                   $preescolar_h .= '<th>8</th>';
                   $preescolar_h .= '<th>10</th></tr>';
                require_once '../db_config.php'; 
                $stmt=$db_con->prepare("SELECT * FROM etapa_preescolar WHERE etapa = '$etapa'");
                $stmt->execute();
                while($fila=$stmt->fetch(PDO::FETCH_ASSOC)) 
                { 

                   $preescolar .= '<tr><td>'.$fila["etapa"].'</td>';
                   $preescolar .= '<td>preescolar</td>';
                   $preescolar .= '<td>'.$fila["t3"].'</td>';
                   $preescolar .= '<td>'.$fila["t4"].'</td>';
                   $preescolar .= '<td>'.$fila["t5"].'</td>';
                   $preescolar .= '<td>'.$fila["t6"].'</td>';
                   $preescolar .= '<td>'.$fila["t8"].'</td>';
                   $preescolar .= '<td>'.$fila["t10"].'</td></tr>';
                  $suma = $suma + $fila["t3"]+$fila["t4"]+$fila["t5"]+$fila["t6"]+$fila["t8"]+$fila["t10"];
                }                   
      
                $total = "<br><br><br><label>Total</label><input disabled value=".$suma.">";
                $arreglo = '{"tabla": "'.$preescolar.'", "tabla_header": "'.$preescolar_h.'", "total": "'.$total.'"}';

                json_encode($arreglo); 
                echo $arreglo;
    }
catch(PDOException $e){
  echo $e->getMessage();
}
?>