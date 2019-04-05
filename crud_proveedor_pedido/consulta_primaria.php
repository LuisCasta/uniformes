<?php 
$etapa = $_POST['etapa'];
$primaria = ""; 
$primaria_h = "";  

try{
                $suma = 0;

                   $primaria_h .= '<tr><th>etapa</th>';
                   $primaria_h .= '<th>nivel</th>';
                   $primaria_h .= '<th>5</th>';
                   $primaria_h .= '<th>6</th>';
                   $primaria_h .= '<th>8</th>';
                   $primaria_h .= '<th>10</th>';
                   $primaria_h .= '<th>12</th>';
                   $primaria_h .= '<th>14</th>';
                   $primaria_h .= '<th>16</th>';
                   $primaria_h .= '<th>18</th>';
                   $primaria_h .= '<th>20</th>';
                   $primaria_h .= '<th>22</th>';
                   $primaria_h .= '<th>24</th></tr>';
                require_once '../db_config.php'; 
                $stmt=$db_con->prepare("SELECT * FROM etapa_primaria WHERE etapa = '$etapa'");
                $stmt->execute();
                while($fila=$stmt->fetch(PDO::FETCH_ASSOC)) 
                { 

                   $primaria .= '<tr><td>'.$fila["etapa"].'</td>';
                   $primaria .= '<td>primaria</td>';
                   $primaria .= '<td>'.$fila["t5"].'</td>';
                   $primaria .= '<td>'.$fila["t6"].'</td>';
                   $primaria .= '<td>'.$fila["t8"].'</td>';
                   $primaria .= '<td>'.$fila["t10"].'</td>';
                   $primaria .= '<td>'.$fila["t12"].'</td>';
                   $primaria .= '<td>'.$fila["t14"].'</td>';
                   $primaria .= '<td>'.$fila["t16"].'</td>';
                   $primaria .= '<td>'.$fila["t18"].'</td>';
                   $primaria .= '<td>'.$fila["t20"].'</td>';
                   $primaria .= '<td>'.$fila["t22"].'</td>';
                   $primaria .= '<td>'.$fila["t24"].'</td></tr>';
                   $suma = $suma + $fila["t5"]+$fila["t6"]+$fila["t8"]+$fila["t10"]+$fila["t12"]+$fila["t14"]+$fila["t16"]+$fila["t18"]+$fila["t20"]+$fila["t22"]+$fila["t24"];
                }             
                $total = "<label>Total</label><input disabled value=".$suma.">";
                $arreglo = '{"tabla": "'.$primaria.'", "tabla_header": "'.$primaria_h.'", "total": "'.$total.'"}';

                json_encode($arreglo); 
                echo $arreglo;
    }
catch(PDOException $e){
  echo $e->getMessage();
}
?>