<?php 
$etapa = $_POST['etapa'];
$primaria = "";
$primaria_r = "";
try{
                require_once '../db_config.php'; 
                $stmt=$db_con->prepare("SELECT * FROM real_primaria WHERE etapa = '$etapa'");
                $stmt->execute();
                if($fila=$stmt->fetch(PDO::FETCH_ASSOC)) 
                { 

                   $primaria .= '<tr><th>etapa</th>';
                   $primaria .= '<td>'.$fila["etapa"].'</td></tr>';
                   $primaria .= '<tr><th>nivel</th>';
                   $primaria .= '<td>primaria</td></tr>';
                   $primaria .= '<tr><th>5</th>';
                   $primaria .= '<td>'.$fila["r5"].'</td></tr>';
                   $primaria .= '<tr><th>6</th>';
                   $primaria .= '<td>'.$fila["r6"].'</td></tr>';
                   $primaria .= '<tr><th>8</th>';
                   $primaria .= '<td>'.$fila["r8"].'</td></tr>';
                   $primaria .= '<tr><th>10</th>';
                   $primaria .= '<td>'.$fila["r10"].'</td></tr>';
                   $primaria .= '<tr><th>12</th>';
                   $primaria .= '<td>'.$fila["r12"].'</td></tr>';
                   $primaria .= '<tr><th>14</th>';
                   $primaria .= '<td>'.$fila["r14"].'</td></tr>';
                   $primaria .= '<tr><th>16</th>';
                   $primaria .= '<td>'.$fila["r16"].'</td></tr>';
                   $primaria .= '<tr><th>18</th>';
                   $primaria .= '<td>'.$fila["r18"].'</td></tr>';
                   $primaria .= '<tr><th>20</th>';
                   $primaria .= '<td>'.$fila["r20"].'</td></tr>';
                   $primaria .= '<tr><th>22</th>';
                   $primaria .= '<td>'.$fila["r22"].'</td></tr>';
                   $primaria .= '<tr><th>24</th>';
                   $primaria .= '<td>'.$fila["r24"].'</td></tr>';


                   $primaria_r .= '<tr><th>etapa</th>';
                   $primaria_r .= '<td>'.$fila["etapa"].'</td></tr>';
                   $primaria_r .= '<tr><th>nivel</th>';
                   $primaria_r .= '<td>primaria</td></tr>';
                   $primaria_r .= '<tr><th>5</th>';
                   $primaria_r .= '<td>'.$fila["r5"].'</td></tr>';
                   $primaria_r .= '<tr><th>6</th>';
                   $primaria_r .= '<td>'.$fila["r6"].'</td></tr>';
                   $primaria_r .= '<tr><th>8</th>';
                   $primaria_r .= '<td>'.$fila["r8"].'</td></tr>';
                   $primaria_r .= '<tr><th>10</th>';
                   $primaria_r .= '<td>'.$fila["r10"].'</td></tr>';
                   $primaria_r .= '<tr><th>12</th>';
                   $primaria_r .= '<td>'.$fila["r12"].'</td></tr>';
                   $primaria_r .= '<tr><th>14</th>';
                   $primaria_r .= '<td>'.$fila["r14"].'</td></tr>';
                   $primaria_r .= '<tr><th>16</th>';
                   $primaria_r .= '<td>'.$fila["r16"].'</td></tr>';
                   $primaria_r .= '<tr><th>18</th>';
                   $primaria_r .= '<td>'.$fila["r18"].'</td></tr>';
                   $primaria_r .= '<tr><th>20</th>';
                   $primaria_r .= '<td>'.$fila["r20"].'</td></tr>';
                   $primaria_r .= '<tr><th>22</th>';
                   $primaria_r .= '<td>'.$fila["r22"].'</td></tr>';
                   $primaria_r .= '<tr><th>24</th>';
                   $primaria_r .= '<td>'.$fila["r24"].'</td></tr>';
                }             
                $arreglo = '{"tabla_real": "'.$primaria_r.'","tabla": "'.$primaria.'"}';

                json_encode($arreglo); 
                echo $arreglo;
    }
catch(PDOException $e){
  echo $e->getMessage();
}
?>