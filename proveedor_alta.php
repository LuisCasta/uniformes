<?php require_once 'sesionSEFI.php';?>
<html>
<head>
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <script src="js/materialize.min.js" type="text/javascript"></script> 
   <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>   
   <script src="crud_proveedor_alta/proveedor_alta.js" type="text/javascript"></script>
   <script src="js/sweetalert/sweetalert.js"></script>
   <link rel="stylesheet" href="css/sweetalert/sweetalert.css">
   <meta charset="utf-8">

 

   <title>Secretaria De Finanzas</title>
</head>
<body class="#eceff1 blue-grey lighten-4">
    <nav class="#01579b light-blue darken-4">
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>Logo</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="sass.html"><i class="material-icons">search</i></a></li>
          <li><a href="badges.html"><i class="material-icons">view_module</i></a></li>
          <li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>
          <li><a href="logoutSEFI.php" class="tooltipped" data-position="left" data-tooltip="Cerrar Sesión"><i class="material-icons">cancel</i></a></li>
        </ul>
      </div>
    </nav>  
    <ul id="slide-out" class="sidenav sidenav-fixed #263238 blue-grey darken-4 z-depth-5" >
      <li class="center"><img src="img/dgo.png" width="120px" style="margin-top:1em"></li>
      <li class="center"><label>Sistema Uniformes 2018-2019</label></li>
      <li class="center"><label>Usuario Activo: </label></li>
      <li class="center"><label><a href="#"><?php echo $titular ?></a></label></li>
      <li class="#455a64 blue-grey darken-2 center grey-text">HERRAMIENTAS</li><br>
      <li ><a class="white-text" href="proveedor.php">          <i class="material-icons white-text">view_compact</i> Inicio     </a></li>
      <?php 
      if($perfil == "administrador")
      echo '<li ><a class="white-text general" href="usuario.php">     <i class="material-icons white-text">person_add</i> Usuario</a></li>'; 
      ?>
      <li ><a class="white-text general" href="proveedor_alta.php">     <i class="material-icons white-text">person_pin</i> Altas</a></li>
      <li ><a class="white-text" href="proveedor_historial.php"><i class="material-icons white-text">supervised_user_circle</i> Proveedores </a></li>
      <li ><a class="white-text" href="proveedor_pedido.php"><i class="material-icons white-text">local_shipping</i>Pedidos</a></li>
      <li ><a class="white-text" href="proveedor_pago2.php"><i class="material-icons white-text">attach_money</i>Pagos a Proveedores</a></li>
      <li ><a class="white-text" href="proveedor_programa.php"><i class="material-icons white-text">event</i>Programas</a></li>
      <li ><a class="white-text" href="proveedor_vigencia.php"><i class="material-icons white-text">event_available</i>Vigencia</a></li>
      <li ><a class="white-text" href="proveedor_link.php"><i class="material-icons white-text">timeline</i>Links</a></li>
      <li class="#455a64 blue-grey darken-2 center grey-text"><i class="material-icons">help_outline</i></li>
      <li class="white-text menu"><label>Soporte:</label></li>
      <li class="white-text menu"><label>soporte@durango.gob.mx</label></li>
    </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>          
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <div class="row escritorio" >
      <div class="col l12 m12 s12">
        <h3 style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif;">Alta de proveedores</h3>
      </div>
      <div class="col l12 m12 s12">
        <label>Usted puede registrar un nuevo proveedor, siempre y cuando esté dentro del padrón del estado de Durango.</label><br><br>
      </div>
      <div class="col l6 m12 s12">
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
      <div class="col l6 m12 s12">
        <label>Número de Contrato</label>
        <input type="text" id="input_contrato">
      </div>     
      <div class="col l6 m12 s12 right">
        <label>Periodo del contrato</label>
        <input type="date" id="input_periodo">
      </div>
      <div class="col l12 m12 s12" style="margin-top: 2em">
        <a id="registrar" class="blue waves-effect waves-light btn"><i class="material-icons right">backup</i>Registrar</a>
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

