<?php 
@session_start();
$_SESSION['dataLoginCH'] = date('Y-m-d H:i:s');
@header("Content-Type: text/html; charset=iso-8859-1",true);
##################################################################################
# Informações 																	 #	
#  O componente deve receber a varivel de aplicação do componente quer autenticar#
# este caso de uso apenas atentica o cliente e registra as variveis login e o 	 #
# array Role principal do sistema  na sessão do usuario que posteriormente será  #
# acessada pelas aplicações que usam este componente.A partir do dia 29/04 esta  #
# aplicação passou tambem a trocar a senha do usuário(jorge).					 #	
##################################################################################
# Includes
include('Constante/Layout.php'); 
include('Erro.php'); 
include('trf1_Biblioteca.php'); 

if(!(isset($SiglaSecao)))
	$SiglaSecao = "TRF1";
if(!isset($_SESSION['Login']))
	$_SESSION['Login'] = "";
if(!isset($_SESSION['Dominio']))
	$_SESSION['Dominio'] = "";

###############################################################################
# Verifica se o HTTPS está ativo 
$PosServer = strpos(strtoupper($_SERVER["HTTP_HOST"]),"WWWDSV2");
$PosServerMG = strpos(strtoupper($_SERVER["HTTP_HOST"]),"INTRANET.MG");
$HTTPS="on";
if($HTTPS!="on")
{
    echo  "<div style=\"width:380px;margin-top:10px;margin-left:4px;\"><center><font class=\"titulo1\">$AUTENTICACAO_ERRO06</font></center></div>";
    BarraNormal();
    echo "<div style=\"width:380px;margin-top:10px;margin-left:4px;\"><center><font style=\"text-align:justify \" class=\"titulo2\" >$AUTENTICACAO_ERRO01</font></center></div><br>";
    BarraNormal(); 
}
else
{
###############################################################################
# Funcionalidades globais para a aplicação 									  #						
#																			  #
###############################################################################
# Autenticação do Usuario no Banco  
if (isset($_POST['modo']) && $_POST['modo'] == "autentica")
{  
	#include necessário para conexao
	include('Constante/Conexao.php');  
	$Login = $_POST['Login'];
	$Dominio = $_POST['Dominio'];
	if( (!isset($Login)) || (!isset($Dominio)) ){
		echo  "<div style=\"width:380px;margin-top:10px;margin-left:4px;\"><center><font class=\"titulo1\">$AUTENTICACAO_ERRO06</font></center></div>";
		BarraNormal();
		echo "<div style=\"width:380px;margin-top:10px;margin-left:4px;\"><center><font style=\"text-align:justify \" class=\"titulo2\" >$AUTENTICACAO_ERRO13</font></center></div><br>";
		BarraNormal(); 
		exit;
	} 
	# Conecta no banco
	$DominioBco = Conexao($Dominio,1);
	$login		= strtoupper($Login);
	$conexao 	= @ocilogon($login, $senha, $DominioBco);	
	# Se a tentativa de conexão for bem sucedida 
	if ($conexao === false)
	{
		$ErrMsgConexao = "";
		$oerr = OCIError();
		if ($oerr) 
		{
			if ($oerr["code"] == "1017")
			$ErrMsgConexao="";
			else
			$ErrMsgConexao = "Error ". $oerr["message"];
		}
		?>			
		<script>
			alert("Usuário ou senha incorreto(s)");		
			document.location.href = 'principal.php'
		</script>
		<?php

	} 
	else
	{
###############################################################################
# Caso o usuario consiga se conectar com sucesso no banco  		
		# Troca de Senha
	
			# Busca na base o Matrícula
			$SqlPess = "
			SELECT NOME FROM
			(
			SELECT NO_SERVIDOR NOME 
			FROM SERV_PESSOAL WHERE NU_MATR_SERVIDOR = :login 
			)
			UNION 
			( 
			SELECT USER_NOME NOME
			FROM RH_USER_ID WHERE USER_ID = :login
			)";
			$cursor = @ExecutaQueryIntraWeb($SqlPess,$DominioBco,":login",$login);// OCIParse ($conexao, $SqlBoletim);
			$exe = @OCIExecute ($cursor);
			$n_linhas = @OCIFetchStatement($cursor,$linha);
			$autenticacao = 'AACON';
			$NOMEUSUARIOLG 				= "";
			$_SESSION["NOMEUSUARIOLG"] 	= "";	
			if($n_linhas>0){
				$NOMEUSUARIOLG = $linha["NOME"][0];
				$_SESSION["NOMEUSUARIOLG"] = $linha["NOME"][0];		
			}
			# Faz um select e retorna as roles que o usuario faz parte.  
			$sql="SELECT ROLE FROM SESSION_ROLES " ;  
			$stmt=ociparse($conexao,$sql);  
			OCIExecute($stmt) ; 
			OCIfetchstatement($stmt,$Roles) ; 
			$Role=$Roles["ROLE"] ; 
			$_SESSION["ROLESUSUARIO"]=$Role;
			# Registra na sessão o Array com as roles do usuário
			//session_register('Role') ;
			@$_SESSION['Role'] 	= $Role;
			# Consulta a tabela de aplicações 
			$ConexaoSessao = @OCILogon(Conexao("TRF1",10), Conexao("TRF1",11), Conexao("TRF1",1));
			if ($ConexaoSessao == false)
				$ConexaoSessao = @OCILogon(Conexao("TRF1",4), Conexao("TRF1",5), Conexao("TRF1",1));							
					elseif ($ConexaoSessao == false)
						$ConexaoSessao = @OCILogon(Conexao("TRF1",2), Conexao("TRF1",3), Conexao("TRF1",1));						
							elseif ($ConexaoSessao == false)
								$ConexaoSessao = @OCILogon(Conexao("TRF1",8), Conexao("TRF1",9), Conexao("TRF1",1));
									elseif ($ConexaoSessao == false)
										$ConexaoSessao = OCILogon(Conexao("TRF1",6), Conexao("TRF1",7), Conexao("TRF1",1));			
			/*
			# Consulta a tabela de aplicações 
			$ConexaoSessao = @OCILogon(Conexao("TRF1",6), Conexao("TRF1",7), Conexao("TRF1",1));
			*/
			
			$sql="SELECT  WEAP_ROLE , WEAP_URL, WEAP_URL_SECAO FROM WEB_APLICACAO WHERE WEAP_SIGLA='$autenticacao' " ;
			$stmt=@ociparse($ConexaoSessao,$sql);  
			OCIExecute($stmt) ;  
			OCIfetchstatement($stmt,$Dados) ; 
			$Regra=@$Dados["WEAP_ROLE"][0];
			$Url= @$Dados["WEAP_URL"][0];
			$UrlSecao= @$Dados["WEAP_URL_SECAO"][0];	
	
			# Declara variáveis necessárias para abrir o arquivo do tipo PDF 
			#Caso a aplicação só queira validar o acesso 

			
			for($i =0 ;$i < sizeof($Role) ; $i ++)
			{  
				if($Role[$i]==$Regra)
				{  
				if(($UrlSecao!="")&&($DominioBco!="TRF1")){
					if($Url!=$UrlSecao)
						$redirect=$UrlSecao;
					else
						$redirect=$Url; 
				}
				else
					$redirect=$Url; 
				break ;
				}  
				
			} 	
			
			@ocilogoff($ConexaoSessao);
			@ocilogoff($conexao);
			# Verifica se o usuario tem acesso a aplicação 
			if (!isset($redirect) || $redirect === "")
			{
				?> 
				<script type="text/javascript">
				alert("Esse usuário não possuiu acesso");		
				document.location.href = 'principal.php';
				</script>
				<?php
			
			}    
			else  
			{  			 
				# Registra o usuário autenticado o array com as roles do mesmo  
				$Sistema=$autenticacao;
			
				# Guarda o registro dos dados do domínio usuário logado
				@$_SESSION['domUserLogon'] 		= "";
				@$_SESSION['descDomUserLogon'] 	= "";
				@$_SESSION['codDomUserLogon'] 	= "";
				/*
				@session_unregister('domUserLogon');
				@session_unregister('descDomUserLogon');
				@session_unregister('codDomUserLogon');
				/**/							
				
				$domUserLogon = $Dominio;
				$descDomUserLogon = (isset($DescSecao[$domUserLogon]) ? $DescSecao[$domUserLogon] : "");
				$CPFPROCESSOCPWSECAO = "[" . @$descDomUserLogon . "]";
				$loginCH = $login;
				$codDomUserLogon = $DominioCodigo;
				
				#Registra as sessões do usuário
				#Registra as sessões do usuário
				@$_SESSION['Sistema'] 	= $Sistema;
				@$_SESSION['login'] 	= $login;
				@$_SESSION['loginCH'] 	= $loginCH;
				/*session_register('Sistema') ;
				session_register('login') ;
				session_register('loginCH') ;
				/**/
				
				# Atualiza na sessão a descrição do Banco de dados do usuário logado
				@$_SESSION['domUserLogon'] 			= $domUserLogon;
				@$_SESSION['descDomUserLogon'] 		= $descDomUserLogon;
				@$_SESSION['codDomUserLogon'] 		= $codDomUserLogon;
				@$_SESSION['CPFPROCESSOCPWSECAO'] 	= $CPFPROCESSOCPWSECAO;
				/*
				@session_register('domUserLogon') ;
				@session_register('descDomUserLogon');				
				@session_register('codDomUserLogon');	
				@session_register('CPFPROCESSOCPWSECAO');
				/**/
			if (isset($redirect)) {

				$dominios=$_SESSION['infos'];
				if($login=="TR300517"||$login=="TR25093ES"|| $login="TR25027ES" ||$login=="TR300802"||$login=="TR300872"){              //Matricula que pode acessar todas as regiões
					$redirect = "/Setorial/Conciliacao/gerenciamento.php"; 
				}
					?> 
				
				<script language="javascript1.2">
					
				window.open().document.location.href='<?php echo $redirect ?>';  	
				window.close();
				header("Location:login.php");
				
				</script>

				<?php	
				
				
			}			
			//echo "<!-- $login -->";
				
		} 
	  } 
	}  
###############################################################################	
# Fecha  a Conexao  	
	@ocilogoff($conexao) ;  
}

