$('#btn-submit').on('click', function (event) {

	var cpf_len = $('#cpf').val().replace(/([\W]+)/g, '').length;
	var cpf_val = $('#cpf').val().replace(/([\W]+)/g, ''); 

	var count = 0;
	var empty;

	if (cpf_len !== 11 || cpf_val == '00000000000' || cpf_val == '11111111111' || cpf_val == '22222222222' || cpf_val == '33333333333' || 
		cpf_val == '44444444444' || cpf_val == '55555555555' ||  cpf_val == '66666666666' || cpf_val == '77777777777' || cpf_val == '88888888888' || 
		cpf_val == '99999999999') {

		$("#invalid").modal('show');
		$('#cpf').toggleClass("border-danger");
		return false;
		
	} else {

		var soma;
	    var resto;
	    soma = 0;
		
		for (i=1; i<=9; i++) {
			soma = soma + parseInt(cpf_val.substring(i-1, i)) * (11 - i);
		}

		resto = (soma * 10) % 11;

	    if ((resto == 10) || (resto == 11)){
	    	resto = 0;	
	    } 
		
	    if (resto != parseInt(cpf_val.substring(9, 10)) ){
	    	$('#cpf').toggleClass("border-danger");
	    	$("#invalid").modal('show'); 
	    	return false;
	    } 
		
		soma = 0;

	    for (i = 1; i <= 10; i++){
	    	soma = soma + parseInt(cpf_val.substring(i-1, i)) * (12 - i);
	    } 

	    resto = (soma * 10) % 11;
		
	    if ((resto == 10) || (resto == 11)){
	    	resto = 0;
	    }  

	    if (resto != parseInt(cpf_val.substring(10, 11) )) {
	    	$('#cpf').toggleClass("border-danger");
	    	$("#invalid").modal('show');	    	 
	    	return false;
	    }

	}

	var formData = {
		'nome': 	$('#nome').val(),
		'email': 	$('#email').val(),
		'telefone': $('#telefone').val().replace(/([\W]+)/g, ''),
		'cpf': 		$('#cpf').val().replace(/([\W]+)/g, ''),
		'estado': 	$('#estado').val(),
		'cidade':   $('#cidade').val(),
		'parte':   	$('#parte').val(),
		'processo': $('#processo').val(),
		'mensagem': $('#msg').val(),
	}

	$('.required').each(function() {

		if ($(this).val().length == 0) {
			$("#empty").modal('show');
			$(this).toggleClass("border-danger");
			empty = true;
		} 

		if(count == $('.required').length - 1) {
			if(empty !== true ) {

				$.ajax({
					url: 'insert.php',
					type: 'POST',
					data: formData,
					success: function(response) {
						if(response == true) {
							$.ajax({
								url:  'mail.php',
								type: 'POST',
								data: formData,
								success: function(data) {
									$("#alert").modal('show');

									$("#btn-reload").on('click', function() {
										window.location.href = "http://dsv.trf1.jus.br/Setorial/Formularios/template.php";
									});
								},
							});

						}		
					},

				});

			}
		}

		count++;

	});

}); 

$('input').on('mouseenter', function() {

	$(this).removeClass("border-danger");

});

$('select').on('mouseenter', function() {

	$(this).removeClass("border-danger");

});

$('textarea').on('mouseenter', function() {

	$(this).removeClass("border-danger");

});

