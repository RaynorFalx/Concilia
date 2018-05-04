<?php
    //Atualizado 09/03/2017
	
    include "conecta.inc";
    $perfil=$_SESSION['perfil'];
	
    if ($perfil!='CEJUC') 
	{ 
		$vara = $_SESSION['vara_user']; 
    }
	
    $conexao            = $_SESSION['conexao'];
	  $conexao2            = $_SESSION['conexao_judicial'];
    $total              = $_GET['total'];
    $total_disponivel   = $_GET['total_disponivel'];
    $total_disponivel   = $total_disponivel-1;
    $dia                = date('d');
    $sala               = $_GET['sala'];
    $data_aud           = $_GET['data'];	
    $mes                = date('m');
    $ano                = date('Y');
    $id                 = $_GET['id'];
    $entidade           = $_GET['entidade'];
    $processo           = $_GET['processo'];
    $tipo_processo      = $_GET['tipo_processo'];
    $horario            = $_POST['horarios']; 	
    $codigo_localidade  = $_SESSION['codigo_local'];
    $lotacao            = $_SESSION['lotacao'];
    $parte              = $_POST['parte_escolhida'];
    $parte_passiva      = $_POST['parte_escolhida_passiva'];
  
    if($codigo_localidade==1000)//se a localidade for o DF 
	{
		$codigo_localidade=100;
    }
    if ($perfil=='CEJUC')
	{ 
		$vara=$perfil;
    }
	
    $lista_horarios = $_SESSION['lista_horarios'];
    $total=$total-1;
    $contador=0;
    $erro=0;
    $achei=0;

    $processo = str_replace('.', '', $processo);
    $processo = str_replace('-', '', $processo);
    $processo = str_replace(' ', '', $processo);
    $query1="SELECT processo from setorial.Audiencias WHERE ID=$id and PROCESSO='$processo' and estado='ATIVO'";
    $executa = oci_parse($conexao, $query1);
    ociexecute($executa);
    $linha =ocifetchstatement($executa,$CampoResult);

    if($linha>0)
	{
		$erro=7;
    }

    if ($perfil=='CEJUC') 
	{    
		$verificacao=ociparse($conexao, "SELECT ID, Entidade, Assunto, data, Total_disponivel, Sala from setorial.Controle WHERE Assunto=(Select Assunto from setorial.Controle WHERE ID=$id) AND Entidade='$entidade' AND TRUNC(SYSDATE) + 60 ORDER by Data ASC");
		ociexecute($verificacao);
		$N_rows = ocifetchstatement($verificacao,$CampoResult);
		if ($N_rows>0)
		{
			while ($contador<=$N_rows AND $contador>=0)
			{ 
				$linha=oci_fetch_array($verificacao); 
				if ($linha[0]==$id) 
				{ 
					$contador=-1;
				}
				if ($linha[0]!=$id AND $linha[4]>0) 
				{ 
					$erro=1; 
				}
				if ($linha[0]!=$id AND $linha[4]==0) 
				{ 
					$contador=$contador+1; 
				}   
			}
		}
	}
	$query_verifica="SELECT horario from setorial.Audiencias WHERE id=$id and estado='ATIVO'";
	$resultado=ociparse($conexao, $query_verifica);
	ociexecute($resultado);
	$contador=0;
	while($linha=oci_fetch_array($resultado))
	{
		if ($linha[$contador]==$horario) 
		{ 
			$erro=2; 
		}
		else
		{
			$contador=$contador+1;
		}
	}

  if($tipo_processo !== "pje") {
  	$query_verifica_processo ="SELECT 
  		OCJ_NUMP.NUMP_NR_PROC_TRF NUMEROANTIGO,
          TO_CHAR(OCJ_NUMP.NUMP_NR_PROC_RESOL_CNJ) NUMERONOVO,
          OCJ_FSPR.FSPR_ID PROCID,
          OCJ_NUMP.NUMP_ID NUMPID,
          FSPR_CD_SECSUBSEC SECAO_PR,
          OCJ_FSPR.FSPR_IC_SITUACAO_FASE IC_FASE
  		FROM 
  		OCJ_NUMP_NUMERACAO_PROCESSO OCJ_NUMP,
  		OCJ_FSPR_FASE_PROCESSO OCJ_FSPR 
  		WHERE 
  		OCJ_NUMP.NUMP_ID=OCJ_FSPR.FSPR_ID_NUMP AND
  		(
              (OCJ_NUMP.NUMP_NR_PROC_TRF='$processo') OR
              (OCJ_NUMP.NUMP_NR_PROC_RESOL_CNJ='$processo')
  		)
      ORDER BY OCJ_FSPR.FSPR_IC_SITUACAO_FASE ASC,OCJ_FSPR.FSPR_DH_FASE ";
    
	
    $resultado_verifica = ociparse($conexao2,$query_verifica_processo);
    ociexecute($resultado_verifica);
    $VerificaDocumentoSecao = ocifetchstatement($resultado_verifica,$CampoResultado);
    if ($VerificaDocumentoSecao == 0){
		  $erro=4;
    }else {
		  for ($r=0; $r<sizeof($CampoResultado["SECAO_PR"]);$r++)
		{
			if($CampoResultado['IC_FASE'][$r] == 0)
			{
				if($CampoResultado['SECAO_PR'][$r] == $codigo_localidade)
				{
				  $achei=1;
				  $processo_numero_novo=$CampoResultado['NUMERONOVO'][$r];
				}
			}
		}
		if($achei == 0){
      $erro =5 ;
    }
    }
  }
    if(empty($id))
	{
		$erro=6;
    } 
    if(empty($processo))
	{
		$erro=6;
    }
    /*if(empty($vara))
	{
        $erro=6;
    }*/

	if($erro==4 && $tipo_processo=="pje")
	{
		$erro=0;
	}
	$query="INSERT into setorial.Audiencias (ID, Vara, Processo, Horario,Resultado, estado,parte, parte_passiva) VALUES ('$id', '$vara', '$processo', '$horario','','ATIVO','$parte', '$parte_passiva')";
	$query2="UPDATE setorial.Controle SET Total_disponivel='$total_disponivel' WHERE id='$id'"; 
	$insere=ociparse($conexao, $query);
	$insere2=ociparse($conexao, $query2);
	if (($insere AND $insere2) AND $erro==0)
	{ 
		ociexecute($insere);
		ociexecute($insere2);
		ocicommit($conexao);   
		header("Location:principal.php?add=1");
	}else {
    ocirollback($conexao);
    if($erro==0){
		$erro=3;
    }
	}  
      if($erro==1)
  	{
  		echo"<script language='javascript' type='text/javascript'>alert('ERRO: Ainda existem pautas da entidade $linha[1] e assunto $linha[2] com vagas disponíveis. Utilize  a pauta do dia $linha[3] - $linha[5] - ID $linha[0]!! Caso por algum motivo a audiência realmente tenha que ser marcada nessa data solicite ao Diretor da CEJUC que faça a marcação.');window.location.href='principal.php';</script>";     
  	}
  	else if($erro==2)
  	{
  		echo"<script language='javascript' type='text/javascript'>alert('ERRO: O horário $lista_horarios[$horario] não está mais disponível. Alguêm deve ter marcado um pouco antes que você!');window.location.href='principal.php';</script>";  
  	}
  	else if($erro==3)
  	{
          echo"<script language='javascript' type='text/javascript'>alert('Erro na inserção!');window.location.href='principal.php';</script>";
  	}
  	else if($erro==4)
  	{
          echo"<script language='javascript' type='text/javascript'>alert('Processo não existe!');window.location.href='principal.php';</script>";//erro que ocorre no Mato Grosso
  		
  	}
  	else if($erro==5)
  	{
          echo"<script language='javascript' type='text/javascript'>alert('Processo pertencente a outra localidade!');window.location.href='principal.php';</script>";
  	}
  	else if($erro==6)
  	{
          echo"<script language='javascript' type='text/javascript'>alert('Existem campos em branco!');window.location.href='principal.php';</script>";
  	}
  	else if($erro==7)
  	{
          echo"<script language='javascript' type='text/javascript'>alert('Não é possível marcar nova audiência já designada neste mesmo dia!');window.location.href='principal.php';</script>";
    }
  //}

?>