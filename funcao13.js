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
function enviaResultado(ID, horario, total, total2, entidade, conciliador, data,  sala, assunto)
{
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){
		if(ajax.readyState === 4)
		{
			document.getElementById('conteudo').innerHTML = ajax.responseText;
		}
	};
	
    var dados=	"id-ID=" + ID + 
    			"&horario=" + horario + 
				"&total=" + total + 
				"&data-total_disponivel=" + total2 + 
				"&data-entidade=" + entidade + 
				"&data-date=" + data + 
				"&conciliador=" + conciliador +
				"&sala=" + sala + "&assunto=" + assunto;    
				
	ajax.open("POST", "resultado_index.php"+dados, false);
	//ajax.open("GET", "resultado_index.php?" +  dados, false);
	ajax.setRequestHeader("Content-Type", "text/html");
	ajax.send();
}
