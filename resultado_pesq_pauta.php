<html>  
	<head>
		<meta charset="ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="description" content="sistema e-SiAC">
		<meta name="author" content="TRF1">
		<link rel="shortcut icon" href="icone-siac.png" type="image/x-icon" />
		<title>Sistema de Agendamento de Audi&ecirc;ncia de Conciliç&atilde;o</title>

		<link rel="stylesheet" href="css/reset.css">    
		<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
		<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/print.css">
		<link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
		<link href="./css/bootstrap2.css" rel="stylesheet" type="text/css"/>

		<script src="jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>  
        <script src="css/bootstrap.min.js"></script>
		
		<style> <!-- In&iacute;cio da exportaç&atilde;o para folha de estilo externa -->

			header {
			 
			  position: fixed;
			  float: right;
			  width: 100%;
			  top: 0px;
			  background: #ECECEC;
			  z-index: 2;
			}
			body{
				width: 100%;
				height: 100%;
				
			}

			@media screen and (min-width: 768px) {
					.modal-dialog {
					  width: 1100px;
					  position: absolute;
					  left: 40%;
					}
			}
			@media print {    
				.no-print { 
					display: none; 
				}

				.print {
					display: block;
				}
			}
			.hidden {
				visibility: hidden;
			}

			.relative2 {
			  position: relative;
			  top: 20px;
			  left: 20px;
			  background-color: white;
			  width: 500px;
			}

			#footer {
				position : absolute;
				bottom : 0;
				width: 60%;
				height : 20px;
				margin-top : 40px;
			  }
			.button {
				cursor: pointer;
				background-color: #285994; /* Cor antiga 152f4e */
				border: none;
				color: white;
				padding: 16px 32px;
				text-align: center;
				text-decoration: none;    
				display: inline-block;
				border-radius: 9px;
				width: 300px;
				height: 50px;
				font-size: 16px;
				box-shadow: 1px 1px 2px #000;
			}

			.closebtn {
			cursor: pointer;
				background-color: #285994; 
				border: none;
				color: white;
				padding: 10px;
				text-align: center;
				text-decoration: none;    
				display: inline-block;
				border-radius: 8px;
				font-size: 14px;
				top: 20px;
				left: 1534px;

							
			}

			.button2 {
				cursor: pointer;
				background-color: #285994; 
				border: none;
				color: white;
				padding: 10px;
				text-align: center;
				text-decoration: none;    
				display: inline-block;
				border-radius: 8px;
				font-size: 14px;
				margin:auto;
			}
			.button3{
				cursor: pointer;
				font-size:13px;
				color: white;
				background-color: #1a1a1a;
				padding:5px;
				border-radius: 9px;
			}
			.center {
				margin: auto;
				width: 60%;
				padding: 10px;
			}
			.td-ajuste {
				align: center;
				border: none;
				text-align:center; 
				}
			table-exit {
				border: none;    
				width: 90%;
				align: center;
				vertical-align:middle;
				text-align:left; 
				margin: 0 auto; 
				display: block;
			}

			td-exit {
				border: none;
				padding:7px;
				vertical-align:middle;
			}

			table {
				border: 1px solid #808080;    
				width: 90%;
				align: center;
				vertical-align:middle;

			}
			th {
				border-bottom: 1px solid #808080;
				font-size: 105%;
				padding: 7px;
				border: 1px solid #808080;
				background-color: #285994;
				color: white; 
				vertical-align:middle;
			}

			td {
				border: 1px solid #808080;
				padding:7px;
				vertical-align:middle;
			}
			tr:nth-child(even){background-color: white}
			tr:hover{
				background-color:#cccccc;
			}
			.FAQ { 
				vertical-align: top;     
				height:auto !important; 
			}

			.list {
				display:none; 
				height:auto;
				horizontal-align: center;
				margin:0;
				float: center;
			}  
			.show {
				display: none; 
			}
			.hide:target + .show {
				display: inline;     
			}
			.hide:target {
				display: none; 
			}
			.hide:target ~ .list {
				display:inline; 
			}

			/*style the (+) and (-) */
			.hide, .show {
				padding:14px;
				width: 80px;
				height: 80px;
				border-radius: 130px;
				font-size: 100%;
				color: #fff;
				text-shadow: 0 1px 0 #666;
				text-align: center;
				text-decoration: none;
				box-shadow: 1px 1px 2px #000;
				background: #152f4e;
				opacity: .95;
				margin-right: 0;
				float: center;
				margin-bottom: 25px;
			}
			.hide:hover, .show:hover {
				color: #eee;
				text-shadow: 0 0 1px #666;
				text-decoration: none;
				box-shadow: 0 0 4px #222 inset;
				opacity: 1;
				margin-bottom: 125px;
			}
  
		</style> <!-- Fim da exportaç&atilde;o para folha de estilo externa -->
	</head>
