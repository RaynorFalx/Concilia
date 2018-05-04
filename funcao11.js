//Atualizado 09/03/2017
// Função que verifica se o navegador tem suporte AJAX 
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

// Função que faz as requisição Ajax ao arquivo PHP
function CarregaResultado(Resultado,ID,Codigo,Processo,Conciliador)
{
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){
		if(ajax.readyState === 4)
		{
			document.getElementById('conteudo').innerHTML = ajax.responseText;
		}
	};
	
        var dados="resultado=" + Resultado + "&id=" + ID + "&codigo=" + Codigo + "&processo=" + Processo + "&conciliador=" + Conciliador;
 
        		ajax.open("GET", "AtualizaResultado.php?"+dados, false);
				ajax.setRequestHeader("Content-Type", "text/html");
				ajax.send();
           
}
            function atualizaResultado(bt) {
                document.getElementById('verificaform').submit();
                var ID = document.getElementById("verificaform").elements[0].value;      
                var Codigo = document.getElementById("verificaform").elements[1].value;   
                var Processo = document.getElementById("verificaform").elements[2].value;   
                var Resultado = document.getElementById("verificaform").elements[3].value;     
				var Conciliador = document.getElementById("verificaform").elements[4].value;  	
                $("#myModal").modal(); //abre o modal com esse id                                                               
                CarregaResultado(Resultado,ID,Codigo,Processo,Conciliador);
            }
            function ShowAlert(){
				 var element=document.getElementById('alerta');
				 element.parentElement.style.display='block';
			}
