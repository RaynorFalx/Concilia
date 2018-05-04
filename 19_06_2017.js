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
				alert("Seu browser n?o da suporte ? AJAX!");
				return false;
			}
		}
	}
	return ajax;
}

// Função que faz as requisições Ajax ao arquivo PHP
function CarregaHorario(Entidade, Assunto, Dia, Mes, Ano, Total, Conciliador,Duracao,IntervaloI, IntervaloF, Horarios, Sala,Cadastrar)
{
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){
	
		if(ajax.readyState === 4){
			document.getElementById('conteudo').innerHTML = ajax.responseText;
		}
		
	};
	//O valor cadastrar é zero caso o usuário alterar o valor da duração da audiencia, ele recarrega a modal com o cadatra_pauta.php  com a duração das pautas com o valor alterado de acordo e passa todos os dados que  o usuário preencheu com o metodo GET
	if(Cadastrar == 0){	
		var dados="entidade=" + Entidade + "&assunto=" + Assunto + "&dia=" + Dia + "&mes=" + Mes + "&ano=" + Ano + "&total=" + Total + "&conciliador=" + Conciliador + "&duracao=" + Duracao + "&intervaloi=" + IntervaloI + "&intervalof=" + IntervaloF +  "&horarios=" + Horarios + "&sala=" + Sala + "&cadastrar=" + Cadastrar;
		ajax.open("GET", "cadastra_pauta.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html"); 
		ajax.send();
	//O valor cadastrar é um caso o usuário clicar no botao de cadastrar a pauta, os dados sao enviados para a pagina inserir_pauta.php com o metodo GET
	}else if(Entidade==''){
		var dados="entidade=" + Entidade + "&assunto=" + Assunto + "&dia=" + Dia + "&mes=" + Mes + "&ano=" + Ano + "&total=" + Total + "&conciliador=" + Conciliador + "&duracao=" + Duracao + "&intervaloi=" + IntervaloI + "&intervalof=" + IntervaloF +  "&horarios=" + Horarios + "&sala=" + Sala + "&cadastrar=" + Cadastrar;
		ajax.open("GET", "cadastra_pauta.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html"); 
		ajax.send();
	}else if(Assunto==''){
		var dados="entidade=" + Entidade + "&assunto=" + Assunto + "&dia=" + Dia + "&mes=" + Mes + "&ano=" + Ano + "&total=" + Total + "&conciliador=" + Conciliador + "&duracao=" + Duracao + "&intervaloi=" + IntervaloI + "&intervalof=" + IntervaloF +  "&horarios=" + Horarios + "&sala=" + Sala + "&cadastrar=" + Cadastrar;
		ajax.open("GET", "cadastra_pauta.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html"); 
		ajax.send();
	}else if(Dia==''){
		var dados="entidade=" + Entidade + "&assunto=" + Assunto + "&dia=" + Dia + "&mes=" + Mes + "&ano=" + Ano + "&total=" + Total + "&conciliador=" + Conciliador + "&duracao=" + Duracao + "&intervaloi=" + IntervaloI + "&intervalof=" + IntervaloF +  "&horarios=" + Horarios + "&sala=" + Sala + "&cadastrar=" + Cadastrar;
		ajax.open("GET", "cadastra_pauta.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html"); 
		ajax.send();
	}else if(Mes==''){
		var dados="entidade=" + Entidade + "&assunto=" + Assunto + "&dia=" + Dia + "&mes=" + Mes + "&ano=" + Ano + "&total=" + Total + "&conciliador=" + Conciliador + "&duracao=" + Duracao + "&intervaloi=" + IntervaloI + "&intervalof=" + IntervaloF +  "&horarios=" + Horarios + "&sala=" + Sala + "&cadastrar=" + Cadastrar;
		ajax.open("GET", "cadastra_pauta.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html"); 
		ajax.send();
	}else if(Ano==''){
		var dados="entidade=" + Entidade + "&assunto=" + Assunto + "&dia=" + Dia + "&mes=" + Mes + "&ano=" + Ano + "&total=" + Total + "&conciliador=" + Conciliador + "&duracao=" + Duracao + "&intervaloi=" + IntervaloI + "&intervalof=" + IntervaloF +  "&horarios=" + Horarios + "&sala=" + Sala + "&cadastrar=" + Cadastrar;
		ajax.open("GET", "cadastra_pauta.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html"); 
		ajax.send();
	}else if(Total==''){
		var dados="entidade=" + Entidade + "&assunto=" + Assunto + "&dia=" + Dia + "&mes=" + Mes + "&ano=" + Ano + "&total=" + Total + "&conciliador=" + Conciliador + "&duracao=" + Duracao + "&intervaloi=" + IntervaloI + "&intervalof=" + IntervaloF +  "&horarios=" + Horarios + "&sala=" + Sala + "&cadastrar=" + Cadastrar;
		ajax.open("GET", "cadastra_pauta.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html"); 
		ajax.send();
	}else{
		var dados="entidade=" + Entidade + "&assunto=" + Assunto + "&dia=" + Dia + "&mes=" + Mes + "&ano=" + Ano + "&total=" + Total + "&conciliador=" + Conciliador + "&duracao=" + Duracao + "&intervaloi=" + IntervaloI + "&intervalof=" + IntervaloF +  "&horarios=" + Horarios + "&sala=" + Sala + "&cadastrar=" + Cadastrar;
		window.location="inserir_pauta.php?"+dados;
	
	}
}
// Função que recee as variaveis do form da pagina cadastra_pauta.php e os envia para a função CarregaHorario
function carregaNovo(bt) {     

	document.getElementById('cadastropauta').submit();   
	
    var Entidade    =	document.getElementById("cadastropauta").elements[0].value;            
    var Assunto     =	document.getElementById("cadastropauta").elements[1].value;
	var Dia 	    =	document.getElementById("cadastropauta").elements[2].value;
	var Mes 	    =	document.getElementById("cadastropauta").elements[3].value;
	var Ano 	    =	document.getElementById("cadastropauta").elements[4].value;
    var Total 	    =	document.getElementById("cadastropauta").elements[5].value;
    var Conciliador =	document.getElementById("cadastropauta").elements[6].value;
	var Duracao 	=	document.getElementById("cadastropauta").elements[7].value;
	var IntervaloI	=	document.getElementById("cadastropauta").elements[8].value;
	var IntervaloF	=	document.getElementById("cadastropauta").elements[9].value;
    var Horarios 	=	document.getElementById("cadastropauta").elements[10].value;
    var Sala 		=	document.getElementById("cadastropauta").elements[11].value;
	
    $("#myModal").modal();
	
	var Cadastrar = bt.getAttribute('cadastrar');

    CarregaHorario(Entidade, Assunto, Dia, Mes, Ano, Total, Conciliador, Duracao, IntervaloI, IntervaloF, Horarios,Sala, Cadastrar);
    checkIntervalo(Duracao);
}

