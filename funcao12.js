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
function CarregaValor(ID,Codigo,Processo,Valor)
{
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){
		if(ajax.readyState === 4)
		{
			document.getElementById('conteudo').innerHTML = ajax.responseText;
		}
	};
	
        var dados="valor=" + Valor + "&id=" + ID + "&codigo=" + Codigo + "&processo=" + Processo;

        		ajax.open("GET", "AtualizaValor.php?"+dados, false);
				ajax.setRequestHeader("Content-Type", "text/html");
				ajax.send();
           
}
            function atualizaValor(bt) {
                document.getElementById('atualiza_valor').submit();
                var ID = document.getElementById("atualiza_valor").elements[0].value; 
                var Codigo = document.getElementById("atualiza_valor").elements[1].value;   
                var Processo = document.getElementById("atualiza_valor").elements[2].value;   
                var Valor = document.getElementById("atualiza_valor").elements[3].value; 
                $("#myModal").modal(); //abre o modal com esse id                                                               
                CarregaValor(ID,Codigo,Processo,Valor);
            }

            function submitOnEnter(inputElement, event) {
				if (event.keyCode == 13) {

				
					inputElement.form.submit();
			}
		}
