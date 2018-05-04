//Atualizado 09/03/2017
// Função que verifica se o navegador tem suporte AJAX 
function AjaxF()
{
	var ajax;
	
	try{
		ajax = new XMLHttpRequest();
	} 
	catch(e){
		try{
			ajax = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e){
			try{
				ajax = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				alert("Seu browser não da suporte à AJAX!");
				return false;
			}
		}
	}
	return ajax;
}
				
// Função que faz as requisições Ajax ao arquivo PHP
function CarregaHorario(Entidade, Assunto, Dia, Mes, Ano, Total, Conciliador, Duracao, Horarios, Status, IntervaloI, IntervaloF, Sala,Cadastrar)//Verificando esta função
{
	var ajax = AjaxF();	

	ajax.onreadystatechange = function()
	{
	
		if(ajax.readyState === 4)
		{
			document.getElementById('conteudo').innerHTML = ajax.responseText;
		}
		
	};
	//O valor cadastrar é zero caso o usuário alterar o valor da duração da audiencia, ele recarrega a modal com o cadatra_pauta.php  com a duração das pautas com o valor alterado de acordo e passa todos os dados que  o usuário preencheu com o metodo GET
	if(Cadastrar == 0)
	{	
		var dados="entidade=" + Entidade + "&assunto=" + Assunto + "&dia=" + Dia + "&mes=" + Mes + "&ano=" + Ano + "&total=" + Total + "&conciliador=" + Conciliador + "&duracao=" + Duracao + "&horarios=" + Horarios +  "&intervaloi=" + IntervaloI + "&intervalof=" + IntervaloF + "&sala=" + Sala +"&status=" + Status + "&cadastrar=" + Cadastrar;
		ajax.open("GET", "cadastra_pauta.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html"); 
		ajax.send();
	//O valor cadastrar é um caso o usuário clicar no botao de cadastrar a pauta, os dados sao enviados para a pagina inserir_pauta.php com o metodo GET
	}else if(Entidade=='')
	{
		alert("O campo Entidade está vazio");
		document.getElementById("entidade").focus(); 
		var dados="entidade=" + Entidade + "&assunto=" + Assunto + "&dia=" + Dia + "&mes=" + Mes + "&ano=" + Ano + "&total=" + Total + "&conciliador=" + Conciliador + "&duracao=" + Duracao + "&horarios=" + Horarios +  "&intervaloi=" + IntervaloI + "&intervalof=" + IntervaloF + "&sala=" + Sala +"&status=" + Status + "&cadastrar=" + Cadastrar;
		ajax.open("GET", "cadastra_pauta.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html"); 
		ajax.send();
		//onEsChange();
	}else if(Assunto=='')
	{
		alert("Campo Assunto está vazio ");
		document.getElementById("assunto").focus(); 
		var dados="entidade=" + Entidade + "&assunto=" + Assunto + "&dia=" + Dia + "&mes=" + Mes + "&ano=" + Ano + "&total=" + Total + "&conciliador=" + Conciliador + "&duracao=" + Duracao + "&horarios=" + Horarios +  "&intervaloi=" + IntervaloI + "&intervalof=" + IntervaloF + "&sala=" + Sala +"&status=" + Status + "&cadastrar=" + Cadastrar;
		ajax.open("GET", "cadastra_pauta.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html"); 
		ajax.send();
		//onEsChange();
	}else if(Dia=='')
	{
		alert("Campo Dia está vazio ");
		document.getElementById("dia").focus(); 
		var dados="entidade=" + Entidade + "&assunto=" + Assunto + "&dia=" + Dia + "&mes=" + Mes + "&ano=" + Ano + "&total=" + Total + "&conciliador=" + Conciliador + "&duracao=" + Duracao + "&horarios=" + Horarios +  "&intervaloi=" + IntervaloI + "&intervalof=" + IntervaloF + "&sala=" + Sala +"&status=" + Status + "&cadastrar=" + Cadastrar;
		ajax.open("GET", "cadastra_pauta.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html"); 
		ajax.send();
		//onEsChange();
	}else if(Mes=='')
    {
		alert("Campo Mês está vazio ");
		document.getElementById("mes").focus(); 
		var dados="entidade=" + Entidade + "&assunto=" + Assunto + "&dia=" + Dia + "&mes=" + Mes + "&ano=" + Ano + "&total=" + Total + "&conciliador=" + Conciliador + "&duracao=" + Duracao + "&horarios=" + Horarios +  "&intervaloi=" + IntervaloI + "&intervalof=" + IntervaloF + "&sala=" + Sala + "&status=" + Status + "&cadastrar=" + Cadastrar;
		ajax.open("GET", "cadastra_pauta.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html"); 
		ajax.send();
		//onEsChange();
	}else if(Ano=='')
	{
		alert("Campo Ano está vazio ");
		document.getElementById("ano").focus(); 
		var dados="entidade=" + Entidade + "&assunto=" + Assunto + "&dia=" + Dia + "&mes=" + Mes + "&ano=" + Ano + "&total=" + Total + "&conciliador=" + Conciliador + "&duracao=" + Duracao + "&horarios=" + Horarios +  "&intervaloi=" + IntervaloI + "&intervalof=" + IntervaloF + "&sala=" + Sala + "&status=" + Status + "&cadastrar=" + Cadastrar;
		ajax.open("GET", "cadastra_pauta.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html"); 
		ajax.send();
		//onEsChange();
	}else if(Total=='')
	{
		alert("Campo Total de Audiencias está vazio ");
		document.getElementById("total").focus(); 
		var dados="entidade=" + Entidade + "&assunto=" + Assunto + "&dia=" + Dia + "&mes=" + Mes + "&ano=" + Ano + "&total=" + Total + "&conciliador=" + Conciliador + "&duracao=" + Duracao + "&horarios=" + Horarios +  "&intervaloi=" + IntervaloI + "&intervalof=" + IntervaloF + "&sala=" + Sala + "&status=" + Status + "&cadastrar=" + Cadastrar;
		ajax.open("GET", "cadastra_pauta.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html"); 
		ajax.send();
		onEsChange();

	}else if(Horarios=="null")
	{
		alert("Horário de início não definido"+Horarios);
		document.getElementById("horarios").focus();
	}
	else
	{

		var inicio_pauta  =	parseInt(document.getElementById('horarios').value);
		var intervalo_ini = parseInt(document.getElementById('ini').value);
		var intervalo_fim = parseInt(document.getElementById('fim').value);
		var inicio 		  = document.getElementById('ini').value;
		var termino		  = document.getElementById('fim').value;
	
		if(intervalo_ini > intervalo_fim){

			alert("Horário de início não deve ser após o horário de final");
			document.getElementById("ini").focus();

		} else if (intervalo_ini < inicio_pauta){

			alert("Impossível criar intervalos antes do início da pauta");
			document.getElementById("ini").focus();

		}else if((inicio == termino)&&(inicio!=''&&termino!=''))
		{
			alert("Opção de intervalo inválida, selecione a opção de não incluir intervalo ou corrija o intervalo");
			document.getElementById("fim").focus();	
			
		}

		else {
		
			var dados="entidade=" + Entidade + "&assunto=" + Assunto + "&dia=" + Dia + "&mes=" + Mes + "&ano=" + Ano + "&total=" + Total + "&conciliador=" + Conciliador + "&duracao=" + Duracao + "&horarios=" + Horarios +  "&intervaloi=" + IntervaloI + "&intervalof=" + IntervaloF + "&sala=" + Sala;
			window.location="inserir_pauta.php?"+dados;

		}
	}
	if(Status=="2"){
	document.getElementById("Categoria").options[1].selected=true;/*indexa a opção de não haver intervalo no campo Categoria*/
	teste();
	}

}
// Função que recebe as variaveis do form da pagina cadastra_pauta.php e os envia para a função CarregaHorario
function carregaNovo(bt) {     

	document.getElementById('cadastropauta').submit();   
	
    var Entidade    =	document.getElementById("cadastropauta").elements[0].value;            
    var Assunto     =	document.getElementById("cadastropauta").elements[1].value;
	var Dia 	    =	document.getElementById("cadastropauta").elements[2].value;
	var Mes 	    =	document.getElementById("cadastropauta").elements[3].value;
	var Ano 	    =	document.getElementById("cadastropauta").elements[4].value;
    var Total 	    =	document.getElementById("cadastropauta").elements[5].value;
    var Conciliador =	document.getElementById("cadastropauta").elements[6].value;
	var Sala 		=	document.getElementById("cadastropauta").elements[7].value;
	var Duracao 	=	document.getElementById("cadastropauta").elements[8].value;
	var Horarios 	=	document.getElementById("cadastropauta").elements[9].value;
	var Status	 	=	document.getElementById("cadastropauta").elements[10].value;
	var IntervaloI	=	document.getElementById("cadastropauta").elements[11].value;
	var IntervaloF	=	document.getElementById("cadastropauta").elements[12].value;
	
    $("#myModal").modal();
	var Cadastrar = bt.getAttribute('cadastrar');
    CarregaHorario(Entidade, Assunto, Dia, Mes, Ano, Total, Conciliador, Duracao, Horarios, Status, IntervaloI, IntervaloF, Sala, Cadastrar);

}
/**Função responsável pela manutenção do intervalo de acordo com a opção do select Categoria**/
function teste()
{			
	$('#1').css("visibility","hidden");		
	chng(document.getElementById('ini').opValue);/*chama a função para zerar os valores*/
	document.getElementById("Categoria").onchange=function()/*quando for mudado o select*/
	{
		$('#1').css("visibility","visible");/*mostra a linha do intervalo*/
		document.getElementById('ini').selectedIndex = "selected";
		document.getElementById('fim').selectedIndex = "selected";
		onEsChange();
		if(this.selectedIndex!=0)/*se a option da Categoria for não*/
		{
			$('#1').css("visibility","hidden");			
			chng(document.getElementById('ini').opValue);/*chama a função para zerar os valores*/					
		}
	}
}
/**Função  para zerar os valores**/
function onEstadoChange()
{
	var regex = new RegExp("00:00", 'i'); /*CRIA UM REGEX QUE VAI IGNORAR MAISCULA/MINUSCULA*/
	
	var option = jQuery('#fim').find('option').filter(function()/*zera o select do fim do intervalo*/
	{
		jQuery(this).removeAttr('selected'); /*COMO ESTA ITERANDO TODOS OS option JÁ APROVEITO PARA REMOVER O ATRIBUTO SELECTED*/
		return jQuery(this).attr('value').match(regex) != null;
	});
	var opValue = option.attr('value');
	jQuery('#fim').val(opValue); 
	
	var option1 = jQuery('#ini').find('option1').filter(function()
	{
		jQuery(this).removeAttr('selected'); 
		return jQuery(this).attr('value').match(regex) != null;
	});
	var opValue = option1.attr('value');
	jQuery('#ini').val(opValue); 
}
/**Função auxiliar para zerar os valores**/
function chng(value)
{
		jQuery('#Categoria').on('change', function()/*CRIA UM EVENTO change QUE É DISPARADO QUANDO O CONTEUDO MUDA*/ 
		{ 
			var value = this.value;/*PEGA O VALOR DO SELECT CATEGORIA*/
			onEstadoChange(value);/*envia para a função zeradora*/
		});
		onEstadoChange(value);
};
/**Função responsável pela dinamização do intervalo**/
var tamanho=0;
function onEsChange()
{		
	var tem=confere();

	var  Tot =	document.getElementById("cadastropauta").elements[5].value;
	if(Tot=='' && tem==0)/*verificação de segurança para garantir que o o total de audiências não será nulo*/
	{
		alert ("Defina a quantidade de audiências primeiro.");/*informativo*/
		document.getElementById("total").focus(); /*redirecionamento para o campo total de audiências*/
	}else
	{				
	$("#horarios").css('color','black');
		var Total = parseInt(Tot);/*cast para o tipo inteiro*/

		if(Total<=2)/*se o total de audiências for igual ou menor que 2 haverá 0 ou 1 intervalo, impossibilitando assim sua existência*/
		{			
			$("[name=use]").css('display','inline');
			document.getElementById("Categoria").options[1].selected=true;/*indexa a opção de não haver intervalo no campo Categoria*/
			teste();/*chama a função que zera os limites do intervalo*/
			var tam = parseInt(document.getElementById("ini").length);
			var com = document.getElementById("ini").options;
			var fin = document.getElementById("fim").options;
			for(var i=0;i<=tam;i++)
			{
				$(com[i]).prop("disabled",true);
				$(fin[i]).prop("disabled",true);
			}
		}
		else
		{
			$("[name=use]").css('display','none');
			/*Função que indexa o início do intervalo de acordo com o horário de início*/
		
			var y= document.getElementById("horarios").selectedIndex;
			y++;
			var val = document.getElementById("horarios").options;
			var value = val[y];
			var regex = new RegExp(value.text, 'i'); // CRIA UM REGEX QUE VAI IGNORAR MAISCULA/MINUSCULA
			var option = jQuery('#ini').find('option').filter(function()
			{
				jQuery(this).removeAttr('selected'); 
				return jQuery(this).attr('value').match(regex) != null;
			});
			var opValue = option.attr('value');
			jQuery('#ini').val(opValue); 

			/*Função que indexa o fim do intervalo de acordo com a soma : horário_de_início+Total_de_audiências*/

			var z =((y-2)+Total);
			var val1 = document.getElementById("horarios").options;
			var value1 = val1[z];
			var regex1 = new RegExp(value1.text ,'i')
			var option1 = jQuery("#fim").find('option').filter(function()
			{
				jQuery(this).removeAttr('selected'); 
				return jQuery(this).attr('value').match(regex1) != null;
			});
			var opValue = option1.attr('value');
			jQuery("#fim").val(opValue);
		
			var tam = parseInt(document.getElementById("ini").length);/*tamanho do select de intervalo*/
			var com = document.getElementById("ini").options;
			var fin = document.getElementById("fim").options;	
			for(var i=0;i<=tam;i++)
			{
				if((i>(y-2))&&(i<z))/*se o item na posição i estiver no intervalo ele será liberado para escolha*/
				{
					$(com[i]).css('display','block');
					$(fin[i]).css('display','block');
					$(com[i]).prop("disabled",false);
					$(fin[i]).prop("disabled",false);
					tamanho++;
				}
				else/*se o item na posição i não estiver no intervalo ele será desabilitado*/
				{	
					$(com[i]).css('display','none');
					$(fin[i]).css('display','none');
					$(com[i]).prop("disabled",true);
					$(fin[i]).prop("disabled",true);
				}
			}
			$(fin[y-1]).css('display','none');
			$(fin[y-1]).prop("disabled",true);
		}

	}	
}
function requis()
{					
	var Duracao 	=	parseInt(document.getElementById("cadastropauta").elements[8].value);
	/*Função que indexa o início do intervalo de acordo com o horário de início*/

	var y= document.getElementById("ini").selectedIndex;
	y++;
	var val = document.getElementById("ini").options;
	var value = val[y];
	var regex = new RegExp(value.text, 'i'); 
	var option = jQuery('#fim').find('option').filter(function()
	{
		jQuery(this).removeAttr('selected'); 
		return jQuery(this).attr('value').match(regex) != null;
	});
	var opValue = option.attr('value');
	jQuery('#fim').val(opValue); 
	/*Função que indexa o fim do intervalo de acordo com a soma : horário_de_início+3h/Duracao*/

	
	var Total = parseInt(240 / Duracao);
	
	var z =((y-2)+Total)+2;

	var tam = parseInt(document.getElementById("ini").length);/*tamanho do select de intervalo*/
	var fin = document.getElementById("fim").options;
	
	for(var i=0;i<=tam;i++)
	{
		if((i>=y)&&(i<z))/*se o item na posição i estiver no intervalo ele será liberado para escolha*/
		{
			$(fin[i]).css('display','block');
			$(fin[i]).prop("disabled",false);
		}
		else/*se o item na posição i não estiver no intervalo ele será desabilitado*/
		{	
			$(fin[i]).css('display','none');
			$(fin[i]).prop("disabled",true);
		}
	}
	tamanho=0;
	confere();			
}