function checkIntervalo(Duracao) {

	var duracao = "duracao=" + Duracao;
	var intervalo_ini = parseInt(document.getElementById('intervalo-ini').value);
	var intervalo_fim = parseInt(document.getElementById('intervalo-fim').value);

	if(intervalo_ini > intervalo_fim) {

		alert("Horário de início não deve ser após horário de fim");
		document.getElementById("intervalo-ini").focus();

	} 

}

function checkTextField(field) {

    if (entidade.value == '') {
        alert("Campo Entidade está vazio");
		document.getElementById("entidade").focus();  //ENTIDADE
		
    } else if (assunto.value == '') {
		alert("Campo Assunto está vazio ");
		document.getElementById("assunto").focus();	 //ASSUNTO
	}	
	else if (dia.value == '') {
		alert("Campo Dia está vazio ");
		document.getElementById("dia").focus(); //DIA
	}	
	else if (mes.value == '') {
		alert("Campo Mês está vazio ");
		document.getElementById("mes").focus(); //MÊS
	}	
	else if (ano.value == '') {
		alert("Campo Ano está vazio ");
		document.getElementById("ano").focus(); //ANO
	}
		else if (total.value == '') {
		alert("Campo Total de Audiencias está vazio ");
		document.getElementById("total").focus();	

	}

}












