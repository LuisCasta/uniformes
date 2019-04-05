<?php
$usuario = $_POST['input_usuario'];
$password = $_POST['input_password'];
	
	require_once '../db_config.php'; 
	$stmt=$db_con->prepare("SELECT * FROM colono  WHERE correo = '$usuario'");
	$stmt->execute();
	if($fila=$stmt->fetch(PDO::FETCH_ASSOC)) 
	{ 
		if ($fila['password'] == $password) {
			$usuario    = $fila['correo'];
			$titular    = $fila['titular'];
			$estatus    = $fila['estatus'];
			$id         = $fila['id'];
			session_start();
			$_SESSION['usuario']    = $usuario;
			$_SESSION['titular']    = $titular;
			$_SESSION['estatus']    = $estatus;
			$_SESSION['id']         = $id;
			if($estatus=="ACTIVO")
				echo "exito";
			else
				echo "baja";
		}
		else {
			echo "Usuario o Password Incorrectos";
		}
	}
	else {
			echo "Usuario o Password Incorrectos";			
		}
?>