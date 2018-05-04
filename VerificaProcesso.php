<header> 
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</header>
    <style> 
#table-wrapper {
  position:relative;
}
#box{
  width: 100%;
}
#table-scroll {
  width:987px;
  height:270px;
  overflow:auto;
}

.table-hrs {

    border-bottom: 1px solid #808080;
    font-size: 105%;
    padding: 7px;
    width: 872px;
    border: 1px solid #808080;
    background-color: #9e3f40;
    color: white;
    vertical-align: middle;
    
}

#table-wrapper table {
  width:987px;
  height: 270px

}
#table-wrapper table * {
  background:white;
}
#table-wrapper table thead th .text {
  position:absolute;   
  top:-20px;
  left:-20px;
  z-index:2;
  height:20px;
  width:35%;
  border:1px solid blue;
}
#table-wrapper table thead th .text {
  position:absolute;   
  top:0px;
  left:0px;
  z-index:2;
  height:20px;
  width:100%;
  border:1px black;
}
.table2 {
  width: 986px;
   position:relative;
}

.red {
    color: #ff0800;
}
.td-partes {
	text-align: left;
	font-size: 14px;
	overflow: auto;
	height: 40px;
}

</style>

	<?php
	header("Content-Type: text/html; charset=ISO-8859-1", true);
	include "conecta.inc";

	$conexao2         = $_SESSION['conexao'];
	$conexao_judicial2 = $_SESSION['conexao_judicial'];
	$codigo_local     = $_SESSION['codigo_local'];
	$sigla_local      = $_SESSION['lotacao'];
	$id               = $_GET["id"];
	$horario          = $_GET['horario'];
	$total            = $_GET['total'];
	$lotacao          = $_SESSION['lotacao'];
	$localidade       = $_SESSION["localidade"];
	$vara_user        = $_SESSION['vara_user'];
	$total_disponivel = $_GET['total_disponivel'];
	$entidade         = $_GET['entidade'];
	$data_aud         = $_GET['data_aud'];
	$sala             = $_GET['sala'];
	$perfil           = $_SESSION['perfil'];
	$codigo_local     = $_SESSION['codigo_local'];
	$verifica         = 0;
	$duracao          = $_GET['duracao'];
	$intervalo_ini    = $_GET['intervalo_ini'];
	$intervalo_fim    = $_GET['intervalo_fim'];


	//var_dump($intervalo_fim);
	//var_dump($codigo_local);

	$query2    = "SELECT Horario from setorial.Audiencias WHERE ID=$id and estado='ATIVO' ORDER BY Horario ASC";
	$resultado = ociparse($conexao2, $query2);
	$teste     = ociexecute($resultado);
	$nrows     = oci_fetch_all($resultado, $CampoResult);


	/*$query3    = "SELECT duracao from setorial.Controle WHERE ID=$id";
	$resultado = ociparse($conexao2, $query3);
	ociexecute($resultado);
	$duracao = oci_fetch_array($resultado);*/
	include_once 'trf1_Biblioteca.php';

	// $codigo_local = $_GET["local"];
	// $sigla_local = $_GET["sigla"];

	$processo = $_GET['processo'];
	$processo = str_replace('.', '', $processo);
	$processo = str_replace('-', '', $processo);
	$processo = str_replace(' ', '', $processo);

	if ($codigo_local == 1000) {
		$codigo_local = 100;
	}



	$erro  = 0;
	$achei = 0;
	$orgao = $sigla_local;

	// conecta

	$TNS = Conexao($orgao, 1);

	if (($orgao == "DF") || ($orgao == "JFDF")) {
		$uStENT  = Conexao($TNS, 2);
		$conexao = @ocilogon(Conexao($TNS, 2), Conexao($TNS, 3), $TNS, 'WE8ISO8859P1');
	} else {
		$uStENT  = Conexao($TNS, 2);
		$conexao = @ocilogon(Conexao($TNS, 2), Conexao($TNS, 3), $TNS, 'WE8ISO8859P1');
	}

	if ($conexao == false) 
	{
		$conexao = @ocilogon(Conexao($TNS, 2), Conexao($TNS, 3), $TNS, 'WE8ISO8859P1');
		$uStENT  = Conexao($TNS, 2);
		if ($conexao == false) 
		{
			$conexao = @ocilogon(Conexao($TNS, 10), Conexao($TNS, 11), $TNS, 'WE8ISO8859P1');
			$uStENT  = Conexao($TNS, 8);
			if ($conexao == false) 
			{
				$conexao = @ocilogon(Conexao($TNS, 8), Conexao($TNS, 9), $TNS, 'WE8ISO8859P1');
				$uStENT  = Conexao($TNS, 2);
				if ($conexao == false) 
				{
					$conexao = @ocilogon(Conexao($TNS, 4), Conexao($TNS, 5), $TNS, 'WE8ISO8859P1');
					$uStENT  = Conexao($TNS, 10);
					if ($conexao == false) 
					{
						$oerr = OCIError();
						if ($oerr) 
						{
							if ($oerr["code"] == "1017")
								$ErrMsg = "";
							else
								$ErrMsg = "Error " . $oerr["message"] . "[5675]";
						}
						
						$txtmsg2 = "<center>
										<font size=2 color=red>\n
											<strong>
												Servi&ccedil;o indispon&iacute;vel no momento ![82]</strong></font><font size=2>\n
												<br/>
												O erro foi encaminhado ao setor respons&aacute;vel para verifica&ccedil&atilde;o..
												<br/>\n
												Espere alguns instantes e fa&ccedil;a uma nova tentativa.<br />\n
											<!-- $ErrMsg -->\n
									</font>
									</center>\n";
						$MSgMai  = $oerr["message"] . "\\n\n Usu&aacute;rio: " . $uStENT . " \n\n secao[ " . $TNS . "]\n\n[" . $ErrMsg . "] \n\n";
						
						// @mail("tr224ps@trf1.jus.br","Erro EmissÃ¯Â¿Â½o CertidÃ¯Â¿Â½o[83] $TNS ",$MSgMai);
						
						ImprimeBarraInfoAtencao($txtmsg2);
						exit;
					}
				}
			}
		}
	}

	$proc                    = $processo;
	$SecaoCodigo             = $codigo_local;
	$query_verifica_processo = 

	"SELECT 
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
		ORDER BY OCJ_FSPR.FSPR_IC_SITUACAO_FASE ASC,OCJ_FSPR.FSPR_DH_FASE";
	$resultado_verifica = ociparse($conexao_judicial2, $query_verifica_processo);

	ociexecute($resultado_verifica);
	//$debugger=oci_fetch_array($resultado_verifica);
	//var_dump($debugger);echo"----";
	$VerificaDocumentoSecao = ocifetchstatement($resultado_verifica, $CampoResultado);

	if ($VerificaDocumentoSecao == 0) {
		$erro = 4;
	} else {
		for ($r = 0; $r < sizeof($CampoResultado["SECAO_PR"]); $r++) {
			if ($CampoResultado['IC_FASE'][$r] == 0) {
				if ($CampoResultado['SECAO_PR'][$r] == $codigo_local) {
					$achei                = 1;
					$processo_numero_novo = $CampoResultado['NUMERONOVO'][$r];
				}
			}
		}
		
		if ($achei == 0) 
		{
			$erro = 5;
		}
	}

	if ($erro == 4) {
		echo "<script language='javascript' type='text/javascript'>alert('Processo" . utf8_encode("n&atilde;o") . " existe!');window.location.href='principal.php';</script>";
		echo "<center>Processo ".utf8_decode("n&atilde;o")." existe</center>";
		exit;
	} else if ($erro == 5) {
		echo "<script language='javascript' type='text/javascript'>alert('Processo pertecente a outra " . utf8_decode("$localidade") . " ');window.location.href='principal.php';</script>";
		echo "<center>Processo pertecente a outra localidade</center>";
		exit;
	} else {
		
		// exit;
		// exemplos
		// $proc = '575121420074013400';
		// $SecaoCodigo = '3400';
		
		echo "<form method=\"POST\" action=\"inserir.php?id=$id&total=$total&horarios=$horario&lotacao=$lotacao&total_disponivel=$total_disponivel&entidade=$entidade&data=$data_aud&sala=$sala&processo=$proc\">";

		$xml = retornaDados($conexao, $proc, $SecaoCodigo);
		if ($xml) {
			$RetornoXML = getResult($xml);
			        
?>
			<br/>
			<center>
<?php
        $query     = "SELECT var_ds_vara from p_vara where var_sesu_cd_secsubsec = '$codigo_local'";
        $resultado = ociparse($conexao, $query);
        ociexecute($resultado);
                
                    echo "<table border=\"1\" align=\"center\" style=\"background-color: #285994; color: white;\">";
                            echo "<tr>
                                    <th align=\"center\" width=\"100%\">
                                        <font size=\"3px\"> 
                                            Assunto: " . ($RetornoXML[1]->dados_proc->assunto_principal->assunto->ds_assunto) . "
                                    </th>";
                            echo "</tr>";
                    echo "</table>";
                    
                    echo "<table border=\"1\" align=\"center\" style=\"background-color: #285994; color: white;\">";
                        echo "<tr>";
                            echo "<th align=\"center\" width=\"50%\"> <font size=\"3px\"> Processo: $processo </font> </th>";
                                if($codigo_local == 100 || $codigo_local == 1000){
                                  echo "<th align=\"center\" width=\"50%\"> <font size=\"3px\"> Vara/Turma:&nbsp;" .($RetornoXML[1]->dados_proc->org_julgador). "</font> </th>";
                                }else{
                                  echo "<th align=\"center\" width=\"50%\"> <font size=\"3px\"> Vara: ".($RetornoXML[1]->dados_proc->ds_vara)."  </font> </th>";
                                }
                            echo "</th>";
                        /*echo "<tr>";
                            echo "<th align=\"center\" width=\"50%\"> <font size=\"3px\"> Autor </font> </th>";
                            echo "<th align=\"center\" width=\"50%\"> <font size=\"3px\"> R&eacute;u </font> </th>";
                        echo "</tr>";*/
                    echo "</table>";

        echo "<div id=\"box\">";
            echo "<div id=\"table-scroll\">";  
           
                echo "<table class=\"\" border=\"1\" align=\"left\" style=\"margin:0 auto; width:50%\" cellspacing=\"0\">";
                    echo "<tr>";    
                        $count_autor = 0;
                        foreach ($RetornoXML[1]->partes->parte as $partes):
						  		
                          $encoding = 'UTF-8';
                          $partes->tipo = mb_convert_case($partes->tipo, MB_CASE_UPPER, $encoding);
                         
                            /*if ($partes->tipo != "REQUISITANTE" && $partes->tipo != "REMETENTE" && "PROCURADOR" && $partes->tipo != "ADVOGADO" && $partes->tipo != "AGRAVADO" 	
                            	&& $partes->tipo != "REQUERIDO" && $partes->tipo != "APELADO" && $partes->tipo != "RECORRIDO" && $partes->tipo != "IMPETRADO" 
                            	&& $partes->tipo != "EMBARGADO" && $partes->tipo != "INTERPELADO" && $partes->tipo != "OPOENTE" && $partes->tipo != "RU" && $partes->tipo != "REU"  
                            	&& $partes->tipo != "RECDO") {*/
							if ($partes->tipo == "AGRAVANTE" || $partes->tipo == "REQUERENTE" || $partes->tipo == "APELANTE" || $partes->tipo == "RECORRENTE" || $partes->tipo == "IMPETRANTE" || 
								$partes->tipo == "EMBARGANTE" || $partes->tipo == "INTERPELANTE" || $partes->tipo == "ASSISTENTE" || $partes->tipo == "AUTOR" || $partes->tipo == "RECTE" || 
								$partes->tipo == "PARTE AUTORA" || $partes->tipo == "OPOENTE" || $partes->tipo == "AMBARGANTE" || $partes->tipo == "AUTOR" ||
								$partes->tipo == "IMPUGNANTE" || $partes->tipo == "LITISCONSORTE ATIVO" || $partes->tipo == "QUERELANTE" ||  $partes->tipo == "RECONVITE" || $partes->tipo == "ASSISTENTE ATIVO" || 
								$partes->tipo == "EXEQUENTE" || $partes->tipo == "DENUNCIANTE A LIDE" || $partes->tipo == "SUSCINTANTE") {
                   
                                echo "<td class=\"td-partes\"> " . $partes->tipo . " </td>";
                                if($count_autor < 1){
                                    echo "<td class=\"td-partes\"> " . $partes->nome . " </td>"; 
                                } else {

                                	if($partes->caract != " ") {
                                		echo "<td class=\"td-partes\"> " . $partes->caract . " </td>";
                                		break;	
                                	} else {
                                		echo "<td class=\"td-partes\"> OUTROS(AS) </td>"; 
	                                    break;
                                	}
                              
                                }
                  
                    echo "</tr>";
              
                            }

                        $count_autor ++; 
                        endforeach;  
                                  
                echo "<table class=\"\" border=\"1\" align=\"left\" style=\"margin:0 auto; width:50%\" cellpadding=\"0\">";
                    echo "<tr>";   
                        $count_reu = 0;
                        foreach ($RetornoXML[1]->partes->parte as $partes):
						  
                          $encoding = 'UTF-8';
                          $partes->tipo = mb_convert_case($partes->tipo, MB_CASE_UPPER, $encoding);
                       
                          
                          	if ($partes->tipo == "AGRAVADO" || $partes->tipo == "REQUERIDO" || $partes->tipo == "APELADO" || $partes->tipo == "RECORRIDO" || $partes->tipo == "IMPETRADO" || 
                          		$partes->tipo == "EMBARGADO" || $partes->tipo == "INTERPELADO" || $partes->tipo == "OPOENTE" || $partes->tipo == "RU" || $partes->tipo == "REU"  || 
                          		$partes->tipo == "RECDO" || $partes->tipo == "PARTE RE" || $partes->tipo == "INDICIADO" || $partes->tipo == "LITISCONSORTE PASSIVO" || 
                          		$partes->tipo == "EMBARGADO" || $partes->tipo == "IMPUGNADO" || $partes->tipo == "INVESTIGADO" || $partes->tipo == "QUERELADO" || 
                          		$partes->tipo == "EXECUTADO" || $partes->tipo == "SUSCITADO") {  

                                if($partes->tipo == "RU" || $partes->tipo == "REU") {
                                    echo "<td class=\"td-partes\"> R&Eacute;U </td>";
                                } else {
                                    echo "<td class=\"td-partes\"> " . $partes->tipo ." </td>"; 
                                }

                                if($count_reu < 1){
                                    $count_reu ++;
                                    echo "<td class=\"td-partes\"> " . $partes->nome . " </td>"; 
                                } else {

                                    if($partes->caract != " ") {
                                		echo "<td class=\"td-partes\"> " . $partes->caract . " </td>";
                                		break;	
                                	} else {
                                		echo "<td class=\"td-partes\"> OUTROS(AS) </td>"; 
	                                    break;
                                	}
                                }
                                                                
                        
                    echo "</tr>";
              
                            }
                       
                        endforeach;

                    
        echo "</div>";
                    
                echo "</table>";
                echo "</table>";
    ?>
                </div> 
            </div>
        </center> 

<!--começo da função de intervalo -->
  <?php

            //echo "<table class=\"table2\" border=\"1\" align=\"center\" style=\"background-color: #285994; color: white;  margin: 0 auto;\">";
        echo "<table class=\"table2\" border=\"1\" width=\"987px\" align=\"center\" style=\"background-color: #285994; color: white; margin: 0 auto;\">";
        echo "<tr >";
        echo "<center>";

        if($perfil == "CEJUC") {
            echo "<th width=\"100%\"><font size=\"3px\">Hor&aacuterios Dispon&iacute;veis:&nbsp;</font>";
        } else {
            echo "<th width=\"100%\"><font size=\"3px\">Hor&aacuterio&nbsp;</font>";
        }
        
        
        if ($duracao == 20) {
            $lista_horarios = array();
            $lista_horarios[0] = "07:20"; $lista_horarios[1] = "07:40"; $lista_horarios[2] = "08:00"; $lista_horarios[3] = "08:20"; $lista_horarios[4] = "08:40";
            $lista_horarios[5] = "09:00"; $lista_horarios[6] = "09:20"; $lista_horarios[7] = "09:40"; $lista_horarios[8] = "10:00"; $lista_horarios[9] = "10:20";
            $lista_horarios[10] = "10:40"; $lista_horarios[11] = "11:00"; $lista_horarios[12] = "11:20"; $lista_horarios[13] = "11:40"; $lista_horarios[14] = "12:00";
            $lista_horarios[15] = "12:20"; $lista_horarios[16] = "12:40"; $lista_horarios[17] = "13:00"; $lista_horarios[18] = "13:20"; $lista_horarios[19] = "13:40";
            $lista_horarios[20] = "14:00"; $lista_horarios[21] = "14:20"; $lista_horarios[22] = "14:40"; $lista_horarios[23] = "15:00"; $lista_horarios[24] = "15:20";
            $lista_horarios[25] = "15:40"; $lista_horarios[26] = "16:00"; $lista_horarios[27] = "16:20"; $lista_horarios[28] = "16:40"; $lista_horarios[29] = "17:00";
            $lista_horarios[30] = "17:20"; $lista_horarios[31] = "17:40"; $lista_horarios[32] = "18:00"; $lista_horarios[33] = "18:20"; $lista_horarios[34] = "18:40";
          
        } else if ($duracao == 30) {
            $lista_horarios = array();
            $lista_horarios[0]  = "07:30"; $lista_horarios[1]  = "08:00"; $lista_horarios[2]  = "08:30"; $lista_horarios[3]  = "09:00"; $lista_horarios[4]  = "09:30";
            $lista_horarios[5]  = "10:00"; $lista_horarios[6]  = "10:30"; $lista_horarios[7]  = "11:00"; $lista_horarios[8]  = "11:30"; $lista_horarios[9]  = "12:00";
            $lista_horarios[10] = "12:30"; $lista_horarios[11] = "13:00"; $lista_horarios[12] = "13:30"; $lista_horarios[13] = "14:00"; $lista_horarios[14] = "14:30";
            $lista_horarios[15] = "15:00"; $lista_horarios[16] = "15:30"; $lista_horarios[17] = "16:00"; $lista_horarios[18] = "16:30"; $lista_horarios[19] = "17:00";
            $lista_horarios[20] = "17:30"; $lista_horarios[21] = "18:00"; $lista_horarios[22] = "18:30";
            
        } else if ($duracao == 40) {
            $lista_horarios = array();
            $lista_horarios[0]  = "07:40"; $lista_horarios[1]  = "08:20"; $lista_horarios[2]  = "09:00"; $lista_horarios[3]  = "09:40"; $lista_horarios[4]  = "10:20";
            $lista_horarios[5]  = "11:00"; $lista_horarios[6]  = "11:40"; $lista_horarios[7]  = "12:20"; $lista_horarios[8]  = "13:00"; $lista_horarios[9]  = "13:40";
            $lista_horarios[10] = "14:20"; $lista_horarios[11] = "15:00"; $lista_horarios[12] = "15:40"; $lista_horarios[13] = "16:20"; $lista_horarios[14] = "17:00";
            $lista_horarios[15] = "17:40"; $lista_horarios[16] = "18:20";
        }
            /*Função para horário, serve para alguma coisa do tipo horário*/
            //$_SESSION['lista_horarios'] = $lista_horarios;

            $counter      = 0;
            $i            = 0;
            $z            = 0;
            $x            = 0;
            $achei        = 0;
            $n_found      = 0;
            $valor_inicio = 0;
            $contador     = 0;
            $limite       = 0;


            $index        = 0;
            $posArray     = array();
            $reach_ini    = array_search($intervalo_ini, $lista_horarios); //$reach_ini indica a posiçao do horario do inicio do intervalo
            $reach_fim    = array_search($intervalo_fim, $lista_horarios); //$reach_fim indica a posiçao do horario do fim do intervalo
        
            //gambiarra
            if($reach_ini!==false && $reach_fim!==false){//os dois horários precisam ser válidos
                $tam_aux=($reach_fim-$reach_ini);
                $ini=$reach_ini;
                $vet_aux=array();
                $cont_aux=0;
                $p=0;

                for($cont_aux;$cont_aux<$tam_aux;$cont_aux++){
                    $vet_aux[$cont_aux] = $ini++;
                }
            }
            else{
                $vet_aux=array();
                $vet_aux[0]=-1;
                $p=0;           
            }
            //gambiarra
            for($i; $i < count($lista_horarios); $i = $i + 1) {     //Percorre o vetor de horarios
                if($lista_horarios[$i] == $horario) {               //Se a posiçao da lista de horários ($i) == $horario de inicio da pauta
                    $valor_inicio = $i;                             //$valor inicio recebe $i
                }
            } 
            /*
            $nrows armazena um vetor com os horarios das audiencias cadastradas nessa pauta, retorna um int com a quatidade de linhas encontradas
            $CampoResult recebe um vetor com os horarios das audiencias cadastradas nessa pauta
            */
            for($contador; $contador <= ($nrows -1); $contador = $contador + 1) {
                $horarios_marcados[$n_found] = $CampoResult['HORARIO'][$contador]; 
                $n_found = $n_found + 1;

            }

            for($index; $index <= sizeof($horarios_marcados); $index = $index + 1){
                $posMarcadas        = array_search($horarios_marcados[$index], $lista_horarios);
                $posArray[$index]   = $posMarcadas;
            }

            if($perfil == "CEJUC") {

                echo "<select required name=\"horarios\">";                     // Inicio do select
            //if($perfil != "Usuario") {
                $index      = 0;
                $i          = $valor_inicio;        //$i recebe o a posiçao do horario de inicio da audiencia, i$ começa a percorrer o vetor a partir dai
                $limite     = $i + $total - 1;      //representa a posiçao maxima ate onde i deve percorrer
                for($i; $i <= $limite; $i = $i + 1) {       //Percorre da posiçao do horario de inicio ate a posiçao limite

                    if($i == $posArray[$index]){
                        $indisponivel = true;
                        $index ++;                          
                    } else {
                        $indisponivel = false;
                    }
           
                    if($i == $vet_aux[$p]) {                //Se lista a posiçao na lista de horario for = ao inico do intervalo
                        $intervalo = true; 
                        $x = $x + 1;
                        $p++;
                    } else {
                        $intervalo = false;
                        $z =  $z + 1; 
                    }

                    if($intervalo == true) {

                        $limite = $limite + 1;                  
                        echo "<option disabled>Intervalo</option>\n";

                    } else if($indisponivel == false  ) {                   //Se nao houver indisponibilidade
                    
                        echo "<option value=$lista_horarios[$i]>$lista_horarios[$i]</option>\n"; //Imprime os horarios disponiveis
                    }  
                }
              
            /*} else {

                if ($n_found == 0) {
                    echo "<option value=$lista_horarios[$valor_inicio]> $lista_horarios[$valor_inicio]</option>\n";
                } else {
                    $hora_certa = $valor_inicio + $n_found;
                    echo "<option value=$lista_horarios[$hora_certa]>$lista_horarios[$hora_certa]</option>\n";
                }        
                  
            }*/

                echo "</select>";  
                 
            } else {

                echo "<select required name=\"horarios\">";                     // Inicio do select

                $index      = 0;
                $i          = $valor_inicio;        //$i recebe o a posiçao do horario de inicio da audiencia, i$ começa a percorrer o vetor a partir dai
                $limite     = $i + $total - 1;      //representa a posiçao maxima ate onde i deve percorrer
                for($i; $i <= $limite; $i = $i + 1) {       //Percorre da posiçao do horario de inicio ate a posiçao limite

                    if($lista_horarios[$i] == $horarios_marcados[$z]){       //Se a posiçao na $i for igual a posiçao de um horario indisponivel                 
                        $indisponivel = true;  
                    } else {
                        $indisponivel = false;
                    }
           
                    if($i == $vet_aux[$p]) {                //Se lista a posiçao na lista de horario for = ao inico do intervalo
                        $intervalo = true; 
                        $x = $x + 1;
                        $p++;
                    } else {
                        $intervalo = false;
                        $z =  $z + 1; 
                    }

                    if($intervalo == true) {

                        $limite = $limite + 1;                  
                        //echo "<option disabled>Intervalo</option>\n";
                        

                    } else if($indisponivel == false  ) {                   //Se nao houver indisponibilidade
                    
                        echo "<option value=$lista_horarios[$i]>$lista_horarios[$i]</option>\n"; //Imprime os horarios disponiveis
                        break;
                    }  
      

                }
       

                echo "</select>";
                
            }
           

        echo "</th>";
        echo "</tr>";
        echo "</center>";
        echo "</table>";    
    }
}


