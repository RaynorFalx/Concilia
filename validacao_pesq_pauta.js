function validacao_pesquisa() {

	var count;

	jQuery('.radio').each(function() {

		if(jQuery('.entidade').is(':checked')) { 

	   		jQuery('#entidade').prop('disabled', false);

	 	} else {

	 		jQuery('#entidade').prop('disabled', true);
	 		jQuery('#entidade').val("");
	 		
	 	}

	 	if(jQuery('.assunto').is(':checked')) {

	 		jQuery('#assunto').prop('disabled', false);

	 	} else {

	 		jQuery('#assunto').prop('disabled', true);
	 		jQuery('#assunto').val("");

	 	};

	});

}

