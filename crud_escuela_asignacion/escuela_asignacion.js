$(document).ready(function(){

$('#selector_tipo').change(function(){
var tipo = $('#selector_tipo').val();

if(tipo == "pedido"){
	$('#titulo').text("Asignacion");
}
else if(tipo == "extra"){
	$('#titulo').text("Asignacion Extra");
}
});

$('#selector_ciclo').change(function(){
var ciclo =	$('#selector_ciclo').val();
	$.ajax
	({
	   url: 'crud_escuela_asignacion/consulta_etapas.php',
	   data: {"ciclo":ciclo},
	   type: 'post',
	   success: function(result){	
	   $('#selector_etapa').html(result);   	
	   }	
	});
});


var cambiotabla = "nada";

$('#selector_grado').change(function(){

var grado = $('#selector_grado').val();

if(grado == "preescolar"){
	$('#encabezado').html("<th>TALLAS</th>"+enc("3")+enc("4")+enc("5")+enc("6")+enc("8")+enc("10"));
	$('#renglon').html("<td>NUMERO DE KITS</td>"+renglon("3")+renglon("4")+renglon("5")+renglon("6")+renglon("8")+renglon("10"));
	cambiotabla = "uno";
	$('#input_total').val("0");
}
else if(grado == "primaria"){
	$('#encabezado').html("<th>TALLAS</th>"+enc("5")+enc("6")+enc("8")+enc("10")+enc("12")+enc("14")+enc("16")+enc("18")+enc("20")+enc("22")+enc("24"));
	$('#renglon').html("<td>NUMERO DE KITS</td>"+renglon("5")+renglon("6")+renglon("8")+renglon("10")+renglon("12")+renglon("14")+renglon("16")+renglon("18")+renglon("20")+renglon("22")+renglon("24"));
	cambiotabla = "dos";
	$('#input_total').val("0");
}
else{
	$('#encabezado').html("<th>TALLAS</th>"+enc("12")+enc("14")+enc("16")+enc("18")+enc("20")+enc("22")+enc("24")+enc("26"));
	$('#renglon').html("<td>NUMERO DE KITS</td>"+renglon("12")+renglon("14")+renglon("16")+renglon("18")+renglon("20")+renglon("22")+renglon("24")+renglon("26"));
	cambiotabla = "tres";
	$('#input_total').val("0");
}

});

$('#tabla').change(function(){
if(cambiotabla == "uno")	
var total = parseInt($('#3').val(), 10) + parseInt($('#4').val(), 10) + parseInt($('#5').val(), 10) + parseInt($('#6').val(), 10) + parseInt($('#8').val(), 10) + parseInt($('#10').val(), 10);	
else if(cambiotabla == "dos")
var total = parseInt($('#5').val(), 10) + parseInt($('#6').val(), 10) + parseInt($('#8').val(), 10) + parseInt($('#10').val(), 10) + parseInt($('#12').val(), 10) + parseInt($('#14').val(), 10) + parseInt($('#16').val(), 10) + parseInt($('#18').val(), 10) + parseInt($('#20').val(), 10) + parseInt($('#22').val(), 10) + parseInt($('#24').val(), 10);	
else if(cambiotabla == "tres")
var total = parseInt($('#12').val(), 10) + parseInt($('#14').val(), 10) + parseInt($('#16').val(), 10) + parseInt($('#18').val(), 10) + parseInt($('#20').val(), 10) + parseInt($('#22').val(), 10) + parseInt($('#24').val(), 10) + parseInt($('#26').val(), 10);	
$('#input_total').val(total);
});

$('#tabla').keyup(function(e){
if(cambiotabla == "uno")	
var total = parseInt($('#3').val(), 10) + parseInt($('#4').val(), 10) + parseInt($('#5').val(), 10) + parseInt($('#6').val(), 10) + parseInt($('#8').val(), 10) + parseInt($('#10').val(), 10);	
else if(cambiotabla == "dos")
var total = parseInt($('#5').val(), 10) + parseInt($('#6').val(), 10) + parseInt($('#8').val(), 10) + parseInt($('#10').val(), 10) + parseInt($('#12').val(), 10) + parseInt($('#14').val(), 10) + parseInt($('#16').val(), 10) + parseInt($('#18').val(), 10) + parseInt($('#20').val(), 10) + parseInt($('#22').val(), 10) + parseInt($('#24').val(), 10);	
else if(cambiotabla == "tres")
var total = parseInt($('#12').val(), 10) + parseInt($('#14').val(), 10) + parseInt($('#16').val(), 10) + parseInt($('#18').val(), 10) + parseInt($('#20').val(), 10) + parseInt($('#22').val(), 10) + parseInt($('#24').val(), 10) + parseInt($('#26').val(), 10);	
$('#input_total').val(total);

});


$('#registrar').click(function(){
var etapa = $('#selector_etapa').val();
var ciclo =	$('#selector_ciclo').val();
var total = $('#input_total').val();
var nivel = $('#selector_grado').val();
var tipo = $('#selector_tipo').val();

if(etapa == "seleccione")
	M.toast({html:"por favor selecciona una etapa"});
else if(nivel == "seleccione")
	M.toast({html:"por favor selecciona un nivel educativo"});
else if(ciclo == "seleccione")
	M.toast({html:"por favor selecciona un ciclo"});
else if(total == "0")
	M.toast({html:"por favor ingresa algun valor"});
else{
	swal({
          title: "",
          text: "¿Estás seguro que deseas ingresar un nuevo pedido?",
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

	if(cambiotabla == "uno")
	{
	var t3 = $('#3').val();
	var t4 = $('#4').val();
	var t5 = $('#5').val();
	var t6 = $('#6').val();
	var t8 = $('#8').val();
	var t10 = $('#10').val(); 
		$.ajax
		({
		   url: 'crud_escuela_asignacion/insertarpre.php',
		   data: {"tipo":tipo,"etapa":etapa,"ciclo":ciclo,"total":total,"nivel":nivel,"t3":t3,"t4":t4,"t5":t5,"t6":t6,"t8":t8,"t10":t10},
		   type: 'post',
		   success: function(result){	   	
		   if(result == "exito")
		            swal("Hecho", result, "success");
			else
					swal("Mensaje", result, "info");
		   }	
		});
	}

	else if(cambiotabla == "dos")
	{
	var t5 = $('#5').val();
	var t6 = $('#6').val();
	var t8 = $('#8').val();
	var t10 = $('#10').val();
	var t12 = $('#12').val();
	var t14 = $('#14').val();
	var t16 = $('#16').val();
	var t18 = $('#18').val();
	var t20 = $('#20').val();
	var t22 = $('#22').val();
	var t24 = $('#24').val(); 
		$.ajax
		({
		   url: 'crud_escuela_asignacion/insertarpri.php',
		   data: {"tipo":tipo,"etapa":etapa,"ciclo":ciclo,"total":total,"nivel":nivel,"t5":t5,"t6":t6,"t8":t8,"t10":t10,"t12":t12,"t14":t14,"t16":t16,"t18":t18,"t20":t20,"t22":t22,"t24":t24},
		   type: 'post',
		   success: function(result){		   	
		   if(result == "exito")
		            swal("Hecho", result, "success");
			else
					swal("Mensaje", result, "info");
		   }	
		});
	}
	else if(cambiotabla == "tres")
	{
	var t12 = $('#12').val();
	var t14 = $('#14').val();
	var t16 = $('#16').val();
	var t18 = $('#18').val();
	var t20 = $('#20').val();
	var t22 = $('#22').val(); 
	var t24 = $('#24').val();
	var t26 = $('#26').val(); 
		$.ajax
		({
		   url: 'crud_escuela_asignacion/insertarsec.php',
		   data: {"tipo":tipo,"etapa":etapa,"ciclo":ciclo,"total":total,"nivel":nivel,"t12":t12,"t14":t14,"t16":t16,"t18":t18,"t20":t20,"t22":t22,"t24":t24,"t26":t26},
		   type: 'post',
		   success: function(result){
		   if(result == "exito")
		            swal("Hecho", result, "success");
			else
					swal("Mensaje", result, "info");		   	
		   }	
		});
	}
	} else {
            	swal("Cancelado", "Operación cancelada", "error");
          }
        });
	}
});

function enc(texto){
	var th = '<th>'+texto+'</th>';
	return th;
}

function renglon(id){
	var td = "<td><input id='"+id+"' type='number' value='0' class='center'></td>";
	return td;
}

});