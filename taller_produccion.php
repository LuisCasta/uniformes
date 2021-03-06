<?php require_once 'sesionSEDESOE.php';?>
<html>
<head>
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <script src="js/materialize.min.js" type="text/javascript"></script> 
   <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
   <script src="crud_taller_produccion/taller_produccion.js" type="text/javascript"></script>
   <script src="js/sweetalert/sweetalert.js"></script>
   <link rel="stylesheet" href="css/sweetalert/sweetalert.css">
   <meta charset="utf-8">

 

   <title>SEDESOE</title>
</head>
<body class="#eceff1 blue-grey lighten-4">
    <nav class="#01579b light-blue darken-4">
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>Logo</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="sass.html"><i class="material-icons">search</i></a></li>
          <li><a href="badges.html"><i class="material-icons">view_module</i></a></li>
          <li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>
          <li><a href="logoutSEDESOE.php" class="tooltipped" data-position="left" data-tooltip="Cerrar Sesión"><i class="material-icons">cancel</i></a></li>
        </ul>
      </div>
    </nav>  
    <ul id="slide-out" class="sidenav sidenav-fixed #263238 blue-grey darken-4 z-depth-5" >
      <li class="center"><img src="img/dgo.png" width="120px" style="margin-top:1em"></li>
      <li class="center"><label>Sistema Uniformes 2018-2019</label></li>
      <li class="center"><label>Usuario Activo: </label></li>
      <li class="center"><label><a href="#"><?php echo $titular ?></a></label></li>
      <li class="#455a64 blue-grey darken-2 center grey-text">HERRAMIENTAS</li><br>
      <li ><a class="white-text" href="taller.php">          <i class="material-icons white-text">view_compact</i> Inicio     </a></li>
      <li ><a class="white-text" href="taller_pedido.php"><i class="material-icons white-text">local_shipping</i>Estadística de Uniformes</a></li>
      <li ><a class="white-text" href="taller_real.php"><i class="material-icons white-text">assignment_turned_in</i> Entradas a SEDESOE </a></li>
      <li ><a class="white-text" href="taller_pago.php"><i class="material-icons white-text">attach_money</i>Pagos a Talleres</a></li>
      <li ><a class="white-text" href="taller_produccion.php"><i class="material-icons white-text">memory</i>Produccion</a></li>
      <li ><a class="white-text" href="taller_asignacion_talleres.php"><i class="material-icons white-text">assignment</i>Asignacion de Talleres</a></li>
      <li ><a class="white-text" href="taller_reporte.php"><i class="material-icons white-text">folder_special</i> Reporte </a></li>
      <li class="#455a64 blue-grey darken-2 center grey-text"><i class="material-icons">help_outline</i></li>
      <li class="white-text menu"><label>Soporte:</label></li>
      <li class="white-text menu"><label>soporte@durango.gob.mx</label></li>
    </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>          
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <div class="row escritorio" >
      <div class="col l12 m12 s12">
        <h3 style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif;">Produccion</h3>
      </div>
    <div class="col l3 m12 s12">
        <select class="browser-default red white-text"id="selector_programa" style="border-radius: 20px">
        <option value="seleccione" selected>Selecciona un programa</option>
        <?php 
                require_once 'db_config.php'; 
                $stmt=$db_con->prepare("SELECT * FROM ciclo");
                $stmt->execute();
                while($fila=$stmt->fetch(PDO::FETCH_ASSOC)) 
                { 
                   echo '<option value="'.$fila["id"].'">'.$fila["ciclo"].'</option>';
                }             
        ?>
        </select>
    </div>
    <div class='col l3 m12 s12'>
    <select class="browser-default red white-text" style="border-radius: 20px" id='selector_proveedor'>
      <?php
        /*require_once 'db_config.php'; 
                $stmt=$db_con->prepare("SELECT p.id as id1, t.nombre as nombre1 FROM proveedor p INNER JOIN taller t on p.id_taller = t.id");
                $stmt->execute();
                while($fila=$stmt->fetch(PDO::FETCH_ASSOC)) 
                { 
                   echo '<option value="'.$fila["id1"].'">'.$fila["id1"]." ".$fila["nombre1"].'</option>';
                } */ 
       ?>
    </select>
    </div>
    <div class="col l3 m12 s12">
        <select class="browser-default red white-text"id="selector_taller" style="border-radius: 20px">
        <option value="seleccione" selected>Selecciona un taller</option>
        <?php 
                require_once 'db_config.php'; 
                $stmt=$db_con->prepare("SELECT * FROM taller");
                $stmt->execute();
                while($fila=$stmt->fetch(PDO::FETCH_ASSOC)) 
                { 
                   echo '<option value="'.$fila["id"].'">'.$fila["id"]." ".$fila["nombre"].'</option>';
                }             
        ?>
        </select>
    </div>
    <div class='col l3 m12 s12'>
        <label class='blue-text'>Kits</label>
        <input type='number' id='input_kits'><br><br>
    </div>
    <div class="col l3 m12 s12">
        <select class="browser-default red white-text"id="selector_actividad" style="border-radius: 20px">
        <option value="seleccione" selected>Selecciona una actividad</option>
        <option value="Confeccion">Confeccion</option>
        <option value="Bordado" >Bordado</option>
        </select>
    </div>  
    <div class="col l3 m12 s12">
        <select class="browser-default red white-text"id="selector_tipo_uniforme" style="border-radius: 20px">
        <option value="seleccione" selected>Selecciona un tipo de uniforme</option>
        <option value="Pantalon">Pantalon</option>
        <option value="Playera" >Playera</option>
        <option value="Chamarra">Chamarra</option>
        </select>
    </div>
	  <div class='col l12 m12 s12'>
    <div class='col l4 m12 s12'><br>
    	  <label class='blue-text'>fecha</label>
    	  <input type='date' id='input_fecha'>
	  </div>
	  <div class="col l4 m12 s12"><br><br>
	  <a id="boton_registrar" class="blue waves-effect waves-light btn"><i class="material-icons right">exit_to_app</i>Registrar</a>
	  </div>
    </div>
    <div class="col l12 m12 s12">
        <table>
        <thead>
          <tr>
              <th>Ciclo</th>
              <th>Proveedor</th>
              <th>Taller</th>
              <th>Kits</th>
              <th>Actividad</th>
              <th>Tipo Uniforme</th>
              <th>Fecha</th>              
          </tr>
        </thead>
        <tbody>
            <?php 
                require_once 'db_config.php'; 
                $stmt=$db_con->prepare("SELECT c.ciclo as ciclo1, p.id_proveedor as proveedor1, t.nombre as taller1, p.kits as kits1, p.actividad as actividad1, p.tipo_uniforme as tipo_uniforme1, p.fecha as fecha1 FROM produccion p INNER JOIN taller t on p.id_taller = t.id INNER JOIN ciclo c on p.id_ciclo = c.id");
                $stmt->execute();
                while($fila=$stmt->fetch(PDO::FETCH_ASSOC)) 
                { 
                  $stmt2=$db_con->prepare("SELECT t.nombre as nombreproveedor FROM proveedor p INNER JOIN taller t on p.id_taller = t.id where p.id = ". $fila["proveedor1"]);
                  $stmt2->execute();
                  $row=$stmt2->fetch(PDO::FETCH_ASSOC);
                   echo '<tr><td>'.$fila["ciclo1"].'</td>';
                   echo '<td>'.$row["nombreproveedor"].'</td>';
                   echo '<td>'.$fila["taller1"].'</td>';
                   echo '<td>'.$fila["kits1"].'</td>';
                   echo '<td>'.$fila["actividad1"].'</td>';
                   echo '<td>'.$fila["tipo_uniforme1"].'</td>';
                   echo '<td>'.$fila["fecha1"].'</td></tr>';
                }             
            ?>
        </tbody>
      </table>
            
      </div>        
    </div>
</body>
<style type="text/css">
 li.menu{
  margin-left: 70px;
 }
 div.escritorio{
  margin-left: 350px;
 }
</style>
<script type="text/javascript">
    $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.tooltipped').tooltip();
  });
</script>
</html>