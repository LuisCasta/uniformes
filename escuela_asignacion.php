<?php require_once 'sesionSEED.php';?>
<html>
<head>
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <script src="js/materialize.min.js" type="text/javascript"></script> 
   <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
   <script src="crud_escuela_asignacion/escuela_asignacion.js" type="text/javascript"></script>
   <script src="js/sweetalert/sweetalert.js"></script>
   <link rel="stylesheet" href="css/sweetalert/sweetalert.css">
   <meta charset="utf-8">

 

   <title>SEED</title>
</head>
<body class="#eceff1 blue-grey lighten-4">
    <nav class="#01579b light-blue darken-4">
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>Logo</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="sass.html"><i class="material-icons">search</i></a></li>
          <li><a href="badges.html"><i class="material-icons">view_module</i></a></li>
          <li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>
          <li><a href="logoutSEED.php" class="tooltipped" data-position="left" data-tooltip="Cerrar Sesión"><i class="material-icons">cancel</i></a></li>
        </ul>
      </div>
    </nav>  
    <ul id="slide-out" class="sidenav sidenav-fixed #263238 blue-grey darken-4 z-depth-5" >
      <li class="center"><img src="img/dgo.png" width="120px" style="margin-top:1em"></li>
      <li class="center"><label>Sistema Uniformes 2018-2019</label></li>
      <li class="center"><label>Usuario Activo: </label></li>
      <li class="center"><label><a href="#"><?php echo $titular ?></a></label></li>
      <li class="#455a64 blue-grey darken-2 center grey-text">HERRAMIENTAS</li><br>
      <li ><a class="white-text" href="escuela.php">          <i class="material-icons white-text">view_compact</i> Inicio</a>     </li>
      <li ><a class="white-text" href="escuela_alta.php">     <i class="material-icons white-text">school</i> Altas</a>        </li>
      <li ><a class="white-text" href="escuela_historial.php"><i class="material-icons white-text">account_balance</i> Escuelas </a></li>
      <li ><a class="white-text" href="escuela_pedido.php"><i class="material-icons white-text">local_shipping</i> Estadística de Uniformes </a></li>
      <li ><a class="white-text" href="escuela_asignacion.php"><i class="material-icons white-text">assignment</i> Asignacion </a></li>
      <li ><a class="white-text" href="escuela_stock.php"><i class="material-icons white-text">vpn_key</i> Stock </a></li>
      <li ><a class="white-text" href="escuela_etapa.php"><i class="material-icons white-text">camera</i> Nueva Etapa </a></li>
      <li ><a class="white-text" href="escuela_real.php"><i class="material-icons white-text">assignment_turned_in</i> Entradas a Stock </a></li>
      <li ><a class="white-text" href="escuela_entrega.php"><i class="material-icons white-text">done_all</i> Distribución a Escuelas</a></li>
      <li class="#455a64 blue-grey darken-2 center grey-text"><i class="material-icons">help_outline</i></li>
      <li class="white-text menu"><label>Soporte:</label></li>
      <li class="white-text menu"><label>soporte@durango.gob.mx</label></li>
    </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <div class="row escritorio" >
      <div class="col l4 m12 s12">
        <select class="browser-default red white-text"id="selector_tipo" style="border-radius: 20px">
        <option value="pedido" selected>Pedido Normal</option>
        <option value="extra">Pedido Extra</option>
        </select>
      </div>
      <div class="col l12 m12 s12">
        <h3 id="titulo" style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif;">Asignacion</h3>
      </div>

      <div class="col l4 m12 s12">
        <select class="browser-default red white-text"id="selector_ciclo" style="border-radius: 20px">
        <option value="seleccione" selected>Seleccione un programa</option>       
        <?php 
                require_once 'db_config.php'; 
                $stmt=$db_con->prepare("SELECT * FROM ciclo");
                $stmt->execute();
                while($fila=$stmt->fetch(PDO::FETCH_ASSOC)) 
                { 
                   echo '<option value="'.$fila["ciclo"].'">'.$fila["ciclo"].'</option>';
                }             
        ?>
        </select>
      </div>      
      <div class="col l4 m12 s12">
        <select class="browser-default red white-text"id="selector_etapa" style="border-radius: 20px">
        </select>
      </div>   
      <div class="col l4 m12 s12">
        <select class="browser-default red white-text"id="selector_grado" style="border-radius: 20px"> 
        <option value="seleccione" selected>Seleccione un nivel educativo</option> 
        <option value="preescolar">preescolar</option> 
        <option value="primaria">primaria</option>
        <option value="secundaria">secundaria</option>    
        </select>
      </div>
      <div class="col l4 m12 s12">
        <br>
        <a id="registrar" class="blue waves-effect waves-light btn"><i class="material-icons right">backup</i>Registrar</a>
      </div>
      <div class="col l4 m12 s12 right">
        <br><br><br><br>
          <label>Total del pedido</label>
        <input id="input_total" type="number" disabled="true" value="0">
      </div>

      <div class="col l12 m12 s12 ">
       <table class="centered" id="tabla">
        <thead>
          <tr id="encabezado">        
          </tr>
        </thead>
        <tbody>
          <tr id="renglon">        
          </tr>          
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