###############################################################################
# Exibe tela para o usuario entrar com os dados de usuario e senha 

	
	?>  

	<script>

		function MostraAjuda(ajuda){
			MM_showHideLayers('NomeUsuario','','hide');
			MM_showHideLayers('AjudaPesquisa','','hide');
			MM_showHideLayers('AjudaArquivo','','hide');
			MM_showHideLayers('AjudaOrdenacao','','hide');
			MM_showHideLayers('AjudaPasta','','hide');
			MM_showHideLayers('AjudaPeriodo','','hide');
			
			MM_showHideLayers(ajuda,'','show');
		}
		function EscondeCombos(v){
			mostra=(v==0)?'hidden':'visible';
			document.formulario.Dominio.style.visibility=mostra;
		}

	</script>

	<script>

		function Critica(){ 
			if(document.formulario.Login.value==""){
			alert('<?php echo $AUTENTICACAO_ERRO07 ?>');
			document.formulario.Login.focus();
			}else if(document.formulario.senha.value==""){
				alert('<?php echo $AUTENTICACAO_ERRO12 ?>');
				document.formulario.senha.focus();
			}else{
				document.formulario.submit();
			}
		}

		function Enter(x){
			if(x==13){
				Critica();
			}
		}

		function MostraAjuda(ajuda){
			MM_showHideLayers('NomeUsuario','','hide');
			MM_showHideLayers('AjudaPesquisa','','hide');
			MM_showHideLayers('AjudaArquivo','','hide');
			MM_showHideLayers('AjudaOrdenacao','','hide');
			MM_showHideLayers('AjudaPasta','','hide');
			MM_showHideLayers('AjudaPeriodo','','hide');
			
			MM_showHideLayers(ajuda,'','show');
		}

		function EscondeCombos(v){
			mostra=(v==0)?'hidden':'visible';
			//document.form1.CCata.style.visibility=mostra;
			document.formulario.Dominio.style.visibility=mostra;
			//document.formulario.Ordem3_Sel_Ord.style.visibility=mostra;
			//document.form1.DatAltera.style.visibility=mostra;	
		}

	</script>

	<center>
	<title>

