$(document).ready(function(){


$('#selector_ciclo').change(function(){
var ciclo =	$('#selector_ciclo').val();
	$.ajax
	({
	   url: 'crud_escuela_stock/consulta_etapas.php',
	   data: {"ciclo":ciclo},
	   type: 'post',
	   success: function(result){	
	   $('#selector_etapa').html(result);   	
	   }	
	});
});

$('#selector_periodo').change(function(){
var grado = $('#selector_periodo').val();
var etapa = $('#selector_etapa').val();
if(grado == "preescolar"){
	$.ajax
	({
	   url: 'crud_escuela_stock/consulta_preescolar.php',
	   data: {"etapa":etapa},
	   type: 'post',
	   success: function(result){
	   var arreglo = JSON.parse(result);
		$('#tabla_real').html(arreglo.tabla_real);
		//$('#tabla').html(arreglo.tabla);		
	   }	
	});
}
else if(grado == "primaria"){
	$.ajax
	({
	   url: 'crud_escuela_stock/consulta_primaria.php',
	   data: {"etapa":etapa},
	   type: 'post',
	   success: function(result){
	   var arreglo = JSON.parse(result);
		$('#tabla_real').html(arreglo.tabla_real);
		//$('#tabla').html(arreglo.tabla);
	   }	
	});
}
else{
	$.ajax
	({
	   url: 'crud_escuela_stock/consulta_secundaria.php',
	   data: {"etapa":etapa},
	   type: 'post',
	   success: function(result){
	   var arreglo = JSON.parse(result);
		$('#tabla_real').html(arreglo.tabla_real);
		//$('#tabla').html(arreglo.tabla);
	   }	
	});
}
});


$( "#generar" ).click(function(){
$('#modal1').modal();
$('#modal1').modal('open');
});

$('#selector_nivel').change(function(){
var nivel =	$('#selector_nivel').val();
$('#selector_grado').html(grados(nivel));
});

$("#registrar").click(function(){
ciclo = $('#selector_ciclo2').val();
escuela = $('#selector_escuela').val();
nivel = $('#selector_nivel').val();
grado = $('#selector_grado').val();
kits = $('#input_kits').val();
ruta = $('#input_ruta').val();
turno = $('#selector_turno').val();
sexo = $('#selector_sexo').val();
folio = $('#input_folio').val();
if(ciclo == "seleccione")
	M.toast({html:"por favor seleccione ciclo"});
else if(escuela == "seleccione")
	M.toast({html:"por favor seleccione escuela"});
else if(nivel == "seleccione")
	M.toast({html:"por favor seleccione nivel"});
else if(grado == "seleccione")
	M.toast({html:"por favor seleccione grado"});
else if(ruta == "")
	M.toast({html:"por favor ingrese ruta"});
else if(kits == "")
	M.toast({html:"por favor ingrese numero de kits"});
else if(turno == "seleccione")
	M.toast({html:"por favor ingrese turno"});
else if(sexo == "seleccione")
	M.toast({html:"por favor ingrese sexo"});
else if(folio == "")
	M.toast({html:"por favor ingrese folio"});
else{
	swal({
          title: "",
          text: "¿Estás seguro que deseas ingresar una nueva entrega?",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Si, estoy seguro',
          cancelButtonText: "No, cancelar",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm){
				if(nivel == "preescolar")
				$.ajax
				({
				   url: 'crud_escuela_stock/insertapre.php',
				   data: {"ciclo":ciclo,"escuela":escuela,grado:grado,"kits":kits,"ruta":ruta,"turno":turno,"sexo":sexo,"folio":folio},
				   type: 'post',
				   success: function(result){
				   	if(result == "exito")
				            swal("Hecho", result, "success");
					else
							swal("Mensaje", result, "info");
				   }	
				});	
				else if(nivel == "primaria")
				$.ajax
				({
				   url: 'crud_escuela_stock/insertapri.php',
				   data: {"ciclo":ciclo,"escuela":escuela,grado:grado,"kits":kits,"ruta":ruta,"turno":turno,"sexo":sexo,"folio":folio},
				   type: 'post',
				   success: function(result){
				   	if(result == "exito")
				            swal("Hecho", result, "success");
					else
							swal("Mensaje", result, "info");
				   }	
				});	
				else if(nivel == "secundaria")
				$.ajax
				({
				   url: 'crud_escuela_stock/insertasec.php',
				   data: {"ciclo":ciclo,"escuela":escuela,grado:grado,"kits":kits,"ruta":ruta,"turno":turno,"sexo":sexo,"folio":folio},
				   type: 'post',
				   success: function(result){
				   	if(result == "exito")
				            swal("Hecho", result, "success");
					else
							swal("Mensaje", result, "info");
				   }	
				});
			} else {
		            	swal("Cancelado", "Operación cancelada", "error");
		          }
		        });	
	}
});

$('#selector_escuela').change(function(){
var matricula = $('#selector_escuela').val();	
	$.ajax
	({
	   url: 'crud_escuela_stock/consulta_escuelas.php',
	   data: {"matricula":matricula},
	   type: 'post',
	   success: function(result){		   	
		$('#input_escuela').val(result);
	   }	
	});
});

function grados(texto){
	var option = "";
	if(texto == "preescolar" || texto == "secundaria")
	 option = '<option value="seleccione" selected>Seleccione un grado</option><option val="1">1</option><option val="2">2</option><option val="3">3</option>';
	else if(texto == "primaria")
	 option = '<option value="seleccione" slected>seleccione un grado</option><option val="1">1</option><option val="2">2</option><option val="3">3</option><option val="4">4</option><option val="5">5</option><option val="6">6</option>';
	return option;
}

});