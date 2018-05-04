<html>
	<header>
		<style>
		
			.alert {
				padding: 20px;
				background-color: #4CAF50; /* Red */
				color: white;
				margin-bottom: 15px;
			}

		</style>
	</header>


	<?php
		include "conecta.inc";
		
		$matricula		=$_POST['nova_matricula'];
		$nome			=$_POST['novo_nome'];
		$conexao		=$_SESSION['conexao'];
		$novo_perfil	=$_POST['novo_perfil'];
		$vara_usuario	=$_POST['vara_usuario'];
		$lotacao		=$_SESSION['lotacao'];    

		
		if (empty($matricula))
		{
			 echo "<script language='javascript' type='text/javascript'>alert('Erro na inserção! Campo Matrícula vazio.');window.location.href='principal.php';</script>";
		} 
		else if (empty($novo_perfil))
		{
			echo"<script language='javascript' type='text/javascript'>alert('Erro na inserção! Campo Perfil vazio.');window.location.href='principal.php';</script>";
		}		
		else if (empty($nome))
		{
			echo "<script language='javascript' type='text/javascript'>alert('Erro na inserção! Campo Nome vazio.');window.location.href='principal.php';</script>";
		} 
		else 
		{
			if($novo_perfil == 'CEJUC')
			{
				$vara_usuario = 'CEJUC';
			} 
		}

		$matricula  =  strtoupper($matricula); 
		$consulta   =  "SELECT matricula FROM setorial.usuarios WHERE matricula='$matricula'";
		$resultado_consulta = ociparse($conexao, $consulta);   
		ociexecute($resultado_consulta);

		$registro = oci_fetch_array($resultado_consulta);
		//$registro = false

		if($registro != false) 
		{
			echo"<script language='javascript' type='text/javascript'>alert('Essa matrícula já está cadastrada.');window.location.href='principal.php';</script>";
		}
		else 
		{
			/**/
			$inserir = "INSERT into setorial.Usuarios (matricula, perfil, sigla_localidade, vara, nome) VALUES (UPPER('$matricula'),'$novo_perfil', '$lotacao', '$vara_usuario',UPPER('$nome'))";
			//$inserir = "INSERT into setorial.Usuarios (matricula, perfil, sigla_localidade,vara,) VALUES (UPPER('$matricula'), '$novo_perfil', '$lotacao', '$vara_usuario')";
			$inserir=ociparse($conexao, $inserir);
			ociexecute($inserir);
			ocicommit($conexao);
			echo "<script language='javascript' type='text/javascript'>alert('Cadastro Efetuado com Sucesso!');window.location.href='principal.php';</script>";
		}
			/*} if ($inserir) {
				
					echo"<script language='javascript' type='text/javascript'>alert('TESTE1!');window.location.href='principal.php';</script>";
					
					} else {
						
						echo '<script language="javascript">alert("Ops! Erro ao cadastrar o Usuário. veja a sintax")</script>';
					}			}*/
	?>

</html>
