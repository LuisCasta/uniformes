<?php require_once 'sesionSEDESOE.php';?>
<html>
<head>
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <script src="js/materialize.min.js" type="text/javascript"></script> 
   <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
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
      <li ><a class="white-text" href="taller.php">          <i class="material-icons white-text">view_compact</i> Inicio</a>     </li>
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
        <h3 style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif;">Bienvenido al panel de SEDESOE</h3>
      </div>
      <div class="col l12 m12 s12">
        <label>
          En este módulo usted podrá realizar las siguientes funciones para el programa de Uniformes Escolares del Estado de Durango.
        </label>
      </div>
      <div class="col l12 m12 s12">
        <p>Guia Rápida:</p>
        <h6>Inicio: </h6><label>Usted encontrará la pantalla de inicio, justo esta pantalla que está visualizando.</label><br>
        <h6>Estadística de Uniformes: </h6><label>Se podra visualizar los pedidos realizados por SEED</label><br>
        <h6>Entradas a SEDESOE: </h6><label>se Podra capturar lo que realmente se recibio en cada etapa</label><br>
        <h6>Reporte: </h6><label>Se podra visualizar lo pedido contra lo recibido</label><br>
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

