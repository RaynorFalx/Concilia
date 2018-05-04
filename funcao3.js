// Fun��o que verifica se o navegador tem suporte AJAX 
function AjaxF()
{
	var ajax;
	
	try
	{
		ajax = new XMLHttpRequest();
	} 
	catch(e) 
	{
		try
		{
			ajax = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e) 
		{
			try 
			{
				ajax = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e) 
			{
				alert("Seu browser n�o da suporte � AJAX!");
				return false;
			}
		}
	}
	return ajax;
}

// Fun��o que faz as requisi��o Ajax ao arquivo PHP
function apagaAudiencia(ID, codigo, vara, total_disponivel, assunto, data, entidade, horario, total, sala, origem)
{
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){
		if(ajax.readyState === 4)
		{
			document.getElementById('conteudo').innerHTML = ajax.responseText;
		}
	};
	
        var dados="id=" + ID + "&codigo=" + codigo + "&vara=" + vara + "&total_disponivel=" + total_disponivel + "&horario=" + horario + "&total=" + total + "&entidade=" + entidade + "&data=" + data + "&sala=" + sala + "&assunto=" + assunto + "&origem=" + origem;
	ajax.open("GET", "apagar.php?"+dados, false);        
	ajax.setRequestHeader("Content-Type", "text/html");
	ajax.send();

}
