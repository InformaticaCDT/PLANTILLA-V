$(function(){
	$('#f_init').change(function(){
		var fecha1 = $('#f_init').val();
		var fecha2 = $('#f_reanudar').val();

		if(fecha1!='' && fecha2!=''){
			$.ajax({
				type: 'POST',
				url: 'b_dhabiles.php',
				data: ('seleccion1='+fecha1+'&seleccion2='+fecha2),
				success: function(resp){

					if(resp!=""){
						$('#resultados').html(resp);
						//alert("*** ATENCIÓN ***"+"\r\n"+resp);

					}

				}
			})
		}
	})
})
