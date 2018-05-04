<html>
<head>
<meta charset="ISO-8859-1">
<style> 
.alert {
    padding: 20px;
    background-color: #4CAF50; /* Red */
    color: white;
    margin-bottom: 15px;
}
.alert.info {background-color: #2196F3;}

/* The close button */
.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
    color: black;
}
.table1 {
	width: 90%;
    border:5;
}
.td1 {
	font-size: 18px;
    padding: 14px;
    text-align: left;
    border-bottom: none;
}
.td2 {
    padding: 10px;
    text-align: left;
    border-bottom: none;
}
.tdFooter {
    padding: 10px;
    text-align: left;
    border-bottom: none;
	weight =33%;
}
.tr1:nth-child(even){background-color: #f2f2f2}
.tr1:hover{background-color:#cccccc;}
</style>

</head>
	<div id="tabela_resultados">
	<?php
		include "conecta.inc";

		$homologados = 0; 
		$id=$_GET["id"];
		$data_aud=$_GET["data"];
		$assunto=$_GET["assunto"];
		$conciliador=$_GET["conciliador"]; 
		$sala=$_GET['sala'];
		$entidade=$_GET['entidade'];
		$conexao=$_SESSION['conexao'];
		$total_disponivel=$_GET['total_disponivel'];
		$horario=$_GET['horario'];
		$total=$_GET['total'];
		$atualizado=$_GET['atualizado'];
			  if($atualizado==1){
		?>
		 <div id=alerta class="alert">
			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
			  Resultado atualizado com sucesso!
		</div>
		<?php
		} else if($atualizado==2){
		?>
		 <div id=alerta class="alert info" background-color:"#4CAF50">
			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
			  Valor atualizado com sucesso!
		</div>
		<?php
		}
		$perfil=$_SESSION['perfil'];
		$lotacao=$_SESSION['lotacao'];
		$naorealizada=utf8_decode("Nao Realizada");    
		if ($total==$total_disponivel) { 
		   echo "<script>function fechaModal() {
			   $('#myModal').modal('close');
		   } fechaModal();</script>";
		}
			$query1="SELECT DATA from setorial.Controle WHERE ID=$id";
				
			$resultado1=ociparse($conexao, $query1);
				
			ociexecute($resultado1);
			$data=oci_fetch_array($resultado1);
				
			$query="SELECT 	Codigo, Processo, Vara, 
								Parte, Horario, Resultado,
								Valor
								from setorial.Audiencias 
								WHERE ID=$id and estado='ATIVO' 
								ORDER BY Horario ASC";
								
			$resultado=ociparse($conexao, $query);
			ociexecute($resultado);
		//echo "<h3>".utf8_decode("Audi�ncias do(a) ")."" .utf8_decode($entidade)." - assunto" .utf8_decode($assunto)." - dia " .utf8_decode($data_aud)." - ".utf8_decode($sala)."</h3>";
		
		echo "</table class=\"table1\" style=\"margin:0 auto\">";
			echo "<table class=\"table1\" style=\"margin:0 auto\">";
				echo "<tr class=\"tr1\">\n";
					echo 	"<td class=\"td1\">Conciliador:$conciliador </td>\n";
					echo 	"<td class=\"td1\">Sala:$sala</td>\n";
				echo "</tr class=\"tr1\">\n";
			echo "</table>";
			
			echo "<table class=\"table1\" style=\"margin:0 auto\">";
				echo "<tr class=\"tr1\">\n";	
					echo 	"<td class=\"td1\">Processo</td>\n";
					echo 	"<td class=\"td1\">Hor�rio</td>\n";
					echo 	"<td class=\"td1\">Data</td>\n";
					echo 	"<td class=\"td1\">Resultado</td>\n";
					echo 	"<td class=\"td1\">Valor Acordado</td>\n";
				echo "</tr class=\"tr1\">\n";
			
				echo "<tr class=\"tr1\">\n";	
					while($linha=oci_fetch_array($resultado)){			
					echo 	"<td class=\"td2\"> $linha[1] </td>\n";  	//Processo	
					echo 	"<td class=\"td2\"> $linha[4] </td>\n";		//Hor�rio
					echo 	"<td class=\"td2\"> $data[0] </td>\n";		//Data
				
				
					echo 	"<td class=\"td2\">
								<form method=\"POST\" accept-charset=\"utf-8\" name =\"verificaform\"id=\"verificaform\"action=\"javascript:atualizaResultado(this);\">  
									<input type=\"hidden\" name=\"id\" id =\"id\" value=\"$id\">						
									<input type=\"hidden\" name=\"codigo\" id =\"codigo\" value=\"$linha[0]\">
									<input type=\"hidden\" name=\"processo\" id =\"processo\" value=\"$linha[1]\">
									<input type=\"hidden\" name=\"conciliador\" id =\"conciliador\" value=\"$conciliador[1]\">
									<select name='resultado' onchange=\"this.form.submit()\">"; // AtualizaResultado.php?codigo=$linha[0]&processo=$linha[1]    
								
				  //echo "<td class=\"td2\"><form method=\"POST\" id=\"verificaform\" action=\"AtualizaResultado.php?codigo=$linha[0]&processo=$linha[1]\"name='resultado'><select name='resultado' onchange=\"this.form.submit()\">";
								if($linha[5]=="Valor Atual"){
									echo 	"<option value='Valor Atual]' selected=\"selected\"> 
												$linha[5]
											</option>";
								} else {
									echo "<option value=''>  </option>"; 
								}      
								if($linha[5]=="Sem Acordo"){	
									echo "	<option value='Sem Acordo' selected=\"selected\"> 
												Sem Acordo
												</option>";
								} else {	
									echo "	<option value='Sem Acordo'> 
												Sem Acordo
											</option>";  
											
								}      
								if($linha[5]=="Com Acordo"){
									echo "	<option value='Com Acordo' selected=\"selected\"> 
												Com Acordo
											</option>";
									echo "$homologados += $homologados;";
											
								} else {	
									echo "	<option value='Com Acordo'> 
												Com acordo
												</option>";   
								}
								if($linha[5]=="Redesignada"){
									echo	"<option value='Redesignada' selected=\"selected\"> 
												Redesignada
											</option>";
								} else {
									echo 	"<option value='Redesignada'> 
													Redesignada
											</option>";   
									}
								if($linha[5] == utf8_decode("N�o Realizada")){
									echo 	"<option value='N�o Realizada' selected=\"selected\">
												N�o Realizada
											</option>";
								} else {
									echo 	"<option value='N�o Realizada'>
												N�o Realizada
											</option>";   
									}
									
					echo "	</td class=\"td2\">\n
								</form>";
								
								echo "	<td class=\"td2\">
											<form method=\"POST\" name =\"atualiza_valor\" id=\"atualiza_valor\" action=\"javascript:atualizaValor(this);\">"; 
								echo"			<input type=\"hidden\" name=\"id\" id =\"id\" value=\"$id\">  
												<input type=\"hidden\" name=\"codigo\" id =\"codigo\" value=\"$linha[0]\">  
												<input type=\"hidden\" name=\"processo\" id =\"processo\" value=\"$linha[1]\">;
												<input type=\"hidden\" name=\"conciliador\" id =\"conciliador\" value=\"$conciliador\">";
														
								echo 			"<input name =\"resultado_valor\" type=\"number\" min=\"0\" step=\"any\" size=\"10\" id=\"money\"class=\"money-bank\"value=\"$linha[6]\"
																												onkeypress=\"javascript:submitOnEnter(this, event);\">&nbsp;&nbsp;&nbsp;"; 
								echo			"<button type=\"submit\" class=\"button2\" cadastrar='1' onClick=\"atualizaValor(this);\"> 
													Atualizar
												</button>";  
								echo 	"</td class=\"td2\">
											</form>"; 		
				echo "</tr class=\"tr1\">\n";									
			}
			echo "</table class=\"table1\" style=\"margin:0 auto\">";
			
		echo "</table class=\"table1\" style=\"margin:0 auto\">";
	
				//if ($lotacao==$linha[2] /*OR $perfil=="Diretor"*/) { 
			/*}
				else { echo "<td>-</td>"; }*/
			
			/*echo "<table class=\"table1\" style=\"margin:0 auto\">";
				echo "<tr class=\"tr1\">\n";
					echo 	"<td class=\"td1\">Valor Total: $valor_total </td>\n";
					echo 	"<td class=\"td1\">N� Acordos Homologados: $homologados </td>\n";      //FOOTER
					echo 	"<td class=\"td1\">% de Acordos Homologados</td>\n";
				echo "</tr class=\"tr1\">\n";
			echo "</table>";*/
			
		
	
		/*echo "<table class=\"table1\" style=\"margin:0 auto\">";
			echo "<tr class=\"tr1\">\n";
				//echo  "$linha[]";
			echo "</tr class=\"tr1\">\n";
		echo "</table>";*/
			//echo "<center><input class=\"button2\" type=\"submit\" name=\"Salvar\" value=\"Salvar\" id=\"Salvar\"></center>";
			
		echo "<br><br>";
	?>

	</div>
	<br>
	<br>
	<center>
		<button target="_blank" 
				class="button2" 
				onclick="printDiv2('tabela_resultados')" 
				value="Imprimir" 
				style="padding:10px;margin:10px">Imprimir
		</button>
	</center>
	<script>
		   function fechaModal() {
			   $('#myModal').modal('close');
		   }
	</script>