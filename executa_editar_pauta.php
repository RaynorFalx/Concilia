<?php
	//variaveis que s\u00e3o recebidas atravez do metodo GET enviados pela funcao10.js e as que sao recebidas pela SESSION
    include "conecta.inc";
	
	$sigla_local =  $_SESSION["lotacao"];
    $id =  $_GET['id'];
	$data_atual     = mktime(00, 00, 00, date("m"), date("d"), date("Y"));                  				 
    $entidade  =  $_POST['entidade'];	
    $conexao  =  $_SESSION['conexao'];                				
    $assunto  =	 $_POST['assunto'];                    				                                                   			 
    $sala  =  $_POST['sala'];  
    $total = $_POST['total'];
    $conciliador = $_POST['conciliador'];
    $total_disponivel = $_POST['total_disponivel']; 
    $data  =  mktime(00, 00, 00, $_POST['mes'], $_POST['dia'], $_POST['ano']); 
    //$data = strtotime($data);	 
	$horario_inicial = $_POST['edita-hrs'];
	$data_60  =  date("d-m-Y",$soma60); 	             				 
	$soma60  =  strtotime("+60 days");               				 
    /*
	echo"<center>Dados da pauta<br>Entidade: $entidade<br>Assunto: $assunto<br>Data: $_GET[dia]-$_GET[mes]-$_GET[ano]<br>Total de audi\u00e3ªncias: $total<br>Hor\u00e3¡rio de in\u00e3­cio: $horario</center><br><br><br>";
    echo var_dump($data);
	exit();
	*/
	
	//$dias_atual = (int)floor($data_atual / (60 * 60 * 24));
	//$dias_pauta	= (int)floor($data / (60 * 60 * 24));

	if($data_atual > $data) {	
		 echo "<script language='javascript' type='text/javascript'>alert('Erro na inser\u00e7\u00e3o, pautas com a validade expirada n\u00e3o podem ser alteradas');window.location.href='principal.php';</script>";
	} else 
		
	/*if(strtotime($data) < strtotime($data_60)){	    //n\u00e3o deixa criar a pauta se ela n\u00e3o estiver com pelo menos 60 dias de anteced&ecirc;ncia
		//echo"<script language='javascript' type='text/javascript'>alert('Erro na inser\u00e7\u00e3o,a pauta precisa ser criada com pelo menos 60 dias de anteced&ecirc;ncia!');window.location.href='principal.php';</script>";	
			echo"<script language='javascript' type='text/javascript'>alert('Erro na inser\u00e7\u00e3o,a pauta precisa ser criada com pelo menos 60 dias de anteced&ecirc;ncia!');window.location.href='principal.php';</script>";	
	}else*/
		
	if(empty($data)){
		echo"<script language='javascript' type='text/javascript'>alert('Erro na inser\u00e7\u00e3o!O Campo Data est&aacute; vazio');window.location.href='principal.php';</script>"; 
	}else
		
	if(empty($_POST['ano'])){	
			echo"<script language='javascript' type='text/javascript'>alert('Erro na inser\u00e7\u00e3o! O Campo Ano est&aacute; vazio');window.location.href='principal.php';</script>";  
	}else
	
	if(empty($_POST['mes'])){	
		echo"<script language='javascript' type='text/javascript'>alert('Erro na inser\u00e7\u00e3o! O Campo m&ecirc;s est&aacute; vazio');window.location.href='principal.php';</script>";
	}else
		
	if(empty($_POST['dia'])){	
		echo"<script language='javascript' type='text/javascript'>alert('Erro na inser\u00e7\u00e3o! O Campo Dia est&aacute; vazio');window.location.href='principal.php';</script>";  
	}else{

	    $consulta_marcadas= "SELECT Codigo, Processo, Vara, Parte,Resultado 
							FROM setorial.Audiencias 
							WHERE ID='$id' and estado='ATIVO' ";

		$consulta_hrs ="SELECT Horario from setorial.Audiencias 
						WHERE id='$id' AND estado='ATIVO'";


		$ajusta_hrs=ociparse($conexao,$consulta_hrs);
	    $ajusta_marcadas=ociparse($conexao,$consulta_marcadas); 

	    ociexecute($ajusta_hrs);
   		ociexecute($ajusta_marcadas); 

   		$ct = 0;
	  	while ($linha_marcadas=oci_fetch_array($ajusta_marcadas)) {
	  
	  		$ct ++;

	  	}
   		

	    $total_disponivel = $total - $ct;


   		while ($linha_hrs = oci_fetch_array($ajusta_hrs)) {  

   			//echo $linha_hrs[0] . "<br>\n";
   		
   			if ($linha_hrs[0] != $horario_inicial) {
	
   				$erro = 2;
   			
			}

			break;
   		}

	    if ($total_disponivel < 0) {

			echo"<script language='javascript' type='text/javascript'>alert('Erro na Inser\u00e7\u00e3o, o total n\u00e3o deve ser inferior à quantidade de audi&ecirc;ncias marcadas');window.location.href='principal.php';</script>";

		} else if($total_disponivel > 23)	{

		?>

		<script language='javascript' type='text/javascript'>
			alert('Erro na Inser\u00e7\u00e3o, o total n\u00e3o deve ser maior que 23 audi&ecirc;ncias');window.location.href='principal.php';
		</script>";

		<?php
		} else {

			$query  =  "UPDATE setorial.Controle set Sala='$sala' ,Total='$total', Total_disponivel='$total_disponivel', Conciliador ='$conciliador' where id='$id'"; 

			$insere  =  ociparse($conexao, $query);
			ociexecute($insere);
			ocicommit($conexao);

			if ($insere) {
		?>
			<script language='javascript' type='text/javascript'>
				alert('Edi\u00e7\u00e3o realizada com sucesso');window.location.href='principal.php';
			</script>";
		<?php

			}
			else {     
				echo"<script language='javascript' type='text/javascript'>alert('Erro na inser\u00e7\u00e3o!');window.location.href='inserir.php';</script>";
			}
		}
    }   
?>