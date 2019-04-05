$(document).ready(function(){

$("#boton_registrar").click(function(){
var ciclo = $("#input_ciclo").val();
var id_proveedor = $("#input_id_proveedor").val();
var id_taller = $("#input_id_taller").val();
if(ciclo == "")
M.toast({html:"Introducir  ciclo"});
else if(id_proveedor == "")
M.toast({html:"Introducir  id_proveedor"});
else if(id_taller == "")
M.toast({html:"Introducir  id_taller"});
else 
$.ajax
({
url: "crud_taller_asignacion_talleres/insertar.php",
data: {"ciclo":ciclo,"id_proveedor":id_proveedor,"id_taller":id_taller},
type: "post",
success: function(result){
M.toast({html:result});
}
});
});

});