<body>
<?php
include "conecta.inc";
//$localidade = $_SESSION['descDomUserLogon'];
$localidade = $_SESSION['localidade'];
$login_session = $_SESSION['login'];
$codigo_local  = $_SESSION['codigo_local'];
$data_login    = $_SESSION['data_login'];
$lotacao       = $_SESSION['lotacao'];
$vara          = $_SESSION['vara_user'];
$conexao       = $_SESSION['conexao'];
$perfil        = $_SESSION['perfil'];
$sigla         = $_SESSION['lotacao'];
$dia           = $_SESSION['dia'];
$mes           = $_SESSION['mes'];
$ano           = $_SESSION['ano'];
?>

<br><br><br>
<div class="pen-title">

         <br><br>
    <img src="icone-siac.png" alt="Logo do TRF 1ª Região">
    <span>
        <br>
        <h1> Sistema de Agendamento de Audi&ecirc;ncias de Concilia&ccedil;&atilde;o  </h1>


        <?php
           echo urldecode($localidade);
        ?>
   </span>
</div>


<center>
<br><br><br><br>
  <h2><b>Lista de Pautas</b></h2>
  <br><br>
  <font size="3"> 
  <table style="text-align:center; margin: 0 auto">          
  <thead>
    <tr>
 <th>Entidade</th>
                <th>Assunto</th>
                <th>Data</th>
                <th>Hor&aacute;rio de In&iacute;cio</th>
                <th>Sala</th>
                <th>Total Dispon&iacute;vel</th>
                <th> </th>
                <th> </th>

				</tr>
				<?
  $_SESSION['lotacao'] = $lotacao;
        $_SESSION['perfil']  = $perfil;
        $_SESSION['login']   = $login_session;
        $query_nls_comp      = "alter session set nls_comp=linguistic";
        $query_nls_sort      = "alter session set nls_sort=binary_ai";
        $resultado           = oci_parse($conexao, $query_nls_comp);
        $resultado           = oci_parse($conexao, $query_nls_sort);
        ociexecute($resultado);

        $dia1 = $_POST['dia1'];
        $mes1 = $_POST['mes1'];
        $ano1 = $_POST['ano1'];
        
        $dia2 = $_POST['dia2'];
        $mes2 = $_POST['mes2'];
        $ano2 = $_POST['ano2'];
     
        if (empty($tipo_busca)) {

                $query = "  SELECT  ID, ENTIDADE, ASSUNTO, CONCILIADOR, DATA, TOTAL, TOTAL_DISPONIVEL, HORA_INICIO, SALA, DURACAO, 
                                    INTERVALO_INICIAL, INTERVALO_FIM  
                            FROM    setorial.Controle 
                            WHERE   SIGLA_LOCALIDADE = '$sigla' 
                            ORDER by DATA ASC";
        } //MOSTRA AS PAUTAS   ANTIGA LINHA:    where SIGLA_LOCALIDADE = '$sigla' and data >= TRUNC(SYSDATE) ORDER by Data ASC"; } 
        
        if (!empty($tipo_busca)) {
                if ($tipo_busca == 'tipo_1') {
                        $query ="   SELECT ID, Entidade, Assunto,CONCILIADOR, DATA, Total, Total_disponivel, Hora_inicio, Sala 
                                    FROM setorial.Controle 
                                    FROM SIGLA_LOCALIDADE = '$sigla' and data >= TRUNC(SYSDATE) + 60";
                }
                
                if ($tipo_busca == 'tipo_2') {
                        
                        $query = "  SELECT ID, Entidade, Assunto,CONCILIADOR, data, Total, Total_disponivel, Hora_inicio, Sala 
                                    FROM setorial.Controle 
                                    WHERE SIGLA_LOCALIDADE = '$sigla' 
                                    AND data between to_date('$dia1/$mes1/$ano1','DD-MM-YYYY') 
                                    AND to_date('$dia2/$mes2/$ano2 23:59:59','DD-MM-YYYY  HH24:mi:ss') 
                                    ORDER BY data ASC";
                }
                
                if ($tipo_busca == 'tipo_3') {
                        $query = "  SELECT ID, Entidade, Assunto,CONCILIADOR, DATA, Total, Total_disponivel, Hora_inicio, Sala 
                                    FROM setorial.Controle  
                                    WHERE SIGLA_LOCALIDADE = '$sigla' 
                                    AND lower(Entidade) 
                                    LIKE lower('%$entidade_buscar%')
                                    AND DATA BETWEEN TO_DATE('$dia1/$mes1/$ano1','DD-MM-YYYY')
                                    AND TO_DATE('$dia2/$mes2/$ano2 23:59:59','DD-MM-YYYY  HH24:mi:ss')
                                    ORDER BY DATA ASC";

                        /*if (empty($_POST['a_partir1'])) {
                                $query .= " AND data >= TRUNC(SYSDATE)";
                        }*/
                }
                if ($tipo_busca == 'tipo_4') {
                    $query = "  SELECT ID, ENTIDADE, ASSUNTO, CONCILIADOR, DATA, TOTAL, TOTAL_DISPONIVEL, HORA_INICIO, SALA 
                                FROM setorial.Controle 
                                WHERE SIGLA_LOCALIDADE = '$sigla' 
                                AND lower(Assunto) 
                                LIKE lower('%$assunto_buscar%')
                                AND DATA BETWEEN TO_DATE('$dia1/$mes1/$ano1','DD-MM-YYYY')
                                AND TO_DATE('$dia2/$mes2/$ano2 23:59:59','DD-MM-YYYY  HH24:mi:ss')
                                ORDER BY DATA ASC";

                    /*if (empty($_POST['a_partir2'])){
                        $query .= " AND data >= TRUNC(SYSDATE)";
                    }*/
                }
        }
        
        $resultado = oci_parse($conexao, $query);
        ociexecute($resultado);
        while ($linha = oci_fetch_array($resultado, OCI_BOTH)) {
                //$linha['DATA']    = str_replace('/', '.', date('d/m/Y',  strtotime($linha['DATA'])));
                //$linha['DATA']    = date('m.d.Y', strtotime($linha['DATA']));
                //var_dump($linha[4]);
                $conciliador      = $linha['CONCILIADOR'];
                $entidade         = urlencode($linha['ENTIDADE']);
                $horario          = urlencode($linha['HORA_INICIO']);
                $assunto          = urlencode($linha['ASSUNTO']);
                $total            = $linha['TOTAL'];
                $total_disponivel = urldecode($linha['TOTAL_DISPONIVEL']);
                $duracao          = urldecode($linha['DURACAO']);
                $sala             = urlencode($linha['SALA']);
                $data             = $linha['DATA']; // = $linha[4];
                $ID               = $linha['ID'];
                $intervalo_ini    = $linha['INTERVALO_INICIAL'];
                $intervalo_fim    = $linha['INTERVALO_FIM'];

                $dia  =  substr($linha['DATA'], 0, 2);
                $mes  =  substr($linha['DATA'], 3, 2);
                $ano  =  substr($linha['DATA'], 6, 4);

                $dateTime = mktime(00, 00, 00, $mes, $dia, $ano);
                $dateForm = date('d.m.Y', $dateTime); // Data da Pauta 
                //$dateForm = (int)floor($dateForm / (60 * 60 * 24));  //Dias
              
                //´VERIFICA O PRAZO DE 90 DIAS  //

                $dataAtual  = strtotime('now'); //  Segundos     
                $dateForm   = strtotime($dateForm);
                $dataPrazo  = $dateForm - $dataAtual;

                //´VERIFICA VALIDADE DE 30 DIAS //

                $dataLimite = (int)floor($dataAtual / (60 * 60 * 24));  //Dias
                $dateForm   = (int)floor($dateForm / (60 * 60 * 24)); 
             
                if($perfil == "CEJUC") {
                    
                    echo "<tr>";
                    //echo "<td> $linha[0] </td>";
                    
                        echo "<td> " . $linha['ENTIDADE'] . " </td>";
                        echo "<td> " . $linha['ASSUNTO'] . " </td>";
                        //echo "<td> ".$linha['CONCILIADOR']." </td>";//
                        echo "<td> " . $linha['DATA'] . " </td>";
                        echo "<td> " . $linha['HORA_INICIO'] . " </td>";
                        echo "<td> " . $linha['SALA'] . " </td>";
                        echo "<td> " . $linha['TOTAL_DISPONIVEL'] . " </td>";
                        //echo "<td> " . date('d/m/Y', $timewarp) . " </td>";
                        // date('d/m/Y H:i', $timestamp);
						
                    if ($linha[5] > $linha[6]) {
                            echo "<td>
                                    <button type=\"button\" class=\"button2\" 
                                        data-ID='$ID' 
                                        data-assunto='$assunto' 
                                        data-date='$linha[4]' 
                                        data-total='$total' 
                                        data-total_disponivel='$linha[6]' 
                                        data-entidade='$entidade' 
                                        data-sala='$sala' 
                                        conciliador='$conciliador' 
                                        data-intervalo_ini='$intervalo_ini'
                                        data-intervalo_fim='$intervalo_fim'
                                        onclick=\"carregaInfo2(this);\">
                                            Listar
                                    </button></form></a></td>";
                            echo"</td>";                   
                    }
                    if ($linha[5] == $linha[6]) {
                            echo "<td>  -  </td>";
                    }
                          if ($linha[5] > $linha[6]) {
                         $aux_perfil = $perfil;   
                        echo "<td>
                                    <form method=\"post\" name =\"envia_valores\" id=\"envia_valores\" action=\"resultado_index.php\"> 
                                        <input type=\"hidden\" name=\"data-ID\" id =\"data-ID\" value=\"$ID\">                                    
                                        <input type=\"hidden\" name=\"data-date\" id =\"data-date\" value=\"$linha[4]\">
                                        <input type=\"hidden\" name=\"data-assunto\" id =\"data-assunto\" value=\"$assunto\">
                                        <input type=\"hidden\" name=\"conciliador\" id =\"conciliador\" value=\"$conciliador\">
                                        <input type=\"hidden\" name=\"sala\" id =\"sala\" value=\"$sala\">
                                        <input type=\"hidden\" name=\"data-entidade\" id =\"data-entidade\" value=\"$entidade\">
                                        <input type=\"hidden\" name=\"data-total_disponivel\" id =\"data-total_disponivel\" value=\"$linha[6]\">
                                        <input type=\"hidden\" name=\"data-horario\" id =\"data-horario\" value=\"$horario\">
                                        <input type=\"hidden\" name=\"data-total\" id =\"data-total\" value=\"$total\">
                                        <input type=\"hidden\" name=\"data-perfil\" id =\"data-perfil\" value=\"$aux_perfil\">
                                        <button type=\"submit\" class=\"button2\" onclick=\"resultado_index.php\">
                                            Resultado
                                        </button>
                                    </form>
                            </td>";
                            
                        } else {
                            echo "<td> - </td>";
                        }
                    
                  
                } else  {

                    echo "<tr>";
                    //echo "<td> $linha[0] </td>";
                    
                        echo "<td> " . $linha['ENTIDADE'] . " </td>";
                        echo "<td> " . $linha['ASSUNTO'] . " </td>";
                        //echo "<td> ".$linha['CONCILIADOR']." </td>";//
                        echo "<td> " . $linha['DATA'] . " </td>";
                        echo "<td> " . $linha['HORA_INICIO'] . " </td>";
                        echo "<td> " . $linha['SALA'] . " </td>";
                        echo "<td> " . $linha['TOTAL_DISPONIVEL'] . " </td>";
						
						                    if ($linha[5] > $linha[6]) {
                            echo "<td>
                                    <button type=\"button\" class=\"button2\" 
                                        data-ID='$ID' 
                                        data-assunto='$assunto' 
                                        data-date='$linha[4]' 
                                        data-total='$total' 
                                        data-total_disponivel='$linha[6]' 
                                        data-entidade='$entidade' 
                                        data-sala='$sala' 
                                        conciliador='$conciliador' 
                                        data-intervalo_ini='$intervalo_ini'
                                        data-intervalo_fim='$intervalo_fim'
                                        onclick=\"carregaInfo2(this);\">
                                            Listar
                                    </button></form></a></td>";
                            echo"</td>";                   
                    }
                    if ($linha[5] == $linha[6]) {
                            echo "<td>  -  </td>";
                    }
                        
                    if ($linha[5] > $linha[6]) 
					{
                         $aux_perfil = $perfil;   
                        echo "<td>
                                    <form method=\"post\" name =\"envia_valores\" id=\"envia_valores\" action=\"resultado_index.php\"> 
                                        <input type=\"hidden\" name=\"data-ID\" id =\"data-ID\" value=\"$ID\">                                    
                                        <input type=\"hidden\" name=\"data-date\" id =\"data-date\" value=\"$linha[4]\">
                                        <input type=\"hidden\" name=\"data-assunto\" id =\"data-assunto\" value=\"$assunto\">
                                        <input type=\"hidden\" name=\"conciliador\" id =\"conciliador\" value=\"$conciliador\">
                                        <input type=\"hidden\" name=\"sala\" id =\"sala\" value=\"$sala\">
                                        <input type=\"hidden\" name=\"data-entidade\" id =\"data-entidade\" value=\"$entidade\">
                                        <input type=\"hidden\" name=\"data-total_disponivel\" id =\"data-total_disponivel\" value=\"$linha[6]\">
                                        <input type=\"hidden\" name=\"data-horario\" id =\"data-horario\" value=\"$horario\">
                                        <input type=\"hidden\" name=\"data-total\" id =\"data-total\" value=\"$total\">
                                        <input type=\"hidden\" name=\"data-perfil\" id =\"data-perfil\" value=\"$aux_perfil\">
                                        <button type=\"submit\" class=\"button2\" onclick=\"resultado_index.php\">
                                            Resultado
                                        </button>
                                    </form>
                            </td>";
                            
                        } else {
                            echo "<td> - </td>";
                        }
                    echo "</tr>";

                }
            
        }?>
				</table>
								<br><br>
				<button  class="button2" onclick="window.location.href='principal.php';">Voltar</button>
				
