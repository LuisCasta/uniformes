$(document).ready(function(){

$("#boton_registrar").click(function(){
var programa = $("#input_programa").val();
var tipo_documento = $("#input_tipo_documento").val();
var titulo = $("#input_titulo").val();
var link = $("#input_link").val();
if(programa == "")
M.toast({html:"Introducir  programa"});
else if(tipo_documento == "")
M.toast({html:"Introducir  tipo_documento"});
else if(titulo == "")
M.toast({html:"Introducir  titulo"});
else if(link == "")
M.toast({html:"Introducir  link"});
else 
$.ajax
({
url: "crud_proveedor_link/insertar.php",
data: {"programa":programa,"tipo_documento":tipo_documento,"titulo":titulo,"link":link},
type: "post",
success: function(result){
M.toast({html:result});
}
});
});

});