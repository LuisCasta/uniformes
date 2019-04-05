<?php 
$etapa = $_POST['etapa'];
$secundaria = ""; 
$secundaria_h = "";  

try{
                $suma = 0;

                   $secundaria_h .= '<tr><th>etapa</th>';
                   $secundaria_h .= '<th>nivel</th>';
                   $secundaria_h .= '<th>12</th>';
                   $secundaria_h .= '<th>14</th>';
                   $secundaria_h .= '<th>16</th>';
                   $secundaria_h .= '<th>18</th>';
                   $secundaria_h .= '<th>20</th>';
                   $secundaria_h .= '<th>22</th>';
                   $secundaria_h .= '<th>24</th>';
                   $secundaria_h .= '<th>26</th></tr>';
                require_once '../db_config.php'; 
                $stmt=$db_con->prepare("SELECT * FROM etapa_secundaria WHERE etapa = '$etapa'");
                $stmt->execute();
                while($fila=$stmt->fetch(PDO::FETCH_ASSOC)) 
                { 

                   $secundaria .= '<tr><td>'.$fila["etapa"].'</td>';
                   $secundaria .= '<td>secundaria</td>';
                   $secundaria .= '<td>'.$fila["t12"].'</td>';
                   $secundaria .= '<td>'.$fila["t14"].'</td>';
                   $secundaria .= '<td>'.$fila["t16"].'</td>';
                   $secundaria .= '<td>'.$fila["t18"].'</td>';
                   $secundaria .= '<td>'.$fila["t20"].'</td>';
                   $secundaria .= '<td>'.$fila["t22"].'</td>';
                   $secundaria .= '<td>'.$fila["t24"].'</td>';
                   $secundaria .= '<td>'.$fila["t26"].'</td></tr>';
                   $suma = $suma + $fila["t12"]+$fila["t14"]+$fila["t16"]+$fila["t18"]+$fila["t20"]+$fila["t22"]+$fila["t24"]+$fila["t26"];
                }            
                $total = "<label>Total</label><input disabled value=".$suma.">";
                $arreglo = '{"tabla": "'.$secundaria.'", "tabla_header": "'.$secundaria_h.'", "total": "'.$total.'"}';

                json_encode($arreglo); 
                echo $arreglo;
    }
catch(PDOException $e){
  echo $e->getMessage();
}
?>