<div id="myModal" class="modal fade" role="dialog">
    <center>
        <div id="printableArea" class="box">
            <div class="modal-dialog">
            <!-- Modal content-->
                <div class="modal-content">
                
                    <div id="modal-header" class="modal-header">
                    <center><img src="icone-siac.png" height="62" width="62" alt="Logo do TRF 1ª Região"></center>
                    <button type="button" class="close" data-dismiss="modal"onclick="window.location.reload(true);">&times;</button>
                        <div  id="modal-title" class="modal-title">
                            <div class="pen-title">
                                <font size="3px">
                                    Sistema de Agendamento de Audi&ecirc;ncias de Concilia&ccedil;&atilde;o <br>
                                 <?
                                    echo urldecode($localidade);
                                 ?>
                                </font>
                            </div>
                        </div>                
                    </div>
                
                    <div class="modal-body">

                        <div class="no-print">
                            <center>
                                <img src="sh.gif" height="42" width="42" alt="Acordo">
                            </center>
                        </div>
                         <br>
                    <!--<form method=POST action="inserir.php?"> -->                                       
                        <div id="conteudo">        
                        </div>                                            
                    </div>
                
                    <div class="modal-footer">
                    <center><button type="button" class="button2" data-dismiss="modal" onclick="window.location.reload(true);" >Fechar</button></center>
                    </div>
                    
                </div>

            </div>
        </div>
    </center>
