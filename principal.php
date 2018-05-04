<?php  
    date_default_timezone_set('America/Sao_Paulo');
    /*if (date_default_timezone_get()) {    
        echo 'Este � o: date_default_timezone_set: ' . date_default_timezone_get() . '<br />';
    }
    if (ini_get('date.timezone')) {    
        echo 'E este � o: date.timezone: ' . ini_get('date.timezone');
    }*/
?>
<!DOCTYPE HTML>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML>

<html>
  <head>   
    <meta charset="ISO-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1", "sistema e-SiAC">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<link rel="shortcut icon" href="icone-siac.png" type="image/x-icon" />
    <title>Sistema de Agendamento de Audi&ecirc;ncias de Concilia&ccedil;&atilde;o</title>

    <!-- FONTES EXTERNAS -->
    <link rel="stylesheet" href="css/reset.css"> 
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>


    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/print.css">
 

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print"/>
    <link href="css/bootstrap2.css" rel="stylesheet" type="text/css"/>
    <!-- <script src="jquery.min.js"></script> -->

    <!-- JQUERY  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>

    <!-- JQUERY UI -->
    <script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="jquery-ui.css">

    <!-- DATE PICKER -->
    <script type="text/javascript" src="date-picker/jquery-ui.multidatespicker.js"></script>

    <!-- SCRIPTS -->
    <script type="text/javascript" src="validacao_pesq_pauta.js"></script>
    <script type="text/javascript" src="validacao_busca_aud.js"></script>

    <!-- <link rel="stylesheet" href="css/???.css"> -->

<style> <!-- In&iacute;cio da exporta&ccedil;&atilde;o para folha de estilo externa -->

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
  
</style> <!-- Fim da exporta�&atilde;o para folha de estilo externa -->
</head>
  <body>
  
    
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<?php
include "conecta.inc";
include_once "TRF1_Autenticacao.php";

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

 <?php

    if (isset($_SESSION['login'])) {
    ?>
       <br>
            <div class="header">
                
                   <table-exit>   
                            <td-exit align="center">                        
                                <input id="button_out" type="button" class="closebtn" onclick="logoutck();" value="Sair"/>
                           </td-exit>
                    </table>
               
            </div>
      <?php

    }
?>

<div class="pen-title">

         <br><br>
    <img src="icone-siac.png" alt="Logo do TRF 1 Regiao">
    <span>
        <br>
        <h1>   Sistema de Agendamento de Audi&ecirc;ncias de Concilia&ccedil;&atilde;o  </h1>


        <?php
           echo urldecode($localidade);
        ?>
   </span>
</div>
<div class="pen-title">
    <?php
if (!empty($_GET['add'])) {
        echo "<script language='javascript' type='text/javascript'>alert('Audiencia cadastrada com sucesso!');window.location.href='principal.php';</script>";
		 echo "<script language='javascript' type='text/javascript'>window.location.reload(true);</script>";
}//retirado o s�mbolo: &ecirc;
if (!empty($_GET['pauta'])) {
        echo "<script language='javascript' type='text/javascript'>alert('Nova pauta cadastrada com sucesso!');window.location.href='principal.php';</script>";
		echo "<script language='javascript' type='text/javascript'>window.location.reload(true);</script>";
}
if (!empty($_GET['apagauser'])) {
        echo "<script language='javascript' type='text/javascript'>alert('Usuario apagado com sucesso!');window.location.href='principal.php';</script>";
		echo "<script language='javascript' type='text/javascript'>window.location.reload(true);</script>";
}//retirado o s�mbolo: &aacute; 
if (!empty($_GET['senhaok'])) {
        echo "<script language='javascript' type='text/javascript'>alert('Senha alterada com sucesso!');window.location.href='principal.php';</script>";
		echo "<script language='javascript' type='text/javascript'>window.location.reload(true);</script>";
}
if (!empty($_GET['senhaerro'])) {
        echo "<script language='javascript' type='text/javascript'>alert('Erro. As senhas nao coincidem!');window.location.href='principal.php';</script>";
		echo "<script language='javascript' type='text/javascript'>window.location.reload(true);</script>";
}//retirado o s�mbolo: &atilde;
if (!empty($_GET['del_p'])) {
        $del_p = $_GET['del_p'];
        if ($del_p == 0) {
                echo "<script language='javascript' type='text/javascript'>alert('ERRO ao apagar a pauta! Existem audiencias cadastradas nessa pauta!');</script>";
				echo "<script language='javascript' type='text/javascript'>window.location.reload(true);</script>";
        } //retirado o s�mbolo: &ecirc;
        if ($del_p == 1) {
                echo "<script language='javascript' type='text/javascript'>alert('Pauta apagada com sucesso!');window.location.href='principal.php';</script>";
				echo "<script language='javascript' type='text/javascript'>window.location.reload(true);</script>";
                
                
        }
}
if (!empty($_POST['dia1'])) {
        $dia1 = $_POST['dia1'];
}
if (!empty($_POST['dia2'])) {
        $dia2 = $_POST['dia2'];
}
if (!empty($_POST['mes1'])) {
        $mes1 = $_POST['mes1'];
}
if (!empty($_POST['mes2'])) {
        $mes2 = $_POST['mes2'];
}
if (!empty($_POST['ano1'])) {
        $ano1 = $_POST['ano1'];
}
if (!empty($_POST['ano2'])) {
        $ano2 = $Marcar['ano2'];
}



