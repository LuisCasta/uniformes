<?php

require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
require('../db_config.php');
	
if(isset($_POST['Submit'])){

	$mimes = ['application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','xls','xlsx','application/vnd.oasis.opendocument.spreadsheet'];
	
	if(in_array($_FILES["file"]["type"],$mimes)){

		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		
		$uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

		$Reader = new SpreadsheetReader($uploadFilePath);

		$totalSheet = count($Reader->sheets());

		//echo "You have total ".$totalSheet." sheets".

		$html="<table border='1'>";
		$html.="<table border=1><tr><td>nombre</td><td>rfc</td><td>ciudad</td><td>estado</td><td>cp</td><td>direccion</td><td>titular</td><td>numero_empleados</td><td>zona</td><td>latitud</td><td>longitud</td></tr>";
		$contador = 0;
		$resultado = "";
		$encabezados = "";
		/* For Loop for all sheets */
		for($i=0;$i<$totalSheet;$i++){

			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row)
	        {
	        	$contador = $contador+1;
	        	$html.="<tr>";
				/* Check If sheet not emprt */
		        $nombre = isset($Row[0]) ? $Row[0] : '';
				$rfc = isset($Row[1]) ? $Row[1] : ''; 
				$ciudad = isset($Row[2]) ? $Row[2] : '';
		        $estado = isset($Row[3]) ? $Row[3] : '';
				$cp = isset($Row[4]) ? $Row[4] : ''; 
				$direccion = isset($Row[5]) ? $Row[5] : '';
		        $titular = isset($Row[6]) ? $Row[6] : '';
				$numero_empleados = isset($Row[7]) ? $Row[7] : ''; 
				$zona = isset($Row[8]) ? $Row[8] : '';
		        $latitud = isset($Row[9]) ? $Row[9] : '';
				$longitud = isset($Row[10]) ? $Row[10] : '';
				
				//echo $Row[1]." ".$contador;
				if($contador == 1 && $nombre == "nombre" && $rfc == "rfc" && $ciudad == "ciudad" && $estado == "estado" && $cp == "cp" && $direccion == "direccion" && $titular == "titular" && $numero_empleados == "numero_empleados" && $zona == "zona" && $latitud == "latitud" && $longitud == "longitud")
					$encabezados = "exito";
				
				if($encabezados == "exito" && $contador >= 2){
				$html.="<td>".$nombre."</td>";
				$html.="<td>".$rfc."</td>"; 
				$html.="<td>".$ciudad."</td>";
				$html.="<td>".$estado."</td>";
				$html.="<td>".$cp."</td>"; 
				$html.="<td>".$direccion."</td>";
				$html.="<td>".$titular."</td>";
				$html.="<td>".$numero_empleados."</td>"; 
				$html.="<td>".$zona."</td>";
				$html.="<td>".$latitud."</td>";
				$html.="<td>".$longitud."</td>";
				
				$html.="</tr>";

				$stmt=$db_con->prepare("SELECT * FROM taller WHERE rfc = '$rfc'");
				$stmt->execute();
				if($stmt->rowCount() > 0){
					echo "fallo en renglon ".$contador." ya existe este rfc $rfc ";
				}
				else{
				$query = "INSERT INTO taller(nombre,rfc,ciudad,estado,cp,direccion,titular,fecha_alta,numero_empleados,zona,latitud,longitud) VALUES('".$nombre."','".$rfc."','".$ciudad."','".$estado."','".$cp."','".$direccion."','".$titular."','".date("Y/m/d")."','".$numero_empleados."','".$zona."','".$latitud."','".$longitud."')";
	 
				$stmt=$db_con->prepare($query);
                $stmt->execute();
                $resultado ="exito";
                }
            	}
                else if($encabezados == "" && $contador == 1){
                	echo "por favor inserta una hoja excel con los encabezados correspondientes";
                	$resultado = "fallo";
                }
	        }

		}

		$html.="</table>";
		echo $html;
		if($resultado == "exito"){
		echo "<br />Datos insertados en la base de datos";
		header("Refresh: 1; ../taller_alta.php");
		}
	}else { 
		die("<br/>Lo sentimos, Este tipo de archivo no esta permitido. Solo archivos Excel(ODS)."); 
	}

}

?>