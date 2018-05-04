<?php
	//variaveis que s�o recebidas atravez do metodo GET enviados pela funcao10.js e as que sao recebidas pela SESSION
    include "conecta.inc";
    date_default_timezone_set('America/Sao_Paulo');
	
	$sigla_local =  $_SESSION["lotacao"];
    $conciliador =  $_GET['conciliador'];                				 
    $entidade  =  $_GET['entidade'];	
    $conexao  =  $_SESSION['conexao'];                				
    $assunto  =	 $_GET['assunto'];                    				
    $horario  =  $_GET['horarios'];                               
    $duracao  =  $_GET['duracao'];
    $duracao  =  str_replace('min', '', $duracao);
    $total  =  $_GET['total'];                         			 
    $sala  =  $_GET['sala']; 
	$dia = $_GET['dia'];
	$mes = $_GET['mes'];
	$ano = $_GET['ano'];
	$data  =  $_GET['dia']."/".$_GET['mes']."/".$_GET['ano'];  
	$perfil = $_SESSION['perfil'];
    $intervalo_ini = $_GET['intervaloi'];
	$intervalo_fim = $_GET['intervalof'];	
	  
	$data_atual  	=  mktime(00, 00, 00, date("m"), date("d"), date("Y"));  
	$data  			=  mktime(00, 00, 00, $mes, $dia, $ano);
	$data_60 		=  mktime(00, 00, 00, date("m"), date("d") + 60, date("Y")); 
	$date_format 	=  date("d/m/Y", $data); 

	//var_dump($data_atual); //Correta
	//var_dump($data); //Correta
	//var_dump($data_60); //Correta
	//var_dump($data < $data_60);

	//$dias  = (int)floor( / (60 * 60 * 24)); 

	
	if($data < $data_atual) {	//n�o deixa criar pautas antes da data atual 
    	echo"<script language='javascript' type='text/javascript'>alert('Erro na inser\u00e7\u00e3o! A pauta n\u00e3o pode ser criada antes do dia atual!');window.location.href='principal.php';</script>";
	} else if(empty($entidade)) {	//verifica se o campo de entidade est� em branco

		echo"<script language='javascript' type='text/javascript'>alert('Erro na inser\u00e7\u00e3o! O Campo Entidade ".utf8_encode('est\u00e1') ."vazio');window.location.href='principal.php';</script>";

	} else if($total>23){
		echo"<script language='javascript' type='text/javascript'>alert('Erro na inser\u00e7\u00e3o! O total de audi\u00eancias n\u00e3o pode ser maior que 23');window.location.href='principal.php';</script>";
	} else if($total<=0){
		echo"<script language='javascript' type='text/javascript'>alert('Erro na inser\u00e7\u00e3o! O total de audi\u00eancias precisa ser no m\u00ednimo 1');window.location.href='principal.php';</script>";
	} else if($data < $data_60 && $perfil <> 'CEJUC') {

			echo"<script language='javascript' type='text/javascript'>alert('Erro na inser\u00e7\u00e3o! A pauta precisa ser criada com pelo menos 60 dias de anteced\u00eancia!');window.location.href='principal.php';</script>";				
	
	} else {
		
		//query que insere os dados da pauta no banco de dados
		$query  =  "INSERT into setorial.Controle (Entidade, Assunto, Conciliador, Data, Total, Total_disponivel, Hora_inicio, Sala, Sigla_localidade,duracao, Intervalo_inicial, Intervalo_fim) 
					VALUES ('$entidade', '$assunto','$conciliador', to_date('$date_format','dd/mm/yyyy'), '$total', '$total', '$horario', '$sala','$sigla_local','$duracao', '$intervalo_ini', '$intervalo_fim')";
		

		$insere  =  ociparse($conexao, $query);

		

		ociexecute($insere);
		ocicommit($conexao);
		
		
		
		//vai para a pagina principal.php indicando que a pauta foi cadastrada com sucesso, caso n�o seja possivel cadastrar por qualquer outro motivo � mostrado uma janela de erro
			if ($insere) { 
				header("Location:principal.php?pauta=1");
			}
				else{     
					echo"<script language='javascript' type='text/javascript'>alert('Erro na inser&ccedil;&atilde;o!');window.location.href='inserir.php';</script>";
				}
    }   
?>