if (isset($_POST['Visualizar'])) {
        $tipo_busca      = $_POST['tipo_busca'];
        $entidade_buscar = $_POST['entidade_buscar'];
        $assunto_buscar  = $_POST['assunto_buscar'];
}

if (isset($login_session)) {
        if ($perfil == "CEJUC") {
                echo "Matr&iacute;cula: $login_session - Data:  $data_login     <br>
                    Perfil: Diretor do CEJUC/SECON - Lota&ccedil;&atilde;o: $lotacao     <br>
                                                                        <br>
                                                                        <br>";
        } else if ($perfil == "Diretor") {
                echo "Bem-Vindo, $login_session. Data: $data_login.<br>Seu perfil &eacute; de Diretor de Vara e sua lota&ccedil;&atilde;o $lotacao.<br><br><br>";
        } else {
                echo "Bem-Vindo, $login_session. Data: $data_login.<br>Seu perfil &eacute; de " . $perfil . " e sua lota&ccedil;&atilde;o $lotacao.<br><br><br>";
        }
		
			echo "<center>";
       // echo "<table style=\"border:none\">";
        echo "<div class=\"form\"></form>";
        
        if ($perfil == "CEJUC") 
		{
		
		 //   echo "<th   style=\"background-color: #e9e9e9; border:none\">";
                echo "    <button type=\"button\" class=\"button\" onclick=\"carregaPauta(this)\">
                                        Cadastro de pauta
                                    </button>&nbsp;&nbsp;&nbsp;&nbsp;";
        }

        if ($perfil == "CEJUC" || "DIATU") {
									
                echo "<button type=\"button\" class=\"button\" onclick=\"carregaUsuarios(this)\">
                                        Ger&ecirc;ncia de Usu&aacute;rios   
                                    </button>&nbsp;&nbsp;&nbsp;&nbsp;";
		
        }
        
        if ($perfil == "Diretor") {
                echo "<button type=\"button\" class=\"button\" onclick=\"carregaUsuarios(this)\">Ger&ecirc;ncia de Usu&aacute;rios</button>&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        //if ($perfil=="Usuario" OR $perfil=="Diretor") { echo "<button type=\"button\" class=\"button\" onclick=\"carregaMudasenha(this)\">Alterar senha</button>&nbsp;&nbsp;&nbsp;&nbsp;"; }        
        if ($perfil == "Usuario" OR $perfil == "Diretor" OR $perfil == "CEJUC") {
		  // echo "<th   style=\"background-color: #e9e9e9; border:none\">";
                echo "<button type=\"button\" class=\"button\" onclick=\"carregaPesquisa(this)\">Buscar Audi&ecirc;ncias</button>&nbsp;&nbsp;&nbsp;&nbsp;";
				//echo "</th>";
				echo "<button type=\"button\" class=\"button\" onclick=\"carregaPesquisa_pauta(this)\">
								Pesquisar Pauta 
							</button>&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        
        echo "</form></div>";
	//	echo "</table>";
        echo "</center>";	
?> 
		
		
    <br><br>
<!--
Menu de pesquisar pauta COR ANTIGA 152F4E
-->
<br>
									<center>
									</center>
<br><br><br>

<!--
Lista de pautas
-->
<?php
    if ($perfil !== "DIATU") {
?>
          <h2><b>Lista de Pautas</b></h2>   
 <?   }  ?>

  <br><br>
  <font size="3"> 
  <table style="text-align:center; margin: 0 auto">          
  <thead>
    <tr>

    <?php   if(ISSET($perfil) && $perfil !== "DIATU") { ?>
                <th>Entidade</th>
                <th>Assunto</th>
                <th>Data</th>
                <th>Hor&aacute;rio de In&iacute;cio</th>
                <th>Sala</th>
                <th>Total Dispon&iacute;vel</th>
                <th> </th>
                <th> </th>
                <th> </th>

    <?php   }  ?>

    <?php   if($perfil == "CEJUC") {
                
                echo "<th>  </th>";
                echo "<th>  </th>";
            }
    ?>
   </tr>

    <body>    
    <?php
        

        //ociexecute($resultado);
        $_SESSION['lotacao'] = $lotacao;
        $_SESSION['perfil']  = $perfil;
        $_SESSION['login']   = $login_session;
        $query_nls_comp      = "alter session set nls_comp=linguistic";
        $query_nls_sort      = "alter session set nls_sort=binary_ai";
        $resultado           = oci_parse($conexao, $query_nls_comp);
        $resultado           = oci_parse($conexao, $query_nls_sort);
        ociexecute($resultado);
        /*
        A variavel $tipo_busca &atilde;�ƒ&atilde;�© atribuida pelo metodo POST e &atilde;�ƒ&atilde;�© usada para mostrar todas as pautas (caso NULL) ou se o usu&atilde;�ƒ&atilde;�¡rio
        utilisou a busca de pautas(caso tipo_1, tipo_2, tipo_3)
        */
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
                                    LIKE lower('%$entidade_buscar%')";

                        if (empty($_POST['a_partir1'])) {
                                $query .= " AND data >= TRUNC(SYSDATE)";
                        }
                }
                if ($tipo_busca == 'tipo_4') {
                    $query = "  SELECT ID, ENTIDADE, ASSUNTO, CONCILIADOR, DATA, TOTAL, TOTAL_DISPONIVEL, HORA_INICIO, SALA 
                                FROM setorial.Controle 
                                WHERE SIGLA_LOCALIDADE = '$sigla' 
                                AND lower(Assunto) 
                                LIKE lower('%$assunto_buscar%')";

                    if (empty($_POST['a_partir2'])){
                        $query .= " AND data >= TRUNC(SYSDATE)";
                    }
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

                $dataAtual  = strtotime('now'); //  Segundos     
                $dateForm   = strtotime($dateForm);

                $dataPrazo  = $dateForm - $dataAtual;
                $dataPrazo  = (int)floor($dataPrazo / (60 * 60 * 24)); 

                //�VERIFICA VALIDADE DE 30 DIAS //

                $dataLimite = (int)floor($dataAtual / (60 * 60 * 24));  //Dias
                $dateForm   = (int)floor($dateForm / (60 * 60 * 24)); 
             
                if($perfil == "CEJUC" && $dateForm - $dataLimite > -1 && $perfil !== "DIATU") {
                    
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
             
                    if ($linha[6] > 0) {
                            // var_dump($ID);

                        echo    "<div id=\"mdp-demo\"></div>";
                        echo    "<td>
                                    <button type=\"button\" class=\"button2\" 
                                        data-id='$ID' 
                                        data-total='$total' 
                                        data-horario='$horario' 
                                        data-lotacao='$lotacao' 
                                        data-total_disponivel='$linha[6]' 
                                        data-entidade='$entidade' 
                                        data-date='$data'  
                                        data-intervalo_ini='$intervalo_ini'
                                        data-intervalo_fim='$intervalo_fim'
                                        data-sala='$sala'
                                        data-duracao='$duracao'
                                        onclick=\"carregaInfo(this)\"> 
                                            Marcar 
                                    </button>
                                </td>";
                    }
                    
                    if ($linha[6] == 0) {
                            echo    "<td> 
                                        <p class=\"button3\">Pauta cheia</p>
                                    </td>";
                    }
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
                    if ($perfil == "CEJUC") {
                        if($linha[6] == $linha[5]) {
                            $concatena = 
                                '<td>
                                    <a href="apagar_pauta.php?id=' . $linha[0] . '" onclick="return confirm(\'Confirmar exclus&atilde;o?\')">
                                        <button class="button2">
                                            Apagar
                                        </button>
                                    </a>
                                </td>';

                            echo $concatena;

                        } else {
                            echo "<td>  -  </td>";
                        } 
              
                        echo "<td>
                                <button type=\"button\" class=\"button2 btn-edit\" 
                                    data-id='$ID' 
                                    data-total='$total' 
                                    data-horario='$horario' 
                                    data-lotacao='$lotacao' 
                                    data-total_disponivel='$total_disponivel' 
                                    data-entidade='$entidade' 
                                    data-date='$data' 
                                    data-sala='$sala' 
                                    data-assunto='$assunto' 
                                    data-conciliador='$conciliador'
                                    data-duracao='$duracao'
                                    onclick=\"carregaEditar(this)\"> 
                                        Editar 
                                    </a>
                                </button>
                            </td>";
                    }

                    echo "</tr>";
                  
                } else if($dateForm - $dataLimite > -1 && $perfil !== "DIATU") {

                    echo "<tr>";
                    //echo "<td> $linha[0] </td>";
                    
                        echo "<td> " . $linha['ENTIDADE'] . " </td>";
                        echo "<td> " . $linha['ASSUNTO'] . " </td>";
                        //echo "<td> ".$linha['CONCILIADOR']." </td>";//
                        echo "<td> " . $linha['DATA'] . " </td>";
                        echo "<td> " . $linha['HORA_INICIO'] . " </td>";
                        echo "<td> " . $linha['SALA'] . " </td>";
                        echo "<td> " . $linha['TOTAL_DISPONIVEL'] . " </td>";
                        

             
                    if ($linha[6] > 0) {
                            // var_dump($ID);
                        echo    "<td>
                                    <button type=\"button\" class=\"button2\" 
                                        data-id='$ID' 
                                        data-total='$total' 
                                        data-horario='$horario' 
                                        data-lotacao='$lotacao' 
                                        data-total_disponivel='$linha[6]' 
                                        data-entidade='$entidade' 
                                        data-date='$data'  
                                        data-intervalo_ini='$intervalo_ini'
                                        data-intervalo_fim='$intervalo_fim'
                                        data-sala='$sala'
                                        data-duracao='$duracao'
                                        onclick=\"carregaInfo(this)\"> 
                                            Marcar 
                                    </button>
                                </td>";
                    }
                    
                    if ($linha[6] == 0) {
                            echo    "<td> 
                                        <p class=\"button3\">Pauta cheia</p>
                                    </td>";
                    }
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

                    if ($perfil == "CEJUC") {
                        if($linha[6] == $linha[5]) {
                            $concatena = 
                                '<td>
                                    <a href="apagar_pauta.php?id=' . $linha[0] . '" onclick="return confirm(\'Confirmar exclusao?\')">
                                        <button class="button2">
                                            Apagar
                                        </button>
                                    </a>
                                </td>';

                            echo $concatena;

                        } else {
                            echo "<td>  -  </td>";
                        } 
              
                        echo "<td>
                                <button type=\"button\" class=\"button2 btn-edit\" 
                                    data-id='$ID' 
                                    data-total='$total' 
                                    data-horario='$horario' 
                                    data-lotacao='$lotacao' 
                                    data-total_disponivel='$total_disponivel' 
                                    data-entidade='$entidade' 
                                    data-date='$data' 
                                    data-sala='$sala' 
                                    data-assunto='$assunto' 
                                    data-conciliador='$conciliador'
                                    data-duracao='$duracao'
                                    onclick=\"carregaEditar(this)\"> 
                                        Editar 
                                    </a>
                                </button>
                            </td>";
                    }

                    echo "</tr>";

                }
            
        }

        } else {

                echo "  Tribunal Regional Federal da 1&#170; Regi&atilde;o <br><br> ";
                
                echo "Bem-Vindo! <br> <br>";
                //echo "<a href=\"tutorial/SISTCON.mp4\" download>TUTORIAL</a>";
                echo "<br> <br>";
                //echo "<input type=\"text\" id=\"login\"> ";
                //echo "<br><a href='index.php'>Fa&ccedil;a Login</a>";

                echo "<form name=\"formulario\" method=\"post\" action=\"$PHP_SELF?modo=autentica&autenticacao=AACON\">
                        <input type=\"hidden\" name=\"modo\" value=\"autentica\">
                        <input type=\"hidden\" name=\"autenticacao\" value=\"AACON\">
                        <table style=\"width: 30%; margin: 0 auto; border-radius: 50px 0px 0px 50px;\">
                            <tr> 
                                <!--Linha da tabela responsável pela inserção da Matrícula-->
                                <td align=\"left\" style=\"font-size: 14px; background-color: #285994; color: white;\">Matr&iacute;cula</td>
                                <td align=\"left\" >            
                                    <input name=\"Login\" type=\"text\" size=\"32\" if(isset($NomeUsuario)) value=\"$NomeUsuario\">
                                </td>
                            </tr>
                                <!--Linha da tabela responsável pela inserção da Senha-->
                            <tr> 
                                <td align=\"left\" style=\" font-size: 14px; background-color: #285994; color: white;\"> Senha</td>
                                <td align=\"left\">
                                    <input align=\"left\" name=\"senha\" type=\"password\" size=\"32\" onKeyPress=\"Enter(event.keyCode);\">
                                </td>
                            </tr>

                                <!--Linha da tabela responsável pela inserção da Matrícula-->

                            <tr> 
                                <td align=\"left\" style=\" font-size: 14px; background-color: #285994; color: white;\" >Banco de Dados</td>
                                <td align=\"left\"> 
                                    <select style=\"font-size: 13px;\" name=\"Dominio\" id=\"Dominio\" onChange=\"javascript:document.formulario.DominioCodigo.value=this.options[this.selectedIndex].id;\">";
                        
                                            # Array da Combo de dominio  
                                            # Todos os servidores da 1ª Região podem acessar

                                            $Secao = "TRF1";
                                            if(isset($DescSecaoIpRemoto[$IpRemoto])) {

                                                $Secao = $DescSecaoIpRemoto[$IpRemoto];

                                            }
                                                
                                            $DominioCdgo = 1000;
                                            $encoding ='ISO-8859-1'; 
                                            for($i = 0 ; $i < sizeof($DominioBancoSecao) ; $i ++) 
                                            {  
                                                $test='';
                                                $test1='';
                                                if($DominioBancoSecao[$i]["Codigo"] != "JFDSV1") 
                                                { //Remove a seleção do banco de desenvolvimento da lista de Banco de dados
                                                    if($DominioBancoSecao[$i]["Codigo"] != "JFDSV") 
                                                    { //Remove a seleção do banco de desenvolvimento da lista de Banco de dados
                                                        $test=$DominioBancoSecao[$i]["Nome"];
                                                        $test1 = mb_convert_case($test,MB_CASE_UPPER, $encoding);
                                                        echo "<option id=\"".( $DominioBancoSecao[$i]["Codigo"] != "" ? $DominioBancoSecao[$i]["Codigo"] : "" )."\" ".($SiglaSecao==$DominioBancoSecao[$i]["Sigla"] ? " Selected " : "")."value=\"" . $DominioBancoSecao[$i]["Banco"] . "\">" . str_replace("&NBSP;", "&nbsp;", $test1) ."</option>\n";
                                                        
                                                        if($SiglaSecao==$DominioBancoSecao[$i]["Sigla"])
                                                            $DominioCdgo = $DominioBancoSecao[$i]["Codigo"];
                                                    }
                                                }
                                            }  
                                           
                                    echo "</select>

                                    <input type=\"hidden\" value=\"$DominioCdgo\" name=\"DominioCodigo\" id=\"DominioCodigo\">
                                </td>
                            </tr>
                        </table>

                             <input type=button style=\"margin-top: 15px;\" class=\"button2\" value=\"Conectar\" onclick=\"Critica();\">
                             <a href=\"tutorial/SISTCON.mp4\" download>
                                <input type=button style=\"margin-top: 15px;\" class=\"button2\" value=\"Tutorial\">
                             </a>
                    </form>";

            
        }