function confere(){
	var cate = document.getElementById("Categoria");
	if(cate.selectedIndex == 1)
	{
		cate.options[1].selected=true;/*indexa a opção de não haver intervalo no campo Categoria*/
		teste();	
		return 1;
	}else{
		return 0;
	}
}
function altera()
{
	$('#novo_esconde_item').css("visibility","hidden");/*esconde a linha de intervalo*/	
}

function TeclaEnterPress()
{
	if(event.keyCode == 13)
	{
			document.getElementById("cadastro_de_pauta").click();
	}
}
					
function enter_usar(evt)	{
$('#Cadastrar').click();	
}
/**Função que direciona itens para a validação (funcção ver(){}) do modal busca_aud**/						
function direciona(bt)
{     
    var vara		=	document.getElementById("busca_de_audiencia").elements[8].value;
	var processo	=	document.getElementById("busca_de_audiencia").elements[10].value;
	var assunto		=	document.getElementById("busca_de_audiencia").elements[12].value;
	var parte		=   document.getElementById("busca_de_audiencia").elements[14].value;
	
    $("#myModal").modal();
	var Cadastrar = bt.getAttribute('visualizar');
    ver(vara, processo, assunto, parte, Cadastrar);
}
/**Função ver que evita a pesquisa vazia**/	
function ver(vara,processo, assunto, parte, Cadastrar)
{	
	if(vara=="null"&&processo==''&&assunto==''&&parte=='')
	{
		alert("Preencha pelo menos um dos campos da busca!");
		document.getElementById("vara_buscar").focus();
		return false;
	}
	else
	{
		busca_de_audiencia.submit();
	}
}
function redireciona()
{
	
}
function aux_pesq(bt)
{    var x = document.getElementById("myTable");
	alert(x.length);
    var vara		=	document.getElementById("busca_de_audiencia").elements[8].value;
	var processo	=	document.getElementById("busca_de_audiencia").elements[10].value;
	var assunto		=	document.getElementById("busca_de_audiencia").elements[12].value;
	var parte		=   document.getElementById("busca_de_audiencia").elements[14].value;
	
    $("#myModal").modal();
	var Cadastrar = bt.getAttribute('visualizar');
    myFunction(vara, processo, assunto, parte, Cadastrar);
}
function myFunction() {
	
  var input, filter, table, tr, td, i;
input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function calendar() {

	$('#datepicker').multiDatesPicker();

}