<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>

<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
?>

<html>

 	<head>
		<meta charset="ISO-8859-1">
		<title>Sistema de Agendamento de Audiências de Conciliação</title>
		<?php include 'includes/head.php'; ?>

		<link rel="stylesheet" href="css/reset.css">
		<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
	</head>

  <body>

	<div id="header">
		<?php 
			include 'includes/topo.php'; 
		?>		
	</div>
	
	<div class="pen-title">
		<img src="icone-siac.png" alt="Logo do TRF 1ª Região">
		<h1>
			Sistema de Agendamento de Audiências de Conciliação
		</h1>
	</div>

	<!-- <div class="container-fluid">
	    <form>
	    	<div class="card border-dark rounded-0" style="width: 450px; margin: 0 auto;">
	    		<div class="card-body" style="background: #e9e9e9; border-color: #285994;">
			    	<div class="form-group">
				    	<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1" style="background: #285994; color: white; width: 100px;">Matrícula</span>
							<input type="text" class="form-control" id="login" aria-describedby="login" style=" width: 250px;">
						</div>
			    	</div>

			    	<div class="form-group">

						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1" style="background: #285994; color: white; width: 100px;">Senha</span>
							<input type="text" class="form-control" id="senha" aria-describedby="senha" style=" width: 250px;">
						</div>

					</div>
			    </div>
	    	</div>
	    </form>
	</div> -->
<?php
	
	$Aplicacao = 'AACON';
	
		if (!isset($_SESSION['Sistema']) || $_SESSION['Sistema'] != $Aplicacao) {
            # Exibe a tela de autenticacao 
			
            echo ("	<script>\n
			
						altura= ((screen.width) - 300) /2 ;\n
						largura=((screen.height) - 350) /2 ;\n
						window.open('TRF1_Autenticacao.php?opcaoTRF1=1&tela=ok&autenticacao=$Aplicacao&grupo=','','top='+largura+',left='+ altura +',width=400,height=250,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no');\n
						//autenticacao('$Aplicacao');\n
						
                    </script>\n");
            exit();
            
        } else {
			header("Location:login.php");
		}

?>
  
  
    
  </body>
</html>

