<?php 
$etapa = $_POST['etapa'];
$preescolar = "";
$preescolar_r = "";
try{
                require_once '../db_config.php'; 
                $stmt=$db_con->prepare("SELECT * FROM real_preescolar WHERE etapa = '$etapa'");
                $stmt->execute();
                if($fila=$stmt->fetch(PDO::FETCH_ASSOC)) 
                { 
                   

                   $preescolar .= '<tr><th>etapa</th>';
                   $preescolar .= '<td>'.$fila["etapa"].'</td></tr>';
                   $preescolar .= '<tr><th>nivel</th>';
                   $preescolar .= '<td>preescolar</td></tr>';
                   $preescolar .= '<tr><th>3</th>';
                   $preescolar .= '<td>'.$fila["r3"].'</td></tr>';
                   $preescolar .= '<tr><th>4</th>';
                   $preescolar .= '<td>'.$fila["r4"].'</td></tr>';
                   $preescolar .= '<tr><th>5</th>';
                   $preescolar .= '<td>'.$fila["r5"].'</td></tr>';
                   $preescolar .= '<tr><th>6</th>';
                   $preescolar .= '<td>'.$fila["r6"].'</td></tr>';
                   $preescolar .= '<tr><th>8</th>';
                   $preescolar .= '<td>'.$fila["r8"].'</td></tr>';
                   $preescolar .= '<tr><th>10</th>';
                   $preescolar .= '<td>'.$fila["r10"].'</td></tr>';


                   $preescolar_r .= '<tr><th>etapa</th>';
                   $preescolar_r .= '<td>'.$fila["etapa"].'</td></tr>';
                   $preescolar_r .= '<tr><th>nivel</th>';
                   $preescolar_r .= '<td>preescolar</td></tr>';
                   $preescolar_r .= '<tr><th>3</th>';
                   $preescolar_r .= '<td>'.$fila["r3"].'</td></tr>';
                   $preescolar_r .= '<tr><th>4</th>';
                   $preescolar_r .= '<td>'.$fila["r4"].'</td></tr>';
                   $preescolar_r .= '<tr><th>5</th>';
                   $preescolar_r .= '<td>'.$fila["r5"].'</td></tr>';
                   $preescolar_r .= '<tr><th>6</th>';
                   $preescolar_r .= '<td>'.$fila["r6"].'</td></tr>';
                   $preescolar_r .= '<tr><th>8</th>';
                   $preescolar_r .= '<td>'.$fila["r8"].'</td></tr>';
                   $preescolar_r .= '<tr><th>10</th>';
                   $preescolar_r .= '<td>'.$fila["r10"].'</td></tr>';
                }                   
      
                $arreglo = '{"tabla_real": "'.$preescolar_r.'","tabla": "'.$preescolar.'"}';

                json_encode($arreglo); 
                echo $arreglo;
    }
catch(PDOException $e){
  echo $e->getMessage();
}
?>