function validacao_aud()
{
	jQuery('.radio').each(function()
	{
		if(jQuery('.vara').is(':checked')) 
		{
			jQuery('#vara').prop('disabled', false);

		} 
		else 
		{
			jQuery('#vara').prop('disabled', true);
		}

		if(jQuery('.processo_buscar').is(':checked')) 
		{
			jQuery('#processo_buscar').prop('disabled', false);
		} 
		else 
		{
			jQuery('#processo_buscar').prop('disabled', true);
			jQuery('#processo_buscar').val("");
		}
		if(jQuery('.assunto_buscar').is(':checked')) 
		{		
			jQuery('#assunto_buscar').prop('disabled', false);
		} 
		else 
		{
			jQuery('#assunto_buscar').prop('disabled', true);
			jQuery('#assunto_buscar').val("");
		}

	});
}
/*function Teste_index() 
{  
	jQuery('.radio').each(function()
	{
		if(jQuery('.vara').is(':checked')) 
		{
			var vara    =	document.getElementById("vara");   
			if(vara.selectedIndex == 0)
			{
				alert("Nehuma vara selecionada");
				location.reload();
				return false;
			} else {
				document.getElementById('busc_aud').submit();   
			}
		} 			
	});

}*/
