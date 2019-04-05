<?php require_once 'sesionSEFI.php';?>
<html>
<head>
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <script src="js/materialize.min.js" type="text/javascript"></script> 
   <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>   
   <script src="crud_proveedor_pedido/proveedor_pedido.js" type="text/javascript"></script>
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
      <li ><a class="white-text" href="proveedor.php">          <i class="material-icons white-text">view_compact</i> Inicio </a></li>
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
        <h3 style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif;">Pedidos</h3>
      </div>
      <div class="col l12 m12 s12">
        <label>Usted puede visualizar, los proveedores dados de alta en el sistema.</label><br><br>
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

      <div id="total_preescolar" class=' col l4 m4 s12 right'></div>
      <div class="col l12 m12 s12">
        <table>
        <thead id="cabecera_preescolar">
          
        </thead>
        <tbody id="tabla_preescolar">
            
        </tbody>
      </table> 
      <br><br><br>           
      </div>

      <div id="total_primaria" class=' col l4 m4 s12 right'></div>
      <div class="col l12 m12 s12">
        <table>
        <thead id="cabecera_primaria">

        </thead>
        <tbody id="tabla_primaria">
            
        </tbody>
      </table>    
      <br><br><br>        
      </div>

      <div id="total_secundaria" class=' col l4 m4 s12 right'></div>
      <div class="col l12 m12 s12">
        <table>
        <thead id="cabecera_secundaria">

        </thead>
        <tbody id="tabla_secundaria">
            
        </tbody>
      </table>            
      
      </div>
      <div class=' col l12 m12 s12' style="margin-top: 30px">
      <form action='proveedor_pedido_excel.php' method='post'>
          <input type='hidden' name='programa' id='programa'>
          <input type='hidden' name='etapa' id='etapa'>
          <button type="submit" class="green waves-effect waves-light btn"><i class="material-icons right">folder</i>Descargar Lista</button>
      </form>
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

