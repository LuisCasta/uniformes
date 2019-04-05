$(document).ready(function(){

$("#boton_registrar").click(function(){
var ciclo = $("#selector_programa").val();
var proveedor = $("#selector_proveedor").val();
var taller = $("#selector_taller").val();
var kits = $("#input_kits").val();
var actividad = $("#selector_actividad").val();
var tipo_uniforme = $("#selector_tipo_uniforme").val();
var fecha = $("#input_fecha").val();
if(actividad == "seleccione")
M.toast({html:"Introducir  actividad"});
else if(ciclo == "seleccione")
M.toast({html:"Introducir  ciclo"});
else if(proveedor == "seleccione" || proveedor == "")
M.toast({html:"Introducir  proveedor"});
else if(taller == "seleccione")
M.toast({html:"Introducir  taller"});
else if(tipo_uniforme == "seleccione")
M.toast({html:"Introducir  tipo_uniforme"});
else if(fecha == "")
M.toast({html:"Introducir  fecha"});
else if(kits == "")
M.toast({html:"Introducir  kits"});
else 
$.ajax
({
url: "crud_taller_produccion/insertar.php",
data: {"ciclo":ciclo,"proveedor":proveedor,"taller":taller,"actividad":actividad,"tipo_uniforme":tipo_uniforme,"fecha":fecha,"kits":kits},
type: "post",
success: function(result){
M.toast({html:result});
}
});
});


$('#selector_programa').change(function(){
var ciclo =	$('#selector_programa').val();
	$.ajax
	({
	   url: 'crud_taller_produccion/obtener_proveedor.php',
	   data: {"ciclo":ciclo},
	   type: 'post',
	   success: function(result){	
	   $('#selector_proveedor').html(result);   	
	   }	
	});
});
});