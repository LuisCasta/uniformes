<?php 
$etapa = $_POST['etapa'];
$secundaria = "";
$secundaria_r = "";

try{
                require_once '../db_config.php'; 
                $stmt=$db_con->prepare("SELECT * FROM real_secundaria WHERE etapa = '$etapa'");
                $stmt->execute();
                if($fila=$stmt->fetch(PDO::FETCH_ASSOC)) 
                { 

                   
                  $secundaria .= '<tr><th>etapa</th>';
                   $secundaria .= '<td>'.$fila["etapa"].'</td></tr>';
                   $secundaria .= '<tr><th>nivel</th>';
                   $secundaria .= '<td>secundaria</td></tr>';
                   $secundaria .= '<tr><th>12</th>';
                   $secundaria .= '<td>'.$fila["r12"].'</td></tr>';
                   $secundaria .= '<tr><th>14</th>';
                   $secundaria .= '<td>'.$fila["r14"].'</td></tr>';
                   $secundaria .= '<tr><th>16</th>';
                   $secundaria .= '<td>'.$fila["r16"].'</td></tr>';
                   $secundaria .= '<tr><th>18</th>';
                   $secundaria .= '<td>'.$fila["r18"].'</td></tr>';
                   $secundaria .= '<tr><th>20</th>';
                   $secundaria .= '<td>'.$fila["r20"].'</td></tr>';
                   $secundaria .= '<tr><th>22</th>';
                   $secundaria .= '<td>'.$fila["r22"].'</td></tr>';
                   $secundaria .= '<tr><th>24</th>';
                   $secundaria .= '<td>'.$fila["r24"].'</td></tr>';
                   $secundaria .= '<tr><th>26</th>';
                   $secundaria .= '<td>'.$fila["r26"].'</td></tr>';


                   $secundaria_r .= '<tr><th>etapa</th>';
                   $secundaria_r .= '<td>'.$fila["etapa"].'</td></tr>';
                   $secundaria_r .= '<tr><th>nivel</th>';
                   $secundaria_r .= '<td>secundaria</td></tr>';
                   $secundaria_r .= '<tr><th>12</th>';
                   $secundaria_r .= '<td>'.$fila["r12"].'</td></tr>';
                   $secundaria_r .= '<tr><th>14</th>';
                   $secundaria_r .= '<td>'.$fila["r14"].'</td></tr>';
                   $secundaria_r .= '<tr><th>16</th>';
                   $secundaria_r .= '<td>'.$fila["r16"].'</td></tr>';
                   $secundaria_r .= '<tr><th>18</th>';
                   $secundaria_r .= '<td>'.$fila["r18"].'</td></tr>';
                   $secundaria_r .= '<tr><th>20</th>';
                   $secundaria_r .= '<td>'.$fila["r20"].'</td></tr>';
                   $secundaria_r .= '<tr><th>22</th>';
                   $secundaria_r .= '<td>'.$fila["r22"].'</td></tr>';
                   $secundaria_r .= '<tr><th>24</th>';
                   $secundaria_r .= '<td>'.$fila["r24"].'</td></tr>';
                   $secundaria_r .= '<tr><th>26</th>';
                   $secundaria_r .= '<td>'.$fila["r26"].'</td></tr>';
                }            
                $arreglo = '{"tabla_real": "'.$secundaria_r.'","tabla": "'.$secundaria.'"}';

                json_encode($arreglo); 
                echo $arreglo;
    }
catch(PDOException $e){
  echo $e->getMessage();
}
?>