?>    
     
    </table>
<br>
<br>
<br>

</center>




<div id="myModal" class="modal fade" role="dialog">
    <center>
        <div  class="box">
            <div class="modal-dialog">
            <!-- Modal content-->
                <div id="printableArea" class="modal-content">
                
                    <div id="modal-header" class="modal-header">
                        <center><img src="icone-siac.png" height="62" width="62" alt="Logo do TRF 1 Regiao"></center>
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
                        <center>
                            <button type="button" class="button2" data-dismiss="modal" onclick="window.location.reload(true);" >Fechar</button>
                        </center>
                    </div>
                    
                </div>

            </div>
        </div>
    </center>
</div>


                <!--
                Incui os aquivos .js para utiliza&atilde;�ƒ&atilde;�§&atilde;�ƒ&atilde;�£o das modals
                -->


<script type="text/javascript" src="funcao.js"></script>
<script type="text/javascript" src="funcao10.js"></script>
<script type="text/javascript" src="funcao11.js"></script>
<script type="text/javascript" src="funcao12.js"></script>
<script type="text/javascript" src="funcao4.js"></script>
<script>    
       
          $(document).ready(function () {

                $("#bt-modal").click(function () { //quando o bot&atilde;�ƒ&atilde;�£o fo rclicado
                    console.log("Clicou"); //Mensagem no console do navegador
                    $("#myModal").modal(); //abre o modal com esse id
                });
            });

            function carregaInfo(bt) {                                                      
                $("#myModal").modal(); //abre o modal com esse id                              
                var ID = bt.getAttribute('data-ID');
                var horario = bt.getAttribute('data-horario');
                var total = bt.getAttribute('data-total');              
                var lotacao= bt.getAttribute('data-lotacao');
                var total2=bt.getAttribute('data-total_disponivel');
                var entidade=bt.getAttribute('data-entidade');
                var data=bt.getAttribute('data-date'); 
                var intervalo_ini=bt.getAttribute('data-intervalo_ini');
                var intervalo_fim=bt.getAttribute('data-intervalo_fim');
                var sala=bt.getAttribute('data-sala');      
                var duracao=bt.getAttribute('data-duracao');                          
                AlteraConteudo(ID, horario, total, lotacao, total2, entidade, data, intervalo_ini, intervalo_fim, sala, duracao);
            }
                function carregaPauta(bt) {                                                      
                $("#myModal").modal(); //abre o modal com esse id                                                                                            
                carregaCadpauta();

            }    
    </script>
        <script type="text/javascript" src="funcao3.js"></script>
        <script type="text/javascript" src="funcao2.js"></script>
        <script type="text/javascript" src="funcao5.js"></script>
        <script type="text/javascript" src="funcao6.js"></script>
        <script type="text/javascript" src="funcao7.js"></script>
        <script type="text/javascript" src="funcao8.js"></script>
        <script type="text/javascript" src="funcao9.js"></script>
        <script type="text/javascript" src="funcao11.js"></script>
        <script type="text/javascript" src="funcao12.js"></script>
		<script type="text/javascript" src="carrega_pesq_pauta.js"></script>
   <script>
            
            $(document).ready(function () {

                $("#bt-modal").click(function () { //quando o bot&atilde;�ƒ&atilde;�£o for clicado
                    console.log("Clicou"); //Mensagem no console do navegador
                    $("#myModal").modal(); //abre o modal com esse id
                });

                
            });

            function atualiza_Resultado(bt) {                                                      
                $("#myModal").modal(); //abre o modal com esse id                               
                    var ID = bt.getAttribute('resultado');
                     modal_Resultado(resultado);
            }

            function resultado_index(bt){

                var ID=bt.getAttribute('data-ID');
                var horario=bt.getAttribute('data-horario');
                var total=bt.getAttribute('data-total');                
                var total2=bt.getAttribute('data-total_disponivel');
                var entidade=bt.getAttribute('data-entidade');
                var data=bt.getAttribute('data-date');
                var sala=bt.getAttribute('sala');     
                var assunto=bt.getAttribute('data-assunto');
                var conciliador=bt.getAttribute('conciliador');
 
                enviaResultado(ID, horario, total, total2, entidade, data, sala, assunto,conciliador);
            }

            function carregaInfo2(bt) {                                                      
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

            function carregaInfo3(bt) {                                                      
                $("#myModal").modal(); //abre o modal com esse id                               
                var ID=bt.getAttribute('data-ID');
                var horario=bt.getAttribute('data-horario');
                var total=bt.getAttribute('data-total');                
                var lotacao=bt.getAttribute('data-lotacao');
                var total2=bt.getAttribute('data-total_disponivel');
                var entidade=bt.getAttribute('data-entidade');
                var data=bt.getAttribute('data-date');
                var sala=bt.getAttribute('data-sala');     
                var assunto=bt.getAttribute('data-assunto');
                var conciliador=bt.getAttribute('conciliador');                
                AlteraConteudo3(ID, horario, total, lotacao, total2, entidade,conciliador, data, sala, assunto);
            } 



            function carregaEditar(bt) {                                                      
                $("#myModal").modal(); //abre o modal com esse id                               
                var ID=bt.getAttribute('data-ID');
                var horario=bt.getAttribute('data-horario');
                var duracao=bt.getAttribute('data-duracao');
                var total=bt.getAttribute('data-total');                
                var lotacao=bt.getAttribute('data-lotacao');
                var total_disponivel=bt.getAttribute('data-total_disponivel');
                var entidade=bt.getAttribute('data-entidade');
                var data=bt.getAttribute('data-date');
                var sala=bt.getAttribute('data-sala');     
                var assunto=bt.getAttribute('data-assunto');
                var conciliador=bt.getAttribute('data-conciliador');
           
                Editar(ID, horario, duracao, total, lotacao, total_disponivel, entidade, data, sala, assunto, conciliador);
            }
            function carregaUsuarios(bt) {                                                      
                $("#myModal").modal(); //abre o modal com esse id                                                                                            
                carregaCadusuarios();
            }
			 function carregaPesquisaPauta(bt) {                                                      
                $("#myModal").modal(); //abre o modal com esse id                                                                                            
                carregaPesquisaPauta();
            }
            function carregaMudasenha(bt) {                                                      
                $("#myModal").modal(); //abre o modal com esse id                                                                                            
                carregaMuda();
            }
            function carregaPesquisa(bt) {                                                      
                $("#myModal").modal(); //abre o modal com esse id  
                var id = bt.getAttribute('data-id');                                                                                          
                carregaPesquisaaud(id);
            }
			function carregaPesquisa_pauta(bt) {                                                      
                $("#myModal").modal(); //abre o modal com esse id                                                                                          
                carregaPesqPauta();
            }
            function carregaProcesso(bt) {                                                      
                $("#myModal").modal(); //abre o modal com esse id                               
                var Processo = bt.getAttribute('processo');
                var Sigla = bt.getAttribute('sigla');
                var Local = bt.getAttribute('local');                                   
                CarregaProcesso(Processo, Sigla, Local);
            }
            function printDiv(divName,buttonName) {

                var cusid_ele = documentdocument.getElementsByClassName(buttonName);
                for (var i = 0; i < cusid_ele.length; ++i) {
                    var item = cusid_ele[i];  
                    item.style.display = 'none';
                }

                 var printContents = document.getElementById(divName).innerHTML;
                 var originalContents = document.body.innerHTML;

                 document.body.innerHTML = printContents;
                 window.print();
                 document.body.innerHTML = originalContents;    
                 window.location.href='principal.php';
             }
             function printDiv2(divName) {

                $(".button2").hide();
                var printContents    = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;    
                window.location.href='principal.php';

             }

      
            
            function apaga(bt) {                                                                      
                        var x=confirm('Confirmar exclus\u00e3o?');
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
                        var origem='normal';
                        if (x == true) { apagaAudiencia(ID, codigo, vara, total_disponivel, assunto, data, entidade, horario, total, sala, origem);
						
						}
            }  
            function fechaModal() {
               $('#myModal').modal('close');
			   window.location.href='principal.php';
			}

         
</script>
</tbody>
</body>
<script src="./js/js_plugins/bootstrap.min.js" type="text/javascript"></script>
<!-- <script src="./plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script> -->
<!-- <script src="./css/bootstrap.min.js"></script> -->
<!-- <script src="js/index.js"></script> -->

</html>