<?php
	# Array com o nome das Seções Judiárias
	# Array com o nome do banco de dados
	global $DominioBancoSecao,$idxsecao;
	$DominioBancoSecao = array();
	$idxsecao = 0;		
	function NovaSecao($Cod = "",$Ban = "",$Sg = "",$Nm = "",$Desc = ""){
            global $DominioBancoSecao,$idxsecao;
            $DominioBancoSecao[sizeof($DominioBancoSecao)]=array(
                "Codigo"	=>	"",
                "Banco"		=>	"",	
                "Sigla"		=>	"",
                "Nome" 		=> 	"",
                "Descricao"	=>	""
            );
          	$DominioBancoSecao[$idxsecao]["Codigo"] = $Cod;
            $DominioBancoSecao[$idxsecao]["Banco"] 	= $Ban;
            $DominioBancoSecao[$idxsecao]["Sigla"] 	= $Sg;
            $DominioBancoSecao[$idxsecao]["Nome"] 	= $Nm;
            $DominioBancoSecao[$idxsecao]["Descricao"] 	= $Desc;
            $idxsecao++;
      

        }
	while(list($key, $val) = each($SecaoSubsecao_Array)){
                if($key == "100")continue;
		$BncS   = DadoSecao($key,'Tns');
		$NomS   = NomeSecao($key);
		$ComplNomsRed = "" 
		. ( !strpos(strtolower($NomS), "ubse")===false ? "&nbsp;&nbsp;&nbsp;" : "");
		$NomsRed = str_replace("Subseção Judiciária de","",str_replace("Seção Judiciária de ","",str_replace("Seção Judiciária da ","",str_replace("Seção Judiciária do ","",$NomS))) );
		$NomsRed = str_replace("Tribunal Regional Federal da 1ª Região","TRF&nbsp;1ª&nbsp;REGIÃO",$NomsRed);
		$NomsRed = strtoupper($NomsRed);
		$NomsRed = str_replace("&NBSP;","&nbsp;",$NomsRed);
		NovaSecao($key,$BncS,$val,$ComplNomsRed . trim($NomsRed),$NomS);
	}

	$IpRemoto=$HTTP_SERVER_VARS["REMOTE_ADDR"]; 
	$IpRemoto=substr($IpRemoto,4,2) ;  
	
	$DescSecaoIpRemoto["17"]  = "JFAC" ; 
	$DescSecaoIpRemoto["18"]  = "JFAP" ; 
	$DescSecaoIpRemoto["19"]  = "JFAM" ; 
	$DescSecaoIpRemoto["20"]  = "JFBA" ; 
	$DescSecaoIpRemoto["21"]  = "JFDF" ; 
	$DescSecaoIpRemoto["22"]  = "JFGO" ; 
	$DescSecaoIpRemoto["23"]  = "JFMA" ; 
	$DescSecaoIpRemoto["24"]  = "JFMT" ; 
	$DescSecaoIpRemoto["25"]  = "JFMG" ; 
	$DescSecaoIpRemoto["26"]  = "JFPA" ; 
	$DescSecaoIpRemoto["27"]  = "JFPI" ; 
	$DescSecaoIpRemoto["28"]  = "JFRO" ; 
	$DescSecaoIpRemoto["29"]  = "JFRR" ; 
	$DescSecaoIpRemoto["30"]  = "JFTO" ; 
	$DescSecaoIpRemoto["1001"]= "TRF da 1ª Região";
	$Secao = $DescSecaoIpRemoto["1001"];
	
	if(isset($DescSecaoIpRemoto[$IpRemoto])) {
		$Secao = $DescSecaoIpRemoto[$IpRemoto];	
	}
	
	
	if($Secao=="TRF da 1ª Região")  {
	
		echo "</title>";
		
		$_SESSION['infos'] = $DominioBancoSecao;

    } else {

		echo "</title>";
 
    }
	


?>