include "conecta.inc";

echo "<center>
<br><br>
        <input class=\"button2\" type=\"submit\" name=\"Cadastrar\" value=\"Incluir Pauta\" id=\"Cadastrar\">
      </center>";

function retornaDados($conn, $proc, $secao) {
    if (!$conn) {
        $msg              = 'Conex&atilde;o inv&aacute;lida';
        $this->messages[] = $msg;
        return false;
    }
    
    $sql  = "SELECT ocjp.pkg_consulta_processual_v2.getdadosprocessuais(:proc, :secao) AS XML FROM dual";
    $stmt = oci_parse($conn, $sql);
    if (!$stmt) {
        $msg              = Connection::mountErrorMsg(DBInteraction::PARSE, $conn);
        $this->messages[] = $msg;
        return false;
    }
    
    oci_bind_by_name($stmt, ":proc", $proc, -1, SQLT_CHR);
    oci_bind_by_name($stmt, ":secao", $secao, 4, SQLT_CHR);
    $result = oci_execute($stmt);
    if (!$result) {
        $msg = Connection::mountErrorMsg(DBInteraction::EXECUTE, $stmt);
        @oci_free_statement($stmt);
        $this->messages[] = $msg;
        return false;
    }
    
    $result = oci_fetch($stmt);
    if (!$result) {
        $msg = Connection::mountErrorMsg(DBInteraction::FETCH, $stmt);
        @oci_free_statement($stmt);
        $this->messages[] = $msg;
        return false;
    }
    
    $lob = oci_result($stmt, "XML");
    
    // $resultado = $lob->read($lob->size());
    
    $resultado = $lob->load();
    $lob->free();
    @oci_free_statement($stmt);
    
    // var_dump($resultado);
    // die;
    
    return ($resultado);
}

