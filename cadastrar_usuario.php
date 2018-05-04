<!DOCTYPE html>
<html>

	<head>
		<meta charset="ISO-8859-1">
		  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<style>
			.table_container{ overflow:auto; width: 500px;height: 200px; }  
			#table-scroll {
			  width:987px;
			  height:270px;
			  overflow:auto;
			}
			#box{
			  width: 100%;
			}
			.span {
			color: #ff0800;
			}
	</style>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		     
	</head>
	
	<body>
		<center>
			<center>
				<form method="POST" action="executa_cadastro.php">
					<table border="1" align="center"><br>
					<center><span class="span"> * Campos Obrigat&oacute;rios *  </span><br></center>
					<br>

						<?
							include "conecta.inc";
							$conexao=$_SESSION['conexao'];
							$perfil=$_SESSION['perfil'];
							$lotacao=$_SESSION['lotacao'];
							$codigo_local =$_SESSION['codigo_local'];
							$vara=$_SESSION['vara_user'];
							$query = "SELECT var_ds_vara from p_vara where var_sesu_cd_secsubsec = '$codigo_local'";
							$resultado = ociparse($conexao, $query);
							ociexecute($resultado);
							$linha=oci_fetch_array($resultado);
							
							//var_dump(utf8_decode($linha[0]));
							//exit;
						?>
						<tr>
							<td align="left" width="50%" ><font size=\"3px\"><span class="span">*</span> Matr&iacute;cula: </font></td>
							<td align="left" width="50%">
								<input type="text" required name="nova_matricula" id="nova_matricula" style='width: 396px;' autofocus>
							</td>
						</tr>
						<!--adicionado o campo nome no dia 28-07-->
						<tr>
							<td align="left" width="50%" ><font size=\"3px\"><span class="span">*</span> Nome: </font></td>
							<td align="left" width="50%">
								<input type="text" required name="novo_nome" style='width: 396px;'>
							</td>
						</tr>
						<!--adicionado o campo nome no dia 28-07-->
						<tr>
							<td align="left" width="50%"><span class="span">*</span> Perfil: </td>
							<td align="left" width="50%">
								<select name="novo_perfil" style='width: 400px;'>
									<?php
										if($perfil=="Diretor"){
									?>
											<option value="Usuario" > Usu&aacute;rio Comum </option>
									<?php
										}
									?>
									<?php
										if($perfil == "CEJUC" || "DIATU"){
									?>  
											<option value="Usuario"> Usu&aacute;rio Comum</option>
											<option value="Diretor"> Diretor de Vara </option>
											<option value="CEJUC"> Diretor do CEJUC/SECON</option>
									<?php
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<?
							if ($linha[0]==false)
							{ 
							?><!--Se n&atilde;o houver vara para a localidade esse campo n&atilde;o é obrigatório-->
								<td align="left" width="50%">Vara:</td>
								<td align="left" width="50%">
							<? 
							}
							else if($linha[0]!=false)
							{ ?><!--Se houver vara para a localidade esse campo é obrigatório-->
								<td align="left" width="50%"><span class="span">*</span> Vara:</td>
								<td align="left" width="50%">
							<?
							}
							?>
								<select required name="vara_usuario" style='width: 400px;'>
									<option id="null" value="" disabled selected>Selecione</option>
										<?
									if ($codigo_local=="100"||$codigo_local=="1000")
									{ 
									?>
                                    <option value="CEJUC"> CEJUC</option>
									<?php
									}
									else
									{
										while ($linha=oci_fetch_array($resultado))
										{
											echo "<option value=".$linha[0].">".$linha[0]."</option>";
										}
									} ?>
								</select>
							</td>
						</tr>
					</table>
					<center>
<br>
						<input type="submit" class="button2" name="Cadastrar" value="Cadastrar" id="cadastrar">
					</center>
				</form>
			</center>
		<br><br>

			<?php

				$query="SELECT matricula, perfil, sigla_localidade,vara, nome from setorial.Usuarios where sigla_localidade = '$lotacao'"; 
				$resultado=ociparse($conexao, $query);  
				ociexecute($resultado);
			?>
			<?
			$query1 = "SELECT nome from setorial.Usuarios where sigla_localidade = '$lotacao'"; 
			$resultado1=ociparse($conexao, $query1);  
			ociexecute($resultado1);
			$cont = 0;
			while($linha1=oci_fetch_array($resultado1))
			{ 
			$cont++;
			}
			?>
			<center>
				<table   "margin:0 auto; width:987px" style="border:none">
					<thead>
					<tr>
						<th style="background-color:white; border:none; width:33%"></th>
						<th style="background-color:white; border:none; width:33%; color:#666666;align:center;">
								Usu&aacute;rios cadastrados 
						</th>
						<?if($cont>=13){?>
						<th style="background-color:white; border:none; width:33%; text-align: right;">
							<input  type="text" id="myInput" onkeydown="myFunction(this);" placeholder="Digite o nome" title="Para uma busca mais precisa tecle Enter." style="background: url('icone_busca.png') left center no-repeat rgb(255, 255, 255); text-indent: 23px;">				
						</th>
						<?}else{?>
						<th style="background-color:white; border:none; width:33%"></th>
						<?}?>
					</tr>
				</table>
				<font size="3"> 
				<!-- --><table>
					<table border="1" align="center" "margin:0 auto; width:987px" style="text-align" >
					<thead>
						<tr>
							<th style='width: 130px;border-bottom-color:#285994;'>Matr&iacute;cula</th>
							<th style='width: 330px;border-bottom-color:#285994;'>Nome</th>
							<th style='width: 260px;border-bottom-color:#285994;'>Perfil</th>
							<!--<th width="86px">Lotaç&atilde;o</th>-->
							<th style='width: 100px;border-bottom-color:#285994;'>Vara</th>
							<th style="text-align: center;border-bottom-color:#285994;" > - </th>
						</tr>
					</table>
				</font>
				<div id="box">
					<div id="table-scroll">
						<table style="margin:0 auto; width:100%" cellspacing="0" cellpadding="0" border="0" align="center" id="myTable">	
									<!--<div  style="width:920px; height:400px; overflow:auto;">-->
										<center>								
												<?php
												
													//echo "<tr  style=\"background-color:#285994; color: white; font-size:13px; padding:5px; border-radius: 5px; text-decoration:none\">";
														while($linha=oci_fetch_array($resultado)) { 
															echo "<tr>\n";

															if($perfil == 'CEJUC') {
																echo "<td width=\"130px\">$linha[0] </td>\n";
																echo "<td width=\"330px\">$linha[4]</td>\n";
																if($linha[1] == 'Diretor') {

																	echo "<td width=\"260px\">Diretor de Vara </td>\n";

																} else if ($linha[1] == 'CEJUC') {

																	echo "<td width=\"260px\">Diretor do CEJUC/SECON </td>\n";

																} else if ($linha[1] !== 'DIATU'){

																	echo "<td width=\"260px\">$linha[1] </td>\n";
																}
																//echo "<td width=\"86px\">$linha[2] </td>\n";
																echo "<td width=\"100px\">$linha[3]</td>\n";
																$concatena='<td>
																<center>
																	<a href="apagar_usuario.php?matricula=' . $linha[0] . '" onclick="return confirm(\'Confirma a exclus&atilde;o?\')" style="background-color:#285994;color: white; font-size:13px; padding:5px; border-radius: 5px; text-decoration:none">
																		Apagar
																	</a>
																	</font>
																	</center>
																		</td>'; 
																echo $concatena;
																														
															} else if ($perfil == 'DIATU') {

																echo "<td width=\"130px\">$linha[0] </td>\n";
																echo "<td width=\"330px\">$linha[4]</td>\n";
																if($linha[1] == 'Diretor') {

																	echo "<td width=\"260px\">Diretor de Vara </td>\n";

																} else if ($linha[1] == 'CEJUC') {

																	echo "<td width=\"260px\">Diretor do CEJUC/SECON </td>\n";

																} else {

																	echo "<td width=\"260px\">$linha[1] </td>\n";
																}
																
																echo "<td width=\"100px\">$linha[3]</td>\n";
																$concatena='<td>
																<center>
																	<a href="apagar_usuario.php?matricula=' . $linha[0] . '" onclick="return confirm(\'Confirma a exclus&atilde;o?\')" style="background-color:#285994;color: white; font-size:13px; padding:5px; border-radius: 5px; text-decoration:none">
																		Apagar
																	</a>
																	</font>
																	</center>
																		</td>'; 
																echo $concatena;
															} else if($perfil=='Diretor') {

															/*O perfil Diretor de vara só de enxerga usuários da mesma lotação e mesma vara que ele. Obs: Diretor CEJUC enxerga todos da lotação independente de vara(como está hoje).*/
															
																if($linha[3] == $vara) {
																	echo "<td width=\"130px\">$linha[0] </td>\n";
																	echo "<td width=\"330px\">$linha[4]</td>\n";
																	if($linha[1]=='Diretor') {
																		echo "<td width=\"260px\">Diretor de Vara </td>\n";
																	}
																	else if ($linha[1]=='CEJUC') {
																		echo "<td width=\"260px\">Diretor do CEJUC/SECON </td>\n";
																	}
																	else {
																		echo "<td width=\"260px\">$linha[1] </td>\n";
																	}
																	echo "<td width=\"100px\">$linha[3]</td>\n";
																	$concatena='<td>
																	<center>
																		<a href="apagar_usuario.php?matricula=' . $linha[0] . '" onclick="return confirm(\'Confirma a exclus&atilde;o?\')" style="background-color:#285994;color: white; font-size:13px; padding:5px; border-radius: 5px; text-decoration:none">
																			Apagar
																		</a>
																		</font>
																		</center>
																			</td>'; 
																	echo $concatena;
																}
															}
															echo "</tr>\n";
														}
													//echo "</tr>\n";
												?>
										</center>
									<!--</div>-->
						</table>
					</div>	
				</div>	
				</table>
			</center>
		</center>
	</body>
	
</html>