</div>
		</center>
		<script type="text/javascript" src="carrega_lista.js"></script>
				<script type="text/javascript" src="funcao3.js"></script>
		<script>      
			$(document).ready(function () 
			{
				$("#bt-modal").click(function () { //quando o bot&atilde;ƒÆ’&atilde;‚Â£o fo rclicado
				console.log("Clicou"); //Mensagem no console do navegador
				$("#myModal").modal(); //abre o modal com esse id
			});
            });
			function carregaInfo2(bt) 
			{                                                      
                $("#myModal").modal(); //abre o modal com esse id                               
                var ID = bt.getAttribute('data-ID');
                var horario = bt.getAttribute('data-horario');
                var total = bt.getAttribute('data-total');                
                var lotacao= bt.getAttribute('data-lotacao');
                var total2=bt.getAttribute('data-total_disponivel');
                var entidade=bt.getAttribute('data-entidade');
                var data=bt.getAttribute('data-date');
                var sala=bt.getAttribute('data-sala');     
                var assunto=bt.getAttribute('data-assunto');
                var conciliador=bt.getAttribute('conciliador');
                var intervalo_ini=bt.getAttribute('data-intervalo_ini');
                var intervalo_fim=bt.getAttribute('data-intervalo_fim');

                AlteraConteudo2(ID, horario, total, lotacao, total2, entidade, data, sala, assunto, conciliador,intervalo_ini, intervalo_fim);
            }
			function fechaModal() 
			{
				$('#myModal').modal('close');
				window.location.reload(true);
			}
			 function printDiv2(divName) {
                $(".button2").hide();
                 var printContents = document.getElementById(divName).innerHTML;
                 var originalContents = document.body.innerHTML;

                 document.body.innerHTML = printContents;
                 window.print();
                 document.body.innerHTML = originalContents;    
                 history.back();
             }
			function apaga(bt) 
			{                                                                      
				var x=confirm('Confirma a exclus\u00e3o?');
				var ID = bt.getAttribute('data-ID');
				var codigo = bt.getAttribute('data-codigo');
				var vara = bt.getAttribute('data-vara');                
				var total_disponivel=bt.getAttribute('data-total_disponivel');                
				var assunto=bt.getAttribute('data-assunto');                
				var data=bt.getAttribute('data-data_aud');                
				var entidade=bt.getAttribute('data-entidade');                
				var horario=bt.getAttribute('data-horario');  
				var total=bt.getAttribute('data-total');  
				var sala=bt.getAttribute('data-sala');  
				var origem="lista";
				if (x == true) 
				{
					apagaAudiencia(ID, codigo, vara, total_disponivel, assunto, data, entidade, horario, total, sala, origem);
				}
				 window.location.reload(true);
			}
		</script>
		
	</body>
</html>