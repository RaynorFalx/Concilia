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

function CarregaProcesso(Processo,Tipo_Processo,Sigla,Local,ID,Horario,Total_disponivel,Entidade,Data_aud,Sala,Total,Intervalo_ini,Intervalo_fim, Duracao)
{
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function()
	{
		if(ajax.readyState === 4)
		{
			document.getElementById('conteudo').innerHTML = ajax.responseText;
		}
	};
	
        var dados="processo=" + Processo + 
        "&sigla=" + Sigla + 
        "&local=" + Local + 
        "&id=" + ID + 
		"&horario=" + Horario + 
		"&total_disponivel=" + Total_disponivel + 
		"&entidade=" + Entidade + 
		"&data_aud=" + Data_aud + 
		"&sala=" + Sala + 
		"&total=" + Total +
		"&intervalo_ini=" + Intervalo_ini +
		"&intervalo_fim=" + Intervalo_fim +
		"&duracao=" + Duracao;
		
        if(Tipo_Processo=='pje')
		{
        	ajax.open("POST", "Cadastra_Audiencia_PJe.php?"+dados+"&tipo_processo=" + Tipo_Processo, false);
			ajax.setRequestHeader("Content-Type", "text/html");
			ajax.send();
		} 
		else
		{
			ajax.open("POST", "VerificaProcesso.php?"+dados, false);
			ajax.setRequestHeader("Content-Type", "text/html");
			ajax.send();
		}   
}
function carregaProc(bt) 
{
	document.getElementById('verificaform').submit();
	var x = document.getElementById("verificaform").elements[0].value;
	var y = document.getElementById("verificaform").elements[1].value;                                                      
	$("#myModal").modal(); //abre o modal com esse id                               
	var Processo = x;
	if( document.getElementById("verificaform").elements[1].checked)
	{
		var Tipo_Processo = y;
	}
	else
	{
		var Tipo_Processo = x;
	}
	
	var Sigla = bt.getAttribute('sigla');
	var Local = bt.getAttribute('local');
	var ID = bt.getAttribute('id'); 
	var Horario = bt.getAttribute('horario');
	var Total_disponivel = bt.getAttribute('total_disponivel');
	var Entidade = bt.getAttribute('entidade');
	var Data_aud = bt.getAttribute('data_aud');
	var Sala = bt.getAttribute('sala');
	var Total = bt.getAttribute('total');   
	var Intervalo_ini = bt.getAttribute('intervalo_ini');
	var Intervalo_fim = bt.getAttribute('intervalo_fim'); 
	var Duracao = bt.getAttribute('duracao'); 

	CarregaProcesso(Processo,Tipo_Processo,Sigla,Local,ID,Horario,Total_disponivel,Entidade,Data_aud,Sala,Total,Intervalo_ini,Intervalo_fim, Duracao);
}
	