function isValid($xml) {
    libxml_use_internal_errors(true);
    $dom                      = new DOMDocument("1.0", "UTF-8");
    $dom->strictErrorChecking = false;
    $dom->validateOnParse     = false;
    $dom->recover             = true;
    $dom->loadXML($xml);
    
    // header('Content-type: text/xml');
    // echo $dom->saveXML();
    // exit;
    // $xml = simplexml_import_dom($dom);
    
    $_sXml = simplexml_import_dom($dom);
    
    // var_dump($this->_sXml);
    // exit;
    
    libxml_clear_errors();
    libxml_use_internal_errors(false);
    
    // $this->_sXml = simplexml_load_string($this->_xml);
    
    if (!$_sXml) {
        $messages[] = 'Erro ao consultar o processo [XML].';
        
        // mail("giuseppe.junior@trf1.jus.br","Consulta Processual [XML]",$this->_xml);//echo $query;
        
        return false;
    }
    
    if (isset($_sXml->erro)) {
        return false;
    }
    
    return $_sXml;
}

function getResult($xml) {
    $_xml = sanitizeXml($xml);
    
    // var_dump($_xml);
    // die;
    
    $_sxml = isValid($_xml);
    
    // var_dump($_sXml->processos->processo);
    // die;
    
    $retorno      = array();
    $j            = 0;
    $qtd_processo = count($_sxml->processos->processo);
    if (count($_sxml->processos->processo) > 1) {
        $retorno[1] = $_sxml->processos->processo[0];
    } else {
        $retorno[1] = $_sxml->processos->processo;
    }
    
    // $this->iniciaSessao();
    
    return $retorno;
}

function imprimirErros() {
    $msn = array_shift($this->messages);
    return $msn;
}

function sanitizeXml($xml) {
    
    // ESPACOS DUPLOS
    
    $xml = str_replace("   ", " ", $xml);
    $xml = str_replace("  ", " ", $xml);
    
    // $xml = str_replace(" ", " ", $xml); // FIXME
    //  $xml = str_replace("  ", " ", $xml);
    // return array();
    
    $xml = str_replace("&", 'E', $xml);
    $xml = str_replace("'", ' ', $xml);
    $xml = str_replace('"', ' ', $xml);
    
    // TAB
    
    $xml = str_replace("    ", "", $xml);
    $xml = str_replace("\r\n", "", $xml);
    $xml = str_replace("\n", "", $xml);
    $xml = str_replace("\t", "", $xml);
    
    // ASCII 18DC2(Device control 2)
    // $xml = str_replace(" ", "", $xml); // FIXME
    // $xml = str_replace(" ", "", $xml); // FIXME
    
    $xml = preg_replace('!^[^>]+>(\r\n|\n)!', '', $xml);
    
    // ----------------------------------------------------- cÃƒÂ³digo para tratar v2
    
    $xml = str_replace("<dados_padrao_proc_v2>", "", $xml);
    $xml = str_replace("</dados_padrao_proc_v2>", "", $xml);
    $xml = str_replace("<classe_padrao_v2>", "<classe>", $xml);
    $xml = str_replace("</classe_padrao_v2>", "</classe>", $xml);
    $xml = str_replace("<partes_padrao_v2>", "<parte>", $xml);
    $xml = str_replace("</partes_padrao_v2>", "</parte>", $xml);
    $xml = str_replace("<mv_padrao_v2>", "<mv>", $xml);
    $xml = str_replace("</mv_padrao_v2>", "</mv>", $xml);
    $xml = str_replace("_padrao_v2", "", $xml);
    $xml = str_replace("_v2", "", $xml);
    $xml = str_replace("_padrao_v2", "", $xml);
    
    // ----------------------------------------------------- cÃƒÂ³digo para tratar v2
    
    $xml = str_replace("<dados>", "", $xml);
    $xml = str_replace("</dados>", "", $xml);
    $xml = str_replace("<CD_OBJ>", "", $xml);
    $xml = str_replace("</CD_OBJ>", "", $xml);
    $xml = str_replace("<DS_OBJ>", "", $xml);
    $xml = str_replace("</DS_OBJ>", "", $xml);
    $xml = str_replace('"<?xml version="1.0"?>"', "", $xml);
    $xml = str_replace("Elt;", "<", $xml);
    $xml = str_replace("Egt;", ">", $xml);
    $xml = str_replace("<num_trf><![CDATA[", "<num_trf>", $xml);
    $xml = str_replace("]]></num_trf>", "</num_trf>", $xml);
    $xml = str_replace("<num_cnj><![CDATA[", "<num_cnj>", $xml);
    $xml = str_replace("]]></num_cnj>", "</num_cnj>", $xml);
    
    // $xml = str_replace("<![CDATA[", "", $xml);
    // $xml = str_replace("]]>", "", $xml);
    
    $format = '<?xml version="1.0" encoding="UTF-8"?><root>%s</root>';
    /*
     * $xml = str_replace('"<?xml version="1.0"?>"', '"<?xml version="1.0" encoding="UTF-8"?><processos>%s</processos>"', $xml);
     *
     * <dat_autuac>&lt;![CDATA[18/08/2005]]&gt;</dat_autuac>
     *
     *
     * $format = '<root>%s</root>';
     * /*$format = '<?xml version="1.0" encoding="UTF-8"?><root>%s</root>';
     */
    
    // $xml = preg_replace('/\&/', 'e', $xml);
    // $xml_parser = new Xml($xml, null);
    // $this->notify('retornoArray' , $xml_parser->Data);
    // return Xml::toArray(sprintf($format, $xml));
    // return self::xml_entities(sprintf($format, $xml));
    
    return sprintf($format, $xml);
}

?>
 </center>