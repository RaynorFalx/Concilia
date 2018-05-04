<!DOCTYPE html>

<html>

    <head>
		<meta charset="ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="sistema e-SiAC">
		<meta name="author" content="TRF1">
		<link rel="shortcut icon" href="icone-siac.png" type="image/x-icon" />
        <title> Resultados </title>
		
        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
        <link rel="stylesheet" href="css/reset.css">    
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap2.css" >
        <link rel="stylesheet" href="css/blueprint/src/result.css" >

         
        <script src="jquery.min.js"></script>
        <script src="./js/js_plugins/bootstrap.min.js" type="text/javascript"></script>
        <script src="./plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
        <script src="js/index.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="jquery.mask.min.js"></script>
    
       
       <!-- <script type="text/javascript" src="jquery.js"></script> -->
		<style type="text/css">
			@media print 
			{    
				.no-print { display: none; }
				.print 
				{ 
				display: block; 
				background-color: #ffffff;	
				color: black;
				}
				.size{ width:100% }
				.td4 { display: none; padding: 10px; text-align: center; border-bottom:1; border:1; }
				teste
				{
					padding: 10px;
					text-align: left;
					border-bottom: none;
					background-color: #ffffff;
					color: black;
				}

			}
			.hidden { visibility: hidden; }	 
		</style> 
    </head>
    
    <body>
    
        <?php

			include "conecta.inc";
			$localidade 	  = $_SESSION['localidade'];
			$conexao          = $_SESSION['conexao'];
			//$_SESSION['id_resultado'] = 
			$codigo           = $_POST['data-codigo'];
			$id               = $_POST['data-ID'];
			//$id = $_SESSION['id_resultado'];
			$data_aud         = $_POST['data-date'];
			$assunto          = $_POST['data-assunto'];
			$conciliador      = $_POST['conciliador'];
			$sala             = $_POST['sala'];
			$entidade         = $_POST['data-entidade'];
			$total_disponivel = $_POST['data-total_disponivel'];
			$horario          = $_POST['horario'];
			$total            = $_POST['total'];
		//	$perfil			  = $_POST['data-perfil'];//

			/*$array1 = array("10:00", "10:20", "10:40", "11:00", "11:20");
			$array2 = array("10:00", "10:20");

			$i = 0;

			while ($i < 5) {
				echo $array1[$i] . "<br>";
				$i ++;
			}*/


			//$consulta_data="SELECT DATA from setorial.Controle WHERE ID=$id";
			//$resultado_data = ociparse($conexao, $consulta_data);
			//ociexecute($resultado_data);
			//$data=oci_fetch_array($resultado_data);

			$consulta = "   SELECT  Codigo, Processo, Vara, 
									Parte, Horario, Resultado,Valor
									FROM     setorial.Audiencias 
									WHERE ID=$id and estado='ATIVO'  
									ORDER BY Horario ASC";


			$resultado_consulta = ociparse($conexao, $consulta);
			ociexecute($resultado_consulta);

		?>
   <div id="imprimir">
 <div class="pen-title">
			<br><br>
			<img src="icone-siac.png" alt="Logo do TRF 1ª Região">
			<span>
				<br>
				<h1> Sistema de Agendamento de Audi&ecirc;ncias de Concilia&ccedil;&atilde;o  </h1>
						<?echo urldecode($localidade);?>
		   </span>
		</div>
		<br><br><br>
		<center>
			<h1> 
				<font size="5px">
						Resultados
				</font>
			</h1>
		</center>
		</br>
        
        <div id="resultados">


			<table  class="table1" style="margin:0 auto">
			<thead>

				<tr class="tr1"> 
					
					<td class="teste" id="1" style="width:246px; background-color: #285994; color: white;">
						<font size="4px">    
							Conciliador: <?php echo urldecode("$conciliador"); ?>  
						</font>
					</td>  
					
					<td   class="teste" style="width:87px; background-color: #285994; color: white;"></td>					
					<td   class="teste" style="width:312px; background-color: #285994; color: white;"></td>
					<td   class="teste" style="width:200px; background-color: #285994; color: white;"></td>
					
					<td  class="teste" style="width:240px; background-color: #285994; color: white;">
						<font size="4px" >
							Sala: <?php echo "$sala"; ?>  
						</font>
					</td>
					<? if($perfil=="CEJUC")
									{?>
					<td class="td4" style="width:50px; background-color: #285994; color: white;"></td>
									<?}?>
				</tr> 
			<!--	</table>
				<table width="100%" class="table1" style="margin:0 auto">-->
				
					<tr  class="tr1">    
						<td align="center"  class="td2">Processo</td>
						<td align="center"  class="td2">Hor&aacute;rio</td>
						<td align="center" 	class="td2">Data</td>
						<td align="center"  class="td2">Resultado</td>
						<td align="center"  class="td2">Valor Acordado</td>
						<? if($perfil=="CEJUC")
						{?>
						<td align="center"  class="td4">    </td>
						<?}?>
					</tr>		
				<?php
					echo "<tr class=\"tr1\">";
						echo "<div id=\"tabelaResultados\">";
						$total = int;
						$ct = 0;
						while ($linha = oci_fetch_array($resultado_consulta)) 
						{
								   
							echo "<td align=\"center\" class=\"td2\" style=\"border-bottom: 1px solid;\"> $linha[1] </td>";
							echo "<td align=\"center\" class=\"td2\" style=\"border-bottom: 1px solid;\"> $linha[4] </td>";
							echo "<td align=\"center\" class=\"td2\" style=\"border-bottom: 1px solid;\"> $data_aud </td>";				
							echo "<td align=\"center\" class=\"td2\" style=\"border-bottom: 1px solid;\">";
							
								echo "<div class=\"div-result\">";

									echo "<form method=\"POST\" class=\"form-result\"  name=\"atualiza_Resultado\" id=\"atualiza_Resultado_$linha[0]\">";

									echo	"<input type=\"hidden\"  form=\"$linha[0]\"  name=\"id\"         id=\"id_result_$linha[0]\" value=\"$id\">";
									echo	"<input type=\"hidden\"  form=\"$linha[0]\"  name=\"codigo\"     id=\"codigo_result_$linha[0]\" value=\"$linha[0]\">";
									echo	"<input type=\"hidden\"  form=\"$linha[0]\"  name=\"processo\"   id=\"processo_result_$linha[0]\" value=\"$linha[1]\">";

									echo	"<select required  form=\"$linha[0]\" cod=\"0\" class=\"select-result\" id=\"result_$linha[0]\" name=\"atualiza_Resultado\">";
											
									echo		"<option  form=\"$linha[0]\" disabled selected hidden value=\"$linha[5]\">$linha[5]</option>";

									echo		"<option  id=\"resultado_$linha[0]\"  form=\"$linha[0]\"  value=\"Com Acordo\">Com Acordo</option>";

									echo		"<option  id=\"resultado_$linha[0]\"  form=\"$linha[0]\"  value=\"Sem Acordo\">Sem Acordo</option>";

									echo		"<option  id=\"resultado_$linha[0]\"  form=\"$linha[0]\"  value=\"Redesignada\">Redesignada</option>";

									echo		"<option  id=\"resultado_$linha[0]\"  form=\"$linha[0]\"  value=\"Nao Realizada\">N&atilde;o Realizada</option>";

									echo	"</select>";
							
										echo "</td>";
							
									echo "</form>";

								echo "</div>";
										  
								echo "<div id=\"divValores\">";
									
									echo "<td align=\"center\"  class=\"td2\" style=\"border-bottom: 1px solid;\">";
									    
										echo "<form method=\"POST\" name=\"atualiza_Valor\" id=\"atualiza_Valor_$linha[0]\">

											<input type=\"hidden\" name=\"id\" id=\"id . i$\" value=\"$id\">
											<input type=\"hidden\" name=\"codigo\" id=\"codigo\" value=\"$linha[0]\">
											<input type=\"hidden\" name=\"processo\" id=\"processo\" value=\"$linha[1]\">

											<font size=\"3px\"> R$ </font> 
											<input type=\"text\" value=\"$linha[6]\" size=\"15px\" mask=\"null\" name=\"novo_Valor\" id=\"novo_Valor_$linha[0]\" class=\"novo_Valor\" novo_Valor=\"$linha[0]\">";
									
									echo "</td>";
								    if($perfil=="CEJUC")
									{
										echo "<td class=\"td4\" style=\"border-bottom: 1px solid;\">";
								
											echo "<button form=\"$linha[0]\" class=\"button2 btn-valor\" >
												Salvar
											</button>";
											
											echo "</form>";
								
										echo "</td>";
									}
							echo "</div>";
							
						echo "</div>";
						
					echo "</tr>";
							
							
							$total += $linha[6];
							$ct ++;
							
						}
						echo "</thead>";
							//echo "</table>";
						echo "<div id=\"tabelaCalculos\">";

						//echo "<table class=\"table1\" style=\"margin:0 auto\">";
						echo "<tr class=\"tr1\"  >\n";
						
						
						echo "<td class=\"teste\" align=\"left\" style=\"  background-color: #285994; color: white\" id=\"acordos\" id=\"acordos\"> 
								<font size=\"4px\" > 
									N&#176; Acordos: 
								</font> 
							</td>\n";
						echo "<td class=\"teste\" align=\"center\" style=\"  background-color: #285994; color: white\" ></td>";
						echo "<td class=\"teste\" align=\"left\" style=\" background-color: #285994; color: white\" id=\"percent\" > 
								<font size=\"4px\" > 
									Percentual de Acordos: 
								</font> 
							 </td>\n";

						echo "<td class=\"teste\" align=\"center\" style=\"  background-color: #285994; color: white\" ></td>";
						echo "<td class=\"teste\" align=\"left\" style=\"  background-color: #285994; color: white\" id=\"total\"> 
								<font size=\"4px\" > 	
									Valor Total: 
								</font> 
							 </td>\n"; // A escrita do texto dessa td é realizada pela função JQuery

						if($perfil=="CEJUC") {
							echo "<td  class=\"td4\" align=\"center\" style=\"  background-color: #285994; color: white\" ></td>";
						}
						echo "</tr class=\"tr1\">\n";

						echo "</table> 	

						<input type=\"text\" id=\"gamb\" value=\"\" name=\"gamb\" hidden>";
						echo "</div>";
					
				?>


																		 
				<!--</table class="table1" style="margin:0 auto"> -->    
			<!--</table class="table1" style="margin:0 auto">-->
        </div>
        </div>
        <center>
        <br><br>
    	<button target="_blank" 
                class="button2"
                name="print" 
                onclick="muda()"
                value="Imprimir" 
                style="padding:10px;margin:10px"> 
                Imprimir
        </button>
		 <!--<button target="_blank" 
                class="button2"
                name="print" 
                onclick="printDiv2('printableArea')"
                value="Imprimir" 
                style="padding:10px;margin:10px"> 
                Imprimirei
        </button>-->


            <a href="principal.php"> 
                <button type="button" class="button2"> 
                    Voltar
                </button>
            </a>

        </center>

        <script>

        	//______________Mascara de moeda nos campos do Valor Acordado_______________// 

            $(document).ready(function () {

                var ct      		= 0;
                var total   		= 0;
                var percent 		= 0;
                var soma 			= 0;
                var soma_rdy		= 0;
                var unmask;
				var perfil			='<?=$perfil;?>';

				if(perfil != "CEJUC") {
					  $('.novo_Valor').prop("disabled",true);
					  $('.select-result').prop("disabled",true);			 
				}


            //_______Mascara de valores________//
            
            	$('.novo_Valor').each(function() {

            		var replace = $(this).val().replace(/([\W]+)/g, '');

            		replace.length <= 4 ? $(this).attr('mask', 'false') : $(this).attr('mask', 'true');
            		
            		if( $(this).attr('mask') == 'true') {

            			$(this).mask('000.000.000.000.000,00', {reverse: true});


            		} else if ( $(this).attr('mask') == 'false') {

            			var number = $(this).val();
            			$(this).val(number + '00');
            			$(this).mask('000.000.000.000.000,00', {reverse: true});

            		}

            	});
				
            	//$('.novo_Valor').mask('000.000.000.000.000,00', {reverse: true});
            	$('#gambx').mask('000.000.000.000.000,00', {reverse: true})


            //_______Contador do numero de acordos________//
                
                $('.select-result').ready(function () {
 		
                   $('.select-result').find('option:selected').each(function(event){
				   		
                      	var resultado 	= $(this).attr('value');
                        var form  		= $(this).attr('form');
               
                        total++;

                        if(resultado == "Com Acordo") {
                            ct++;
                            $('#acordos').html('<font size=\"4px\"> N&#176; Acordos: &nbsp;' + ct +  '</font>' );
                            $('#result_' + form).attr('cod', '0');

                        } else {
                            $('#acordos').html('<font size=\"4px\"> N&#176; Acordos: &nbsp;' + ct +  '</font>' );
                            $('#result_' + form).attr('cod', '1');
                            $('#novo_Valor_' + form).prop('disabled', true);         
                        }

                        $('#result_' + form).find('option').each(function() {
                        	block = $(this).attr('value');
                        	
                        	if( block == resultado){
								$(this).prop('disabled', true);
							}
													
						});
					                                      
                    });    
					if(total == 0){
						total = 1;
					}
                    percent = (ct/total) * 100;
                    $('#percent').html('<font size=\"4px\"> Percentual de Acordos:  &nbsp;' + percent.toFixed(0) + '% </font>' );
                   	//$('.select-result option:selected').attr('disabled', true);  
                 	
             
                });
                    
            
            //_______Função JQuery que envia os resultados, quando alterados, para o processamento no banco________//
             
                
                $('.select-result').on('change',function(event){
                   	
              
                    var form        = $(this).attr('form');
                    var resultado   = $('#result_' + form).val();
                    var cod 		= $('#result_' + form).attr('cod');
        		 
                    if(resultado == "Com Acordo"){
                        ct++;
                        $('#acordos').html('<font size=\"4px\"> N&#176; Acordos: &nbsp;' + ct +  '</font>' );
                        percent = (ct/total) * 100;
						$('#percent').html('<font size=\"4px\"> Percentual de Acordos: &nbsp;' + percent.toFixed(0) + '% </font>' );
						$('#result_' + form).attr('cod', '0'); 
						$('#novo_Valor_' + form).prop('disabled', false);
                    } else {
                        if(cod == 0) {                      
	                    	ct--;
		                    $('#acordos').html('<font size=\"4px\"> N&#176; Acordos: &nbsp;' + ct +  '</font>' ); 
		                    percent = (ct/total) * 100;
		                    $('#percent').html('<font size=\"4px\"> Percentual de Acordos: &nbsp;' + percent.toFixed(0) + '% </font>' );
		                    $('#result_' + form).attr('cod', '1');  
		                    $('#novo_Valor_' + form).prop('disabled', true);
	                    }               	 		  
	               }
                
                                                      
                    var id          = $('#id_result_' + form).attr('value');
                    var processo    = $('#processo_result_' + form).attr('value');
                    var resultado   = $(this).val();

                    var formData = {
                        'id'        :   id,
                        'processo'  :   processo,
                        'resultado' :   resultado
                    };

                    $.ajax({    

                        url: 'AtualizaResultado.php',
                        type: 'POST',            
                        data: formData      

                    })
                    $('#result_' + form).find('option').each(function(){
          				block = $(this).attr('value');
                        //console.log(block);	
                        if( block !== resultado){
							$(this).prop('disabled', false);
						}									
					});

                    $('#result_' + form).find('option:selected').each(function(){
          				block = $(this).attr('value');
                        //console.log(block);	
                        if( block == resultado){
							$(this).prop('disabled', true);
						}									
					});            
                    event.preventDefault(event);

                });
         
            //_____________Funão JQuery que atualiza o valor total dinâmicamente_____________//
            	
            
                $('.novo_Valor').ready(function() {
 
            		$('.novo_Valor').each(function() {
			
            			$(this).val() == '' ? unmask_rdy = 0 : unmask_rdy = $(this).val().replace(/([\W]+)/g, ''); 
            			soma_rdy += parseFloat(unmask_rdy);
            			
            		});

            		var gamb = $('#gamb').val(soma_rdy).mask('000.000.000.000.000,00', {reverse: true});
            		var gamb = $('#gamb').val();
            	
            		$('#total').html('<font size=\"4px\">Valor Total:&nbsp;R$&nbsp; ' + gamb + '&nbsp;'+'</font>');
                              
                }); 

            //________Função JQuery que invia os valores para o processamento no banco________//

                $('.btn-valor').on('click',function() {
					
                	var mask
                	var x = $(this).attr('form');

                	$('.novo_Valor').each(function() {

                    	$(this).val() == '' ? unmask = 0 : unmask = $(this).val().replace(/([\W]+)/g, '');
                    	soma += parseFloat(unmask);
                    
                    });

                		soma = soma.toString();
						soma = soma.replace(/([0-9]{2})$/g, ",$1");

						if( soma.length > 6 ) {
							soma = soma.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
						}

                    $('#total').html('<font size=\"4px\">Valor Total:&nbsp;R$&nbsp; ' + soma + '&nbsp;'+'</font>');

                    soma = 0;

                    $.ajax({    

                        url: 'AtualizaValor.php',
                        type: 'POST',            
                        data: $('#atualiza_Valor_' + x).serialize()

                        })

                        .done(function(resposta) {
                            $('#novo_Valor_' + x)   
                        })

                    alert("Valores Atualizados");
					location.reload();
                    //event.preventDefault();
                });
      
            });
			
		function muda(){
				var x = document.getElementsByClassName("teste");
				for (var i=0;i<=x.length;i++)
				{
					$(x[i]).css('color','black');
					$(x[i]).css('background-color','white');
				}
				printDiv2('imprimir');
			}
        function printDiv2(divName) {
			
             var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;
             document.body.innerHTML = printContents;
             window.print();
             document.body.innerHTML = originalContents;    
             window.location.href='principal.php';
         }

        </script>

    </body>

</html>