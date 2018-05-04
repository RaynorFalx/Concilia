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
				alert("Seu browser não da suporte AJAX!");
				return false;
			}
		}
	}
	return ajax;
}

// Fun��o que faz as requisi��o Ajax ao arquivo PHP
function carregaCadpauta()
{
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){
		if(ajax.readyState === 4)
		{
			document.getElementById('conteudo').innerHTML = ajax.responseText;
		}
	};
	        
	ajax.open("GET", "cadastra_pauta.php", false);        
	ajax.setRequestHeader("Content-Type", "text/html");
	ajax.send();
	
	
}
