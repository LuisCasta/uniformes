<html>
<head>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="js/materialize.min.js" type="text/javascript"></script>
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>   
  <script src="crud_SEDECO/SEDECO.js" type="text/javascript"></script>
  <title>SEDECO</title>
  <style type="text/css">
  html,body{
  margin:0px;
  height:100%;
  }
  </style>

</head>
<body class="#eceff1 blue-grey lighten-4"style="background-image: linear-gradient(#9bccff, #00398b); height: 100%;">
  <div class="row">
  <div class="col l7 m7 s12">
     <div class="row">
        <div class="col l12 m12 s12 center" style="margin-top: 10em">
           <h4>Sistema de Control</h4>
           <span>Programa de uniformes escolares</span><br>
           <label>Administración 2016-2022</label>
        </div>
        <div class="col l12 m12 s12 center">
           <a class="waves-effect waves-light #1565c0 blue darken-3 btn-small"><i class="material-icons left">help</i>Ayuda</a>
           <a class="waves-effect waves-light #fbc02d yellow darken-2 btn-small">durango.gob.mx</a>
        </div>
     </div>
  </div>
  <div class="col l5 m5 s12">
     <div id="contenedor" style="height:100%;" class="#263238 blue-grey darken-4 z-depth-5">
        <div class="row">
           <div class="col l12 m12 s12 center" style="margin-top: 2em">
              <img src="img/dgo.png" width="50%"><br><br>
           </div>
           <div class="col l12 m12 s12 center">
              <h5>Inicia Sesión</h5><br><br>
           </div>
           <div class="col l12 m12 s12 center">
              <label class="white-text">Correo electrónico</label>
              <input id="input_correo" class="white-text center"type="text"><br><br>
           </div>
           <div class="col l12 m12 s12 center">
              <label class="white-text">Contraseña</label>
              <input id="input_contraseña" class="white-text center"type="password"><br><br>
           </div>
           <div class="col l12 m12 s12 center">
              <a id="entrar" class="waves-effect waves-light #1565c0 blue darken-3 btn"><i class="material-icons right">security</i>Entrar</a>
           </div>
        </div>
     </div>
  </div>
  </div>
</body>
</html>