function AjaxF()
{
    var ajax;
    
    try
    {
        ajax = new XMLHttpRequest();/**Mozila, Safari, Chrome**/
    } 
    catch(e) 
    {
        try
        {
            ajax = new ActiveXObject("Msxml2.XMLHTTP");/**Internet Explorer*/
        }
        catch(e) 
        {
            try 
            {
                ajax = new ActiveXObject("Microsoft.XMLHTTP");/**Internet Explorer 8 ou mais antigo**/
            }
            catch(e) 
            {
                alert("Seu browser não da suporte AJAX!");/**Sem suporte a AJAX**/
                return false;
            }
        }
    }
    return ajax;
}

/**Função que faz as requisições Ajax ao arquivo PHP**/
function AlteraConteudo(ID, horario, total, lotacao, total2, entidade, data, intervalo_ini, intervalo_fim, sala, duracao)
{
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){/**Solicita resposta do servidor**/
		if(ajax.readyState === 4)/**caso seja 4=='completo' pega o elemento pelo ID**/
		{
			document.getElementById('conteudo').innerHTML = ajax.responseText;
		}
	};

    var dados="id=" + ID + "&horario=" + horario + "&total=" + total + "&lotacao=" + lotacao + "&total_disponivel=" + total2 + "&entidade=" + entidade + "&data=" + data + "&intervalo_ini=" + intervalo_ini + "&intervalo_fim=" + intervalo_fim + "&sala=" + sala + "&duracao=" + duracao;   
	ajax.open("GET", "retorna_informacoes.php?"+dados, false);
	ajax.setRequestHeader("Content-Type", "text/html");
	ajax.send();
}
function logoutck() {
	var r = confirm("Você realmente deseja  sair?");
		if (r) {
		window.location = "logout